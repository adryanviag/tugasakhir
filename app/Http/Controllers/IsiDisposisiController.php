<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsiDisposisi;

class IsiDisposisiController extends Controller
{
    public function index()
    {
        return view('files.isidisposisi.index', [
            'title' => 'Isi Disposisi',
            'data' => IsiDisposisi::all()
        ]);
    }

    public function create()
    {
        return view('files.isidisposisi.create', [
            'title' => 'Isi Disposisi',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Kode' => 'required|max:4|unique:tbisidisposisi',
            'Isi' => 'required|max:50'
        ]);

        IsiDisposisi::create($validatedData);

        return redirect('/isidisposisi')->with('success', 'Data dengan kode ' . $request->Kode . ' berhasil ditambah!');
    }

    public function show($id)
    {
        return view('files.isidisposisi.detail', [
            'title' => 'Isi Disposisi',
            'data' => IsiDisposisi::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('files.isidisposisi.edit', [
            'title' => 'Isi Disposisi',
            'data' => IsiDisposisi::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Isi' => 'required'
        ]);

        IsiDisposisi::where('Kode', $id)->update($validatedData);

        return redirect('/isidisposisi')->with('success', 'Data dengan kode ' . $id . ' berhasil diupdate!');
    }

    public function destroy($id)
    {
        IsiDisposisi::destroy($id);

        return redirect('/isidisposisi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
