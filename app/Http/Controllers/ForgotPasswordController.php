<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\PasswordResset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forget-password');
    }

    public function sendEmail(Request $request)
    {
        try {
            $checkEmail = User::where('email', $request->email)->first();
            if (empty($checkEmail)) {
                return redirect()->back()->with('error', 'Email Tidak Terdaftar');
            } else {
                //> insert token to db
                $token = str()->random(60);
                $data = [
                    'token' => $token,
                    'name' => $checkEmail->name,
                    'email' => $checkEmail->email
                ];

                $reset = PasswordResset::create($data);

                if (isset($reset) && !empty($reset)) {
                    Mail::to($request->email)->send(new ForgotPassword($reset));
                    return redirect()->route('login')->with('success', 'Link Reset Email sudah dikirim');
                }
            }
        } catch (\Exception $exc) {
            return $exc->getMessage();
        }
    }
    public function editPassword($token)
    {
        $user = PasswordResset::where('token', $token)->firstOrFail();
        return view('auth.reset_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|min:3',
                'confirm_password' => 'required|same:password',
            ]);
            $checkToken = PasswordResset::where('token', $request->token)->first();

            if (empty($checkToken)) {
                return redirect()->back()->with('error', 'Invalid token!');
            }

            $update = User::where('email', $checkToken->email)->update(['password' => bcrypt($request->password)]);
            if (isset($update)) {
                PasswordResset::where('email', $checkToken->email)->delete();
            }

            return redirect()->route('login')->with('success', 'Password anda berhasil diubah!');
        } catch (\Exception $exc) {
            return abort(404);
        }
    }

    public function activatedMember($token)
    {
        $checkToken = PasswordResset::where('token', $token)->first();
        if (empty($checkToken)) return redirect()->back()->with("error", "Token tidak ditemukan !");

        $verified = User::where('email', $checkToken->email)->update(['email_verified_at' => Carbon::now()]);
        if (empty($verified)) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan hubungi administrator');
        }

        if (isset($verified)) {
            PasswordResset::where('email', $checkToken->email)->delete();
        }
        return redirect()->route('login')->with('success', 'Akun berhasil diaktivasi, silahkan login untuk melanjutkan');
    }
}
