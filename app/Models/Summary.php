<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = "summaries";
    protected $fillable = ['summary'];
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuan(){

        return $this->belongsTo(PengajuanCek::class);
    }
}
