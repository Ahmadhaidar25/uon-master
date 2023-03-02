<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';

    public function ujian()
    {
        return $this->hasMany(ujian::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
