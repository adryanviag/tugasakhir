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
use Illuminate\Support\Facades\Redirect;

class SuratMasukController extends Controller
{
    protected $suratmasuk;

    public function __construct()
    {
        $this->suratmasuk = new SuratMasuk();
    }

    public function index()
    {
        $data = $this->suratmasuk->getSuratMasuk(request()->from, request()->to);

        return view('proses.suratmasuk.index', [
            'title' => 'Surat Masuk',
            'data' => $data,
        ]);
    }

    public function searchSurat(Request $request)
    {
        $data = $this->suratmasuk->searchSuratMasuk($request->keyword);

        return response()->json([
            'data' => $data
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
        $this->suratmasuk->tambahSuratMasuk($request);

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
        $this->suratmasuk->updateSuratMasuk($request, $id);

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

        $this->suratmasuk->tambahDisposisi($request);

        return redirect('/statusdisposisi')->with('success', 'Berhasil didisposisikan!');
    }

    public function export()
    {
        return Excel::download(new SuratMasukExport, 'suratmasuk.xlsx');
    }
}
