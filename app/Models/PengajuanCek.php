<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCek extends Model
{
    use HasFactory;
    protected $table ='data_pengajuan_ceks';
    protected $guarded = [];

    public function summary(){
        return $this->hasOne(Summary::class);
    }
}
