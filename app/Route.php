<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'routes';
  protected $fillable = [
    'jawatan','layout','roles'
  ];

  public function users(){
    return $this->hasMany('App\User');

  }
}
