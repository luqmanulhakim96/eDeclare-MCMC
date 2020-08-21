<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DividenB extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  protected $guarded = [];
  protected $table = 'dividen_bs';
  protected $fillable = [
    'dividen_1', 'dividen_1_pegawai', 'dividen_1_pasangan','formbs_id'
  ];
  public function dividenbs(){
    return $this->belongsTo('App\FormB', 'formbs_id');

  }
}
