<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class DividenG extends Model implements Auditable
// class DividenG extends Model
{
  use \OwenIt\Auditing\Auditable;
  use Notifiable;
  protected $connection = 'sqlsrv';


  protected $table = 'dividen_gs';
  protected $fillable = [
    'jenis_dividen', 'dividen', 'dividen_pasangan',
  ];
  public function dividengs(){
    return $this->hasMany('App\FormG');
  }
}
