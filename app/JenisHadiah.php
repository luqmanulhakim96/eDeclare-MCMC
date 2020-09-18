<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class JenisHadiah extends Model
{
    //
    protected $table = 'jenis_hadiahs';
    protected $fillable = [
      'jenis_gift','status_jenis_hadiah'
    ];
}
