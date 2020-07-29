<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    protected $fillable = [
      'perakuan','tarikh_perakuan','jenis_harta', 'pemilik_harta','hubungan_pemilik', 'maklumat_harta', 'tarikh_pemilikan_harta', 'bilangan',
      'nilai_perolehan', 'cara_perolehan','nama_pemilikan_asal', 'jumlah_pinjaman',
      'institusi_pinjaman', 'tempoh_bayar_balik', 'ansuran_bulanan', 'tarikh_ansuran_pertama',
      'additional_statement', 'pengakuan_admin', 'keputusan_urusetia', 'keputusan_ketua_bahagian',
      'status_asset','user_id'
    ];
    public function assets(){
      return $this->belongsTo('App\User', 'user_id');

    }

    public function pelupusan(){
      return $this->hasMany('App\Pelupusan');
    }
}
