<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_fasilitas',
        'alamat',
        'Pj_fasilitas',
        'kondisi_id',
    ];

    public function kondisi(){
        return $this->belongsTo(Kondisi::class, "kondisi_id", "guid");
    }
}
