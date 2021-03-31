<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingAuth extends Model
{

  protected $connection = 'sqlsrv';
  protected $table = 'setting_auths';
    protected $fillable = [
    'max_attempts','decay_minutes'
  ];
}
