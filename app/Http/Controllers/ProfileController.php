<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth()->user();

        return view('member.profile.index', compact('data'));
    }

    public function update(Request $request)
    {
        $data = User::findOrFail(Auth()->id());
        // Pesan validasi kustom dalam bahasa Indonesia
        $customMessages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'unique' => 'Data :attribute sudah ada.',
            'email' => 'Format :attribute tidak valid.',
            'min' => 'Panjang :attribute minimal :min karakter.',
        ];

        // Validasi input dari formulir dengan pesan kustom
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'sometimes|nullable|min:6',
        ], $customMessages);

        //> encrypt password
        if ($request->password != null) {
            $attr['password'] = bcrypt($request->password);
        } else {
            unset($attr['password']);
        }

        $data->update($attr);

        return redirect()->route('profile.index')->with('success', 'Data berhasil diperbarui.');
    }
}
