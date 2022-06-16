<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendamping extends Model
{
    use HasFactory;
    protected $table = "locations";
    protected $fillable = [
        'nama_pendamping', 'pendidikan', 'email', 'no_tlp'
    ];
}
