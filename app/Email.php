<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
  protected $connection = 'sqlsrv';
  
  protected $table = 'emails';
  protected $fillable = [
    'jenis','penerima','subjek','tajuk','kandungan'
  ];

}
