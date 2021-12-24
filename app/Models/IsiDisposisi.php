<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiDisposisi extends Model
{
    use HasFactory;

    protected $fillable = ['Kode', 'Isi'];

    public $timestamps = false;

    protected $primaryKey = 'Kode';
    public $incrementing = false;
    protected $table = 'tbisidisposisi';
}
