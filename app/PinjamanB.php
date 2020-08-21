<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PinjamanB extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $guarded = [];
  protected $table = 'pinjaman_bs';
  protected $fillable = [
    'lain_lain_pinjaman','pinjaman_pegawai','bulanan_pegawai','pinjaman_pasangan','bulanan_pasangan','formbs_id'
  ];
  public function pinjamanbs(){
    return $this->belongsTo('App\FormB', 'formbs_id');

  }
}
