<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //
    protected $fillable = [
      'perakuan','tarikh_perakuan','jenis_harta', 'pemilik_harta', 'alamat_harta', 'no_sijil_pendaftaran', 'bilangan',
      'nilai_perolehan', 'cara_perolehan', 'jumlah_pinjaman',
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
