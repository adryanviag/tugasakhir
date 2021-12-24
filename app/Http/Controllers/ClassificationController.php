<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassificationRequest;
use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{
    public function index()
    {
        return view('files.klasifikasi.index', [
            'title' => 'Klasifikasi',
            'data' => Classification::paginate(10),
        ]);
    }

    public function create()
    {
        return view('files.klasifikasi.create', [
            'title' => 'Klasifikasi',
        ]);
    }

    public function store(CreateClassificationRequest $request)
    {
        Classification::create($request->validated());

        return redirect()->route('klasifikasi.index')->with('success', 'Data dengan kode ' . $request->Kode . ' berhasil ditambah!');
    }

    public function show($id)
    {
        return view('files.klasifikasi.detail', [
            "title" => "Klasifikasi",
            "data" => Classification::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('files.klasifikasi.edit', [
            "title" => "Klasifikasi",
            "data" => Classification::find($id)
        ]);
    }

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

    public function destroy($id)
    {
        Classification::destroy($id);

        return redirect('/klasifikasi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
