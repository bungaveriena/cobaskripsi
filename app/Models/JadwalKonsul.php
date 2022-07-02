<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKonsul extends Model
{
    protected $table = "jadwal_konsuls";
    protected $guarded = [];
    use HasFactory;

    public function pendamping()
    {
        return $this->belongsTo(Pendamping::class);
    }

    public function pengaduan(){

        return $this->belongsTo(Pengaduan::class);
    }
}
