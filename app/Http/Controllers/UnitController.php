<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.unitkerja.index', [
            'title' => 'Unit Kerja',
            'data' => Unit::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.unitkerja.create', [
            'title' => 'Unit Kerja'
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
            'Kode' => 'required|unique:tbunit|max:10',
            'Nama' => 'required|max:30',
            'Desk' => 'required|max:40'
        ]);

        Unit::create($validatedData);

        return redirect('/unitkerja')->with('success', 'Data dengan kode ' . $request->Kode . ' berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('files.unitkerja.detail', [
            'title' => 'Unit Kerja',
            'data' => Unit::find($id)
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
        return view('files.unitkerja.edit', [
            'title' => 'Unit Kerja',
            'data' => Unit::find($id)
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
            'Nama' => 'required|max:30',
            'Desk' => 'required|max:40'
        ]);

        Unit::where('Kode', $id)->update($validatedData);

        return redirect('/unitkerja')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::destroy($id);

        return redirect('/unitkerja')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
