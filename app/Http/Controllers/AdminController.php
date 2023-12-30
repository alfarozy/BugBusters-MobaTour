<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::latest()->get();

        return view('dashboard.admin.index', compact('data'));
    }
    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
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
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
        ], $customMessages);

        //> encrypt password
        $attr['password'] = bcrypt($request->password);

        Admin::create($attr);

        return redirect()->route('admin.index')->with('success', 'Data admin berhasil ditambahkan.');
    }
    public function edit(Admin $admin)
    {
        $data = $admin;
        return view('dashboard.admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Admin::findOrFail($id);
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
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
        ], $customMessages);

        //> encrypt password
        if ($request->password != null) {
            $attr['password'] = bcrypt($request->password);
        } else {
            unset($attr['password']);
        }

        $data->update($attr);

        return redirect()->route('admin.index')->with('success', 'Data admin berhasil perbarui.');
    }


    public function setStatus($id)
    {
        $data = Admin::findOrFail($id);
        if ($data->is_active) { //> jika active
            $status = 'Data berhasil dinonaktifkan';
            $updatedStatus = 0;
        } else {
            $status = 'Data berhasil diaktifkan';
            $updatedStatus = 1;
        }

        $update = $data->update(['is_active' => $updatedStatus]);
        if ($update) {
            return back()->with('success', $status);
        }
        return back()->with('error', 'Status gagal diperbaharui');
    }
}
