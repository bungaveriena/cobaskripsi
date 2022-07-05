<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKonsul extends Model
{
    protected $table = "jadwal_konsuls";
    use HasFactory;
    protected $fillable = [
        'pengaduan_id', //untuk ambil nama korban, email korban
        'pendamping_id', //untuk ambil pendamping yang mengisi konsultasi
        'tanggal',
        'pukul',
        'kronologi',
        'keterangan'
    ];

    public function pendamping()
    {
        return $this->belongsTo(Pendamping::class, 'pendamping_id');
    }

    public function pengaduan(){

        return $this->belongsTo(Pengaduan::class, 'pendamping_id');
    }
}
