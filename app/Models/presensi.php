<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function listmapel()
    {
        return $this->belongsTo(listmapel::class);
    }

     public function plmapel()
    {
        return $this->belongsTo(plmapel::class);
    }
}
