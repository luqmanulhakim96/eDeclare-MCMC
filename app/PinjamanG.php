<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class PinjamanG extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;
  use Notifiable;

  protected $guarded = [];
  protected $table = 'pinjaman_gs';
  protected $fillable = [
    'lain_lain_pinjaman','pinjaman_pegawai','bulanan_pegawai','pinjaman_pasangan','bulanan_pasangan','formgs_id'
  ];
  public function pinjamanbs(){
    return $this->belongsTo('App\FormG', 'formgs_id');

  }
}
