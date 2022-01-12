<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeriDisposisi extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'NoAgendaSurat';
    protected $table = 'tbberidisposisi';
    protected $dates = ['TglDisposisi'];
    protected $dateFormat = 'Y-m-d';

    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'KdUnit', 'Kode');
    }

    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'NoAgendaSurat', 'NoAgenda');
    }

    public function getAllStatusDisposisi($from = null, $to = null)
    {
        $data = [];
        $unit = auth()->user()->unit->Kode;

        if (auth()->user()->prev === 'admin') {
            if ($from && $to) {
                $data = DB::table('tbberidisposisi')
                    ->select('tbberidisposisi.NoAgendaSurat', 'tbberidisposisi.TglDisposisi', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                    ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                    ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                    ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                    ->where('tbberidisposisi.KdUnit', $unit)
                    ->whereBetween('TglDisposisi', [$from, $to])
                    ->get();
            } else {
                $data = DB::table('tbberidisposisi')
                    ->select('tbberidisposisi.*', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                    ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                    ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                    ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                    ->where('tbberidisposisi.KdUnit', $unit)
                    ->get();
            }
        } else {
            if ($from && $to) {
                $data = DB::table('tbberidisposisi')
                    ->select('tbberidisposisi.NoAgendaSurat', 'tbberidisposisi.TglDisposisi', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                    ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                    ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                    ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                    ->where('tbberidisposisi.KdUnit', $unit)
                    ->whereBetween('TglDisposisi', [$from, $to])
                    ->get();
            } else {
                $data = DB::table('tbberidisposisi')
                    ->select('tbberidisposisi.*', 'tbunit.Desk as Penerima', 'tbisidisposisi.Isi', 'tbmasuk.IsiRingkas as Prihal')
                    ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
                    ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
                    ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
                    ->where('tbberidisposisi.KdUnit', $unit)
                    ->get();
            }
        }

        return $data;
    }

    public function getSurat($nosurat)
    {
        $data = DB::table('tbmasuk')
            ->select('tbmasuk.NoAgenda', 'tbmasuk.TglDiterima', 'tbmasuk.TglSurat', 'tbmasuk.NoSurat', 'tbinstansi.instansi as Pengirim', 'tbmasuk.IsiRingkas', 'tbmasuk.LokasiMedia', 'tbmasuk.SifatSurat', 'tbmasuk.TglHrsSelesai')
            ->join('tbinstansi', 'tbmasuk.Pengirim', '=', 'tbinstansi.kode')
            ->where('tbmasuk.NoAgenda', $nosurat)
            ->get()
            ->toArray();

        return $data;
    }

    public function trackDisposisiSurat($nosurat)
    {
        $beridisposisi = DB::table('tbberidisposisi')
            ->select('tbberidisposisi.TglDisposisi', 'tbunit.Desk as Kepada', 'tbisidisposisi.Isi as IsiDisposisi')
            ->join('tbunit', 'tbberidisposisi.Penerima', '=', 'tbunit.Kode')
            ->join('tbmasuk', 'tbberidisposisi.NoAgendaSurat', '=', 'tbmasuk.NoAgenda')
            ->join('tbisidisposisi', 'tbberidisposisi.Isi', '=', 'tbisidisposisi.Kode')
            ->where('tbberidisposisi.NoAgendaSurat', $nosurat)
            ->get()
            ->toArray();

        $terimadisposisi = DB::table('tbterimadisposisi')
            ->select('tbunit.Desk as Dari', 'tbterimadisposisi.Status', 'tbterimadisposisi.TglStatus')
            ->join('tbunit', 'tbterimadisposisi.Pengirim', '=', 'tbunit.Kode')
            ->where('tbterimadisposisi.NoAgendaSurat', $nosurat)
            ->get()
            ->toArray();

        $final_data = [];

        for ($i = 1; $i < count($beridisposisi); $i++) {
            $initial_data = [
                'TglDisposisi' => Carbon::parse($beridisposisi[$i]->TglDisposisi)->format('d M Y'),
                'Dari' => $terimadisposisi[$i]->Dari,
                'IsiDisposisi' => $beridisposisi[$i]->IsiDisposisi,
                'Kepada' => $beridisposisi[$i]->Kepada,
                'Status' => $terimadisposisi[$i]->Status,
                'TglStatus' => $terimadisposisi[$i]->TglStatus,
            ];

            array_push($final_data, $initial_data);
        }

        return $final_data;
    }
}
