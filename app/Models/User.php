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

    public $timestamps = false;
    public $rememberToken = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'pic'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
    public function jawaban()
    {
        return $this->hasMany(User::class, 'id', 'id');
    }

    public function hasil()
    {
        return $this->hasMany(User::class, 'id_hasil', 'id_hasil');
    }

    public function waktu()
    {
        return $this->hasMany(User::class, 'id', 'id');
    }
}
