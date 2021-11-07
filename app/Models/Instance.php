<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'kode';
    protected $table = 'tbinstansi';
    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'kdunit', 'Kode');
    }
}
