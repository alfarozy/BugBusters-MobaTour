<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $data = Tournament::latest()->get();
        return view("dashboard.tournament.index", compact('data'));
    }

    public function create()
    {
        return view("dashboard.tournament.create");
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => 'required|string|max:255',
            'schedule_date' => 'required|date',
            'end_register_date' => 'required|date',
            'description' => 'required|string',
            'type' => 'required',
            'mode' => 'required',
            'price' => 'required_if:type,' . Tournament::TYPE_PREMIUM,
            'slot' => 'required|numeric',
            'mode' => 'required',
            'thumbnails' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $attr['admin_id'] = Auth()->id();
        $attr['slug'] = str()->slug($attr['title']);
        $attr['thumbnails'] = $request->file('thumbnails')->store('thumbnails');
        if ($attr['type'] == Tournament::TYPE_PREMIUM) {
            $attr['price'] = IDRToNum($request->price);
        }
        Tournament::create($attr);

        return redirect()->route('tournament.index')->with('success', 'Data turnamen berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $data = Tournament::findOrFail($id);
        return view("dashboard.tournament.edit", compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Tournament::findOrFail($id);
        $attr = $request->validate([
            'title' => 'required|string|max:255',
            'schedule_date' => 'required|date',
            'end_register_date' => 'required|date',
            'description' => 'required|string',
            'type' => 'required',
            'mode' => 'required',
            'price' => 'required_if:type,' . Tournament::TYPE_PREMIUM,
            'slot' => 'required|numeric',
            'mode' => 'required',
            'thumbnails' => 'sometimes|nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        if ($attr['title'] != $data->title) {
            $attr['slug'] = str()->slug($attr['title']);
        }
        if ($request->thumbnails) {
            $attr['thumbnails'] = $request->file('thumbnails')->store('thumbnails');
        }
        if ($attr['type'] == Tournament::TYPE_PREMIUM) {
            $attr['price'] = IDRToNum($request->price);
        }
        if ($attr['type'] == Tournament::TYPE_FREE) {
            $attr['price'] = 0;
        }
        $data->update($attr);

        return redirect()->route('tournament.index')->with('success', 'Data turnamen berhasil ditambahkan.');
    }

    public function setStatus($id)
    {
        $data = Tournament::findOrFail($id);
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
