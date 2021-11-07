<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'Kode';
    protected $table = 'tbklas';
    protected $fillable = ['Kode', 'Klas', 'Aktif', 'InAktif', 'TindakLanjut'];
}
