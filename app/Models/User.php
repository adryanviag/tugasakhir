<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['username', 'pass', 'unit_id', 'prev'];
    protected $table = 'admin';
    protected $primaryKey = 'username';

    public $timestamps = false;
    public $incrementing = false;

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'Kode');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['pass', 'remember_token'];

    public function getAuthPassword()
    {
        return $this->pass;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
