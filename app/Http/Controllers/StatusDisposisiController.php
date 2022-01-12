<?php

namespace App\Http\Controllers;

use App\Exports\StatusDisposisiExport;
use App\Models\BeriDisposisi;
use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StatusDisposisiController extends Controller
{
    protected $beridisposisi;

    public function __construct()
    {
        $this->beridisposisi = new BeriDisposisi();
    }

    public function index()
    {
        $data = $this->beridisposisi->getAllStatusDisposisi(request()->from, request()->to);

        return view('proses.statusdisposisi.index', [
            'title' => 'Status Disposisi',
            'data' => $data,
        ]);
    }

    public function status($nosurat)
    {
        if (SuratMasuk::find($nosurat) == null) {
            return abort('404');
        }

        $surat = $this->beridisposisi->getSurat($nosurat);
        $final_data = $this->beridisposisi->trackDisposisiSurat($nosurat);

        // ! converting dates
        setlocale(LC_ALL, 'IND');
        $time = strtotime($surat[0]->TglDiterima);
        $time_surat = strtotime($surat[0]->TglSurat);
        $time_selesai = strtotime($surat[0]->TglHrsSelesai);
        $formatted_tglditerima = strftime("%A, %d %B %Y", $time);
        $formatted_tglsurat = strftime("%A, %d %B %Y", $time_surat);
        $formatted_tglselesai = strftime("%A, %d %B %Y", $time_selesai);

        return view('proses.statusdisposisi.status', [
            'title' => 'Status Disposisi',
            'data_sm' => $surat[0],
            'data_disposisi' => $final_data,
            'tgl_diterima' => $formatted_tglditerima,
            'tgl_surat' => $formatted_tglsurat,
            'tgl_selesai' => $formatted_tglselesai
        ]);
    }

    public function export()
    {
        return Excel::download(new StatusDisposisiExport, 'status_disposisi.csv');
    }
}
