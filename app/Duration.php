<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'durations';
  protected $fillable = [
    'duration'
  ];


}
