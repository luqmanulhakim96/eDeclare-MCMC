<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempohNotifikasi extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'tempoh_notifikasis';
    protected $fillable = [
      'tempoh_notifikasi','status'
    ];
}
