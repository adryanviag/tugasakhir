<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'tblokasi';

    protected $primaryKey = 'KdLokasi';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['KdLokasi', 'Desk', 'KdUnit'];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'KdUnit', 'Kode');
    }
}
