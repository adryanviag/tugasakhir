<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Unit;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.lokasi.index', [
            'title' => 'Lokasi',
            'data' => Location::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.lokasi.create', [
            'title' => 'Lokasi',
            'units' => Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'KdLokasi' => 'required|unique:tblokasi|max:15',
            'KdUnit' => 'required',
            'Desk' => 'required|max:35',
        ]);

        Location::create($validatedData);

        return redirect('/lokasi')->with('success', 'Data dengan kode ' . $request->KdLokasi . ' berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('files.lokasi.detail', [
            "title" => "Lokasi",
            "data" => Location::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('files.lokasi.edit', [
            "title" => "Lokasi",
            "data" => Location::find($id),
            "units" => Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Desk' => 'required|max:35',
            'KdUnit' => 'required'
        ]);

        Location::where('KdLokasi', $id)->update($validatedData);

        return redirect('/lokasi')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::destroy($id);

        return redirect('/lokasi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
