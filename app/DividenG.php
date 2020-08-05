<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DividenG extends Model
{
  protected $table = 'dividen_gs';
  protected $fillable = [
    'jenis_dividen', 'dividen', 'dividen_pasangan',
  ];
  public function dividengs(){
    return $this->hasMany('App\FormG');
  }
}
