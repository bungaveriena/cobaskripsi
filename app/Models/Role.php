<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $guarded = [];
    use HasFactory;

    public function users()
  {
      return $this->hasMany(User::class);
  }
}
