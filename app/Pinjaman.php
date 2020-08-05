<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
  protected $table = 'pinjamans';
  protected $fillable = [
    'institusi','alamat_institusi', 'ansuran_bulanan','tarikh_ansuran','tempoh_pinjaman',
  ];
  public function pinjamans(){
    return $this->hasMany('App\FormG');
  }
}
