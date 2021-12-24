<?php

namespace App\Http\Controllers;

use App\Models\BeriDisposisi;
use App\Models\IsiDisposisi;
use App\Models\SuratMasuk;
use App\Models\TerimaDisposisi;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TerimaDisposisiController extends Controller
{
    public function index()
    {
        return view('proses.terimadisposisi.index', [
            'title' => 'Terima Disposisi',
            'data' => Unit::find(auth()->user()->unit->Kode)->TerimaDisposisi
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function disposisi($nosurat)
    {
        $checkSurat = SuratMasuk::find($nosurat);

        if ($checkSurat == null) {
            return back()->with('error', 'Surat tidak ditemukan.');
        }

        return view('proses.terimadisposisi.disposisi', [
            'title' => 'Terima Disposisi',
            'data' => SuratMasuk::find($nosurat),
            'data_unit' => Unit::all(),
            'data_isi' => IsiDisposisi::all()
        ]);
    }

    public function tambahdisposisi(Request $request)
    {
        if ($request->Penerima === auth()->user()->unit->Kode) {
            return Redirect::back()->withErrors(['msg' => 'Tidak bisa disposisi ke diri sendiri.']);
        }

        $validatedDataBeri = $request->validate([
            'TglDisposisi' => 'required',
            'NoAgendaSurat' => 'required',
            'Penerima' => 'required',
            'Isi' => 'required',
            'Catatan' => 'nullable'
        ]);

        $validatedDataBeri['KdUnit'] = auth()->user()->unit['Kode'];
        $validatedDataBeri['KdUnitSurat'] = SuratMasuk::find($request->NoAgendaSurat)->Unit->Kode;


        $validatedDataTerima = $request->validate([
            'NoAgendaSurat' => 'required',
            'TglDiterima' => 'required',
            'Pengirim' => 'required',
            'Status' => 'required'
        ]);

        $validatedDataTerima['KdUnit'] = $request->Penerima;
        $validatedDataTerima['KdUnitSurat'] = SuratMasuk::find($request->NoAgendaSurat)->Unit->Kode;
        $validatedDataTerima['YgDilakukan'] = $request->Status;

        BeriDisposisi::create($validatedDataBeri);
        TerimaDisposisi::create($validatedDataTerima);
        return redirect('/statusdisposisi')->with('success', 'Berhasil didisposisikan!');
    }
}
