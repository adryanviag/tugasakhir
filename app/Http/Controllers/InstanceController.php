<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInstanceRequest;
use Illuminate\Http\Request;
use App\Models\Instance;
use App\Models\Unit;

class InstanceController extends Controller
{
    public function index()
    {
        return view('files.instansi.index', [
            'title' => 'Instansi',
            'data' => Instance::all(),
        ]);
    }

    public function create()
    {
        return view('files.instansi.create', [
            'title' => 'Instansi',
            'units' => Unit::all()
        ]);
    }

    public function store(CreateInstanceRequest $request)
    {
        Instance::create($request->validated());

        return redirect()->route('instansi.index')->with('success', 'Data dengan kode ' . $request->kode . ' berhasil ditambah!');
    }

    public function show($id)
    {
        return view('files.instansi.detail', [
            'title' => 'Instansi',
            'data' => Instance::find($id),
        ]);
    }

    public function edit($id)
    {
        return view('files.instansi.edit', [
            'title' => 'Instansi',
            'data' => Instance::find($id),
            'units' => Unit::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'instansi' => 'required|max:35',
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

    public function destroy($id)
    {
        Instance::destroy($id);

        return redirect('/instansi')->with('success', 'Data dengan kode ' . $id . ' berhasil dihapus!');
    }
}
