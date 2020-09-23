<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempohNotifikasi extends Model
{
    protected $table = 'tempoh_notifikasis';
    protected $fillable = [
      'tempoh_notifikasi','status'
    ];
}
