<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    protected $table = "komentar";
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plmapel()
    {
        return $this->belongsTo(plmapel::class);
    }

    public function cailds1()
    {
        return $this->hasMany(komentar::class,'parent');
    }
}
