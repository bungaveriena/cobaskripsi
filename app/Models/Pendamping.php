<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    use HasFactory;
    protected $table = "data_pendampings";
    protected $fillable = [
        'nama_pendamping', 'pendidikan', 'email', 'no_tlp'
    ];

    public function jadwal(){
        return $this->hasMany(JadwalKonsul::class);
    }
}
