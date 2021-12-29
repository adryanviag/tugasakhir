<?php

namespace App\Http\Controllers;

use App\Exports\SuratMasukExport;
use App\Http\Requests\CreateSuratRequest;
use App\Http\Requests\EditSuratRequest;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\Location;
use App\Models\Classification;
use App\Models\Instance;
use App\Models\IsiDisposisi;
use App\Models\SuratMasuk;
use App\Models\Unit;
use App\Models\BeriDisposisi;
use App\Models\TerimaDisposisi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data = [];

        $unit = auth()->user()->unit->Kode;
        if (request()->from && request()->to) {
            // $q = "SELECT m.*, l.Desk FROM tbmasuk as m LEFT JOIN tblokasi as l ON m.Lokasi = l.KdLokasi WHERE m.KdUnit = '" . $unit . "' AND m.Pengirim = '" . request()->filterInstansi . "' OR m.NoAgenda = '" . request()->filterNoAgenda . "'";
            // $data = DB::select($q);
            $q = "SELECT tbmasuk.*, tblokasi.Desk FROM tbmasuk LEFT JOIN tblokasi ON tbmasuk.Lokasi = tblokasi.KdLokasi WHERE tbmasuk.KdUnit = '" . $unit . "' AND TglDiterima BETWEEN '" . request()->from . "' AND '" . request()->to . "'";
            $data = DB::select($q);
        } else {
            $q = "SELECT m.*, l.Desk FROM tbmasuk as m LEFT JOIN tblokasi as l ON m.Lokasi = l.KdLokasi WHERE m.KdUnit = '" . $unit . "'";
            $data = DB::select($q);
        }


        // return dd($data, request()->from, request()->to);
        return view('proses.suratmasuk.index', [
            'title' => 'Surat Masuk',
            'data' => $data,
            'data_instansi' => Instance::all()
        ]);
    }

    public function create()
    {
        return view('proses.suratmasuk.create', [
            'title' => 'Surat Masuk',
            'data_klas' => Classification::all(),
            'data_lokasi' => Location::all(),
            'data_instansi' => Instance::all()
        ]);
    }

    public function store(CreateSuratRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['LokasiMedia'] = $request->file('LokasiMedia')->storeAs(
            'docs/suratmasuk',
            time() . '_' . $request->NoSurat . '.' . $request->LokasiMedia->extension()
        );
        $validatedData['KdUnit'] = auth()->user()->unit['Kode'];

        SuratMasuk::create($validatedData);

        return redirect('/suratmasuk')->with('success', 'Surat Masuk dengan nomor agenda ' . $request->NoAgenda . ' berhasil ditambah!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('proses.suratmasuk.edit', [
            'title' => 'Surat Masuk',
            'data' => SuratMasuk::find($id),
            'data_instansi' => Instance::all(),
            'data_lokasi' => Location::all(),
            'data_klas' => Classification::all()
        ]);
    }

    public function update(EditSuratRequest $request, $id)
    {
        $validatedData = $request->validated();
        if ($request->file('LokasiMedia')) {
            $validatedData['LokasiMedia'] = $request->file('LokasiMedia')->storeAs(
                'docs/suratmasuk',
                time() . '_' . $request->NoSurat . '.' . $request->LokasiMedia->extension()
            );
        }

        $validatedData['KdUnit'] = auth()->user()->unit['Kode'];

        SuratMasuk::where('NoAgenda', $id)->update($validatedData);

        return redirect('/suratmasuk')->with('success', 'Surat Masuk dengan nomor agenda ' . $request->NoAgenda . ' berhasil diubah!');
    }

    public function destroy($id)
    {
        SuratMasuk::destroy($id);

        return redirect('/suratmasuk')->with('success', 'Berhasil menghapus surat dengan nomor agenda ' . $id);
    }

    public function disposisi($nosurat)
    {
        $checkSurat = SuratMasuk::find($nosurat);

        if ($checkSurat == null) {
            return back()->with('error', 'Surat tidak ditemukan.');
        }

        return view('proses.suratmasuk.disposisi', [
            'title' => 'Surat Masuk',
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

    public function export()
    {
        return Excel::download(new SuratMasukExport, 'suratmasuk.xlsx');
    }
}
