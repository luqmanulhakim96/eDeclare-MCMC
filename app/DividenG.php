<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DividenG extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  protected $table = 'dividen_gs';
  protected $fillable = [
    'jenis_dividen', 'dividen', 'dividen_pasangan',
  ];
  public function dividengs(){
    return $this->hasMany('App\FormG');
  }
}
