<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plmapel extends Model
{
    use HasFactory;
    protected $table ='plmapel';

    public function listmapel()
    {
        return $this->belongsTo(listmapel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function presensi()
    {
        return $this->hasMany(presensi::class);
    }

    public function tugas()
    {
        return $this->hasMany(tugas::class);
    }

     public function komentar()
    {
        return $this->hasMany(komentar::class);
    }
}
