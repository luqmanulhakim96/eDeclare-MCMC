<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class JenisHarta extends Model
{
    //
    protected $table = 'jenis_hartas';
    protected $fillable = [
      'jenis_harta','status_jenis_harta'
    ];

}
