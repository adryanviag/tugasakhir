<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instance;
use App\Models\Unit;

class InstanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Instance::find('INS02')->unit);
        return view('files.instansi.index', [
            'title' => 'Instansi',
            'data' => Instance::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.instansi.create', [
            'title' => 'Instansi',
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
            'kode' => 'required|unique:tbinstansi|max:15',
            'instansi' => 'required|max:35',
            'kdunit' => 'required',
            'kontak' => 'nullable',
            'alamat' => 'nullable',
            'kota' => 'nullable',
            'kodepos' => 'nullable',
            'telpon' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable|email:dns,rfc',
            'web' => 'nullable',
        ]);

        Instance::create($validatedData);

        return redirect('/instansi')->with('success', 'Data dengan kode ' . $request->kode . ' berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('files.instansi.detail', [
            'title' => 'Instansi',
            'data' => Instance::find($id),
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
        return view('files.instansi.edit', [
            'title' => 'Instansi',
            'data' => Instance::find($id),
            'units' => Unit::all()
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
            'instansi' => 'required|max:35',
            'kdunit' => 'required',
            'kontak' => 'nullable',
            'alamat' => 'nullable',
            'kota' => 'nullable',
            'kodepos' => 'nullable',
            'telpon' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable|email:dns,rfc',
            'web' => 'nullable',
        ]);

        Instance::where('kode', $id)->update($validatedData);

        return redirect('/instansi')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instance::destroy($id);

        return redirect('/instansi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
