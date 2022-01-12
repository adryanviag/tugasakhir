<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'NoAgenda';
    protected $table = 'tbmasuk';

    public $incrementing = false;
    public $timestamps = false;

    public function getSuratMasuk($from = null, $to = null)
    {
        $data = [];
        if ($from && $to) {
            $data = DB::table('tbmasuk')
                ->select('tbmasuk.*', 'tbklas.Klas', 'tblokasi.Desk as Lokasi', 'tbinstansi.instansi as Pengirim')
                ->join('tbklas', 'tbmasuk.Klas', '=', 'tbklas.Kode')
                ->join('tblokasi', 'tbmasuk.Lokasi', '=', 'tblokasi.KdLokasi')
                ->join('tbinstansi', 'tbmasuk.Pengirim', '=', 'tbinstansi.kode')
                ->whereBetween('TglDiterima', [$from, $to])
                ->orderBy('TglDiterima', 'desc')
                ->paginate(50);
        } else {
            $data = DB::table('tbmasuk')
                ->select('tbmasuk.*', 'tbklas.Klas', 'tblokasi.Desk as Lokasi', 'tbinstansi.instansi as Pengirim')
                ->join('tbklas', 'tbmasuk.Klas', '=', 'tbklas.Kode')
                ->join('tblokasi', 'tbmasuk.Lokasi', '=', 'tblokasi.KdLokasi')
                ->join('tbinstansi', 'tbmasuk.Pengirim', '=', 'tbinstansi.kode')
                ->orderBy('TglDiterima', 'desc')
                ->paginate(50);
        }

        return $data;
    }

    public function searchSuratMasuk($keyword = null)
    {
        $data = [];
        $data = DB::table('tbmasuk')
            ->select('tbmasuk.*', 'tbklas.Klas', 'tblokasi.Desk as Lokasi', 'tbinstansi.instansi as Pengirim')
            ->join('tbklas', 'tbmasuk.Klas', '=', 'tbklas.Kode')
            ->join('tblokasi', 'tbmasuk.Lokasi', '=', 'tblokasi.KdLokasi')
            ->join('tbinstansi', 'tbmasuk.Pengirim', '=', 'tbinstansi.kode')
            ->orderBy('TglDiterima', 'desc')
            ->paginate(50);

        if ($keyword != '') {
            $data = DB::table('tbmasuk')
                ->select('tbmasuk.*', 'tbklas.Klas', 'tblokasi.Desk as Lokasi', 'tbinstansi.instansi as Pengirim')
                ->join('tbklas', 'tbmasuk.Klas', '=', 'tbklas.Kode')
                ->join('tblokasi', 'tbmasuk.Lokasi', '=', 'tblokasi.KdLokasi')
                ->join('tbinstansi', 'tbmasuk.Pengirim', '=', 'tbinstansi.kode')
                ->where('tbmasuk.NoAgenda', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tbinstansi.instansi', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tbmasuk.IsiRingkas', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tbmasuk.NoSurat', 'LIKE', '%' . $keyword . '%')
                ->orderBy('TglDiterima', 'desc')
                ->paginate(50);
        }

        return $data;
    }

    public function tambahSuratMasuk($request)
    {
        $unitraw = DB::table('tbinstansi')
            ->select('kdunit')
            ->where('kode', '=', $request->Pengirim)
            ->get()
            ->toArray();
        $unit = $unitraw[0]->kdunit;

        $validatedData = $request->validated();
        $validatedData['LokasiMedia'] = $request->file('LokasiMedia')->storeAs(
            'docs/suratmasuk',
            time() . '_' . $request->NoSurat . '.' . $request->LokasiMedia->extension()
        );
        $validatedData['KdUnit'] = $unit;

        SuratMasuk::create($validatedData);
    }

    public function updateSuratMasuk($request, $id)
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
    }

    public function tambahDisposisi($request)
    {
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

        DB::table('tbmasuk')->where('NoAgenda', $request->NoAgendaSurat)->update(['LokasiFisik' => 'checked']);

        BeriDisposisi::create($validatedDataBeri);
        TerimaDisposisi::create($validatedDataTerima);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'KdUnit', 'Kode');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'Lokasi', 'KdLokasi');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'Klas', 'Kode');
    }

    public function beridisposisi()
    {
        return $this->hasMany(BeriDisposisi::class, 'NoAgendaSurat');
    }

    public function terimadisposisi()
    {
        return $this->hasMany(TerimaDisposisi::class, 'NoAgendaSurat');
    }
}
