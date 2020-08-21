<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class Pendapatan extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  use Notifiable;

  protected $fillable = [
    'gaji', 'jumlah_imbuhan', 'sewa', 'jenis_dividen', 'dividen', 'gaji_pasangan',
    'jumlah_imbuhan_pasangan', 'sewa_pasangan', 'jenis_dividen_pasangan', 'dividen_pasangan',
    'jumlah_pendapatan', 'jumlah_pendapatan_pasangan', 'user_id'
  ];

  public function pendapat(){
    return $this->belongsTo('App\User', 'user_id');

  }
    //
}
