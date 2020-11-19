<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class DividenB extends Model implements Auditable
// class DividenB extends Model
{
  use \OwenIt\Auditing\Auditable;
  use Notifiable;
  protected $connection = 'sqlsrv';


  protected $guarded = [];
  protected $table = 'dividen_bs';
  protected $fillable = [
    'dividen_1', 'dividen_1_pegawai', 'dividen_1_pasangan','formbs_id'
  ];
  public function dividenbs(){
    return $this->belongsTo('App\FormB', 'formbs_id');

  }
}
