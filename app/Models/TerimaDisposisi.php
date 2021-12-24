<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerimaDisposisi extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'Pengirim';
    protected $table = 'tbterimadisposisi';
    protected $dates = ['TglDiterima', 'TglStatus'];
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
}
