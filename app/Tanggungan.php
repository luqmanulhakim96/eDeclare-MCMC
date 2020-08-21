<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tanggungan extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $fillable = [
    'jumlah_pinjaman_perumahan', 'jumlah_pinjaman_kenderaan', 'jumlah_cukai_pendapatan', 'jumlah_pinjaman_koperasi',
    'jumlah_lain_lain_pinjaman', 'bulanan_pinjaman_perumahan','bulanan_pinjaman_kenderaan', 'bulanan_cukai_pendapatan',
    'bulanan_pinjaman_koperasi', 'bulanan_lain_lain_pinjaman','jumlah_pinjaman_perumahan_pasangan', 'jumlah_pinjaman_kenderaan_pasangan',
    'jumlah_cukai_pendapatan_pasangan', 'jumlah_pinjaman_koperasi_pasangan', 'jumlah_lain_lain_pinjaman_pasangan',
    'bulanan_pinjaman_perumahan_pasangan','bulanan_pinjaman_kenderaan_pasangan', 'bulanan_cukai_pendapatan_pasangan',
    'bulanan_pinjaman_koperasi_pasangan', 'bulanan_lain_lain_pinjaman_pasangan', 'jumlah_pinjaman', 'jumlah_pinjaman_bulanan',
    'jumlah_pinjaman_pasangan', 'jumlah_pinjaman_bulanan_pasangan', 'users_id'
  ];

  public function tanggungan(){
    return $this->belongsTo('App\User', 'user_id');

  }
    //
}
