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
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listmapel()
    {
        return $this->hasMany(listmapel::class);
    }

    public function mapel()
    {
        return $this->hasMany(mapel::class);
    }

    public function presensi()
    {
        return $this->hasMany(presensi::class);
    }

    public function plmapel()
    {
        return $this->hasMany(plmapel::class);
    }

    public function tugas()
    {
        return $this->hasMany(tugas::class);
    }

    public function guru()
    {
        return $this->belongsTo(guru::class);
    }

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }

    public function komentar()
    {
        return $this->hasMany(komentar::class);
    }
}
