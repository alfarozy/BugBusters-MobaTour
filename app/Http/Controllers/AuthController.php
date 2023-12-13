<?php

namespace App\Http\Controllers;

use App\Mail\MailActivationRegisterEmail;
use App\Models\PasswordResset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // protected $redirectTo = '/dashboard';


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Method googleCallback
     *
     * @return void
     */
    public function googleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where(['google_id' => $google_user->getId()])->first();

            if (!$user) {
                $newUser = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);
                //> login here 
                Auth::login($newUser);
            } else {
                //> login here 
                Auth::login($user);
            }
            return redirect()->route('dashboard.index');
        } catch (\Throwable $e) {
            Log::info('===Login Google===');
            Log::error($e);

            return redirect()->route('login')->with('error', 'Gagal Login dengan akun google');
        }
    }

    public function setPassword()
    {
        return view('auth.set-password');
    }
    public function setPasswordAct(Request $request)
    {

        $request->validate([
            'password' => 'required|min:3',
        ], [
            '*.required' => 'Bidang ini wajib'
        ]);
        User::where('id', auth()->id())->update(['password' => bcrypt($request->password)]);

        return redirect()->route('dashboard.index')->with('success', 'Selamat datang, Moba Player');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function loginAct(Request $request)
    {

        if ($request->email && $request->password) {

            $user = User::whereEmail($request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {


                if ($user->email_verified_at == null) {
                    $token = str()->random(60);
                    $reset = PasswordResset::updateOrInsert(['email' => $user->email], ['token' => $token]);

                    if (isset($reset) && !empty($reset)) {
                        Mail::to($user->email)->send(new MailActivationRegisterEmail($token));
                        return redirect()->back()->with('success', 'Link Aktivasi akun sudah dikirim,Silahkan periksa email untuk aktivasi');
                    }
                }

                Auth::login($user);
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('login')->with('error', '<b>Login gagal</b>, Email atau password salah');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email dan password wajib');
        }
    }
    public function register()
    {
        return view('auth.register');
    }

    public function registerAct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ], [
            '*required' => 'Bidang ini wajib diisi'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = str()->random(60);
        $storeToken = PasswordResset::create(['email' => $request->email, 'token' => $token]);
        if (isset($storeToken)) {
            Mail::to($request->email)->send(new MailActivationRegisterEmail($token));
        }
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silahkan periksa email untuk aktivasi');
    }
}
