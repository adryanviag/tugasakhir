<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\VarDumper\Caster\ClassStub;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('files.klasifikasi.index', [
            'title' => 'Klasifikasi',
            'data' => Classification::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.klasifikasi.create', [
            'title' => 'Klasifikasi',
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
            'Kode' => 'required|unique:tbklas|max:15',
            'Klas' => 'required|max:35',
            'Aktif' => 'required|max:2',
            'InAktif' => 'required|max:2',
            'TindakLanjut' => 'required|max:20'
        ]);

        Classification::create($validatedData);

        return redirect('/klasifikasi')->with('success', 'Data dengan kode ' . $request->Kode . ' berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('files.klasifikasi.detail', [
            "title" => "Klasifikasi",
            "data" => Classification::find($id)
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
        return view('files.klasifikasi.edit', [
            "title" => "Klasifikasi",
            "data" => Classification::find($id)
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
            'Klas' => 'required|max:35',
            'Aktif' => 'required|max:2',
            'InAktif' => 'required|max:2',
            'TindakLanjut' => 'required|max:20'
        ]);

        Classification::where('Kode', $id)->update($validatedData);

        return redirect('/klasifikasi')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classification::destroy($id);

        return redirect('/klasifikasi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
