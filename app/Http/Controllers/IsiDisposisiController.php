<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsiDisposisi;

class IsiDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.isidisposisi.index', [
            'title' => 'Isi Disposisi',
            'data' => IsiDisposisi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.isidisposisi.create', [
            'title' => 'Isi Disposisi',
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
            'Kode' => 'required|max:4|unique:tbisidisposisi',
            'Isi' => 'required|max:50'
        ]);

        IsiDisposisi::create($validatedData);

        return redirect('/isidisposisi')->with('success', 'Data dengan kode ' . $request->Kode . ' berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('files.isidisposisi.detail', [
            'title' => 'Isi Disposisi',
            'data' => IsiDisposisi::find($id)
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
        return view('files.isidisposisi.edit', [
            'title' => 'Isi Disposisi',
            'data' => IsiDisposisi::find($id)
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
            'Isi' => 'required'
        ]);

        IsiDisposisi::where('Kode', $id)->update($validatedData);

        return redirect('/isidisposisi')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IsiDisposisi::destroy($id);

        return redirect('/isidisposisi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
