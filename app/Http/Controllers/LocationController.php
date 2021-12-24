<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocationRequest;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Unit;

class LocationController extends Controller
{
    public function index()
    {
        return view('files.lokasi.index', [
            'title' => 'Lokasi',
            'data' => Location::all(),
        ]);
    }

    public function create()
    {
        return view('files.lokasi.create', [
            'title' => 'Lokasi',
            'units' => Unit::all()
        ]);
    }

    public function store(CreateLocationRequest $request)
    {
        Location::create($request->validated());

        return redirect()->route('lokasi.index')->with('success', 'Data dengan kode ' . $request->KdLokasi . ' berhasil ditambah!');
    }

    public function show($id)
    {
        return view('files.lokasi.detail', [
            "title" => "Lokasi",
            "data" => Location::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('files.lokasi.edit', [
            "title" => "Lokasi",
            "data" => Location::find($id),
            "units" => Unit::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Desk' => 'required|max:35',
            'KdUnit' => 'required'
        ]);

        Location::where('KdLokasi', $id)->update($validatedData);

        return redirect('/lokasi')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    public function destroy($id)
    {
        Location::destroy($id);

        return redirect('/lokasi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
