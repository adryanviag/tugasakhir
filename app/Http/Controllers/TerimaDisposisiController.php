<?php

namespace App\Http\Controllers;

use App\Models\BeriDisposisi;
use App\Models\IsiDisposisi;
use App\Models\SuratMasuk;
use App\Models\TerimaDisposisi;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TerimaDisposisiController extends Controller
{
    protected $terimadisposisi;

    public function __construct()
    {
        $this->terimadisposisi = new TerimaDisposisi();
    }

    public function index()
    {
        return view('proses.terimadisposisi.index', [
            'title' => 'Terima Disposisi',
            'data' => Unit::find(auth()->user()->unit->Kode)->TerimaDisposisi
        ]);
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
        $case = $request->Status;

        switch ($case) {
            case 'Didisposisikan':
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

                TerimaDisposisi::where('KdUnit', $request->Pengirim)->where('NoAgendaSurat', $request->NoAgendaSurat)->update([
                    'TglDiterima' => $request->TglDiterima,
                    'Status' => $case,
                    'YgDilakukan' => $request->Status,
                    'TglStatus' => Carbon::now()->format('Y-m-d')
                ]);
                try {
                    BeriDisposisi::updateOrCreate($validatedDataBeri);
                    TerimaDisposisi::updateOrCreate($validatedDataTerima);
                } catch (QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == 1062) {
                        return 'Tidak bisa mengirim ke orang yang sama!';
                    }
                }
                return redirect('/statusdisposisi')->with('success', 'Berhasil didisposisikan!');
            default:
                TerimaDisposisi::where('KdUnit', $request->Pengirim)->where('NoAgendaSurat', $request->NoAgendaSurat)->update([
                    'TglDiterima' => $request->TglDiterima,
                    'Status' => $case,
                    'YgDilakukan' => $request->Status,
                    'TglStatus' => Carbon::now()->format('Y-m-d')
                ]);
                return redirect('/terimadisposisi')->with('success', 'Berhasil!');
        }
        // return dd($case);
    }
}
