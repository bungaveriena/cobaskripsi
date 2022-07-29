<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    use HasFactory;
    protected $table = "data_pendampings";
    protected $fillable = [
        'pendidikan', 'asal_instansi', 'no_tlp'
    ];

    public function jadwal(){
        return $this->hasMany(JadwalKonsul::class);
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
