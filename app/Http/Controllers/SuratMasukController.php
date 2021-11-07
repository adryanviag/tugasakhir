<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\Classification;
use App\Models\Instance;
use App\Models\SuratMasuk;
use App\Models\Unit;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Unit $unit)
    {
        return view('proses.suratmasuk.index', [
            'title' => 'Surat Masuk',
            'data' => $unit::find(auth()->user()->unit->Kode)->SuratMasuk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proses.suratmasuk.create', [
            'title' => 'Surat Masuk',
            'data_klas' => Classification::all(),
            'data_lokasi' => Location::all(),
            'data_instansi' => Instance::all()
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
            'NoAgenda' => 'required|unique:tbmasuk|string|max:35',
            'Pengirim' => 'required|string|max:50',
            'TglDiterima' => 'required',
            'SifatSurat' => 'required',
            'StatusSurat' => 'required',
            'Lokasi' => 'required',
            'Klas' => 'required',
            'TglSurat' => 'required',
            'NoSurat' => 'required',
            'Lamp' => 'required',
            'IsiRingkas' => 'required',
            'TglHrsSelesai' => 'required',
            'Catatan' => 'required',
            // 'MasaAktif' => 'nullable',
            // 'MasaInAktif' => 'nullable',
            'LokasiMedia' => 'required|mimes:pdf|max:2048',
            // 'LokasiFisik' => 'nullable',
        ]);

        $validatedData['LokasiMedia'] = $request->file('LokasiMedia')->storeAs(
            'docs/suratmasuk',
            time() . '_' . $request->NoSurat . '.' . $request->LokasiMedia->extension()
        );

        $validatedData['KdUnit'] = auth()->user()->unit['Kode'];

        SuratMasuk::create($validatedData);

        return redirect('/suratmasuk')->with('success', 'Surat Masuk dengan nomor agenda ' . $request->NoAgenda . ' berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SuratMasuk::destroy($id);

        return redirect('/suratmasuk')->with('success', 'Berhasil menghapus surat dengan nomor agenda ' . $id);
    }
}
