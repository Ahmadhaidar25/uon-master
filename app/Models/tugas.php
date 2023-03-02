<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function plmapel()
    {
        return $this->belongsTo(plmapel::class);
    }

    public function nilai()
    {
        return $this->nilai(nilai::class);
    }

     public function listmapel()
    {
        return $this->belongsTo(listmapel::class);
    }
}
