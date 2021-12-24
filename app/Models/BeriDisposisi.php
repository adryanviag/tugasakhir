<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
