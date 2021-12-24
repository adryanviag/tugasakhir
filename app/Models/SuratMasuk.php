<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'NoAgenda';
    protected $table = 'tbmasuk';
    // protected $dates = ['TglDiterima', 'TglSurat', 'TglHrsSelesai'];
    // protected $dateFormat = 'y/m/d';

    public $incrementing = false;
    public $timestamps = false;

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
