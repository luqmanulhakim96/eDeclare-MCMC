<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class Pinjaman extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  use Notifiable;

  protected $table = 'pinjamans';
  protected $fillable = [
    'institusi','alamat_institusi', 'ansuran_bulanan','tarikh_ansuran','tempoh_pinjaman',
  ];
  public function pinjamans(){
    return $this->hasMany('App\FormG');
  }
}
