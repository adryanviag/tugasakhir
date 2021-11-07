<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];
    protected $primaryKey = 'Kode';
    protected $table = 'tbunit';

    public $incrementing = false;


    public function suratmasuk()
    {
        return $this->hasMany(SuratMasuk::class, 'KdUnit');
    }
}
