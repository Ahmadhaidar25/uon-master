<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listmapel extends Model
{
    use HasFactory;

    protected $table='listmapel';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class);
    }


    public function plmapel()
    {
        return $this->hasMany(plmapel::class);
    }

    public function tugas()
    {
        return $this->hasMany(tugas::class);
    }
}
