<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HartaB extends Model
{
  protected $connection = 'sqlsrv';
  protected $table = 'hartas';
  protected $fillable = [
    'jenis_harta', 'pemilik_harta','hubungan_pemilik', 'maklumat_harta', 'tarikh_pemilikan_harta', 'bilangan', 'unit_bilangan',
    'nilai_perolehan', 'cara_perolehan','nama_pemilikan_asal', 'jumlah_pinjaman',
    'institusi_pinjaman', 'tempoh_bayar_balik', 'ansuran_bulanan', 'tarikh_ansuran_pertama',
    'jenis_harta_pelupusan', 'alamat_asset', 'no_pendaftaran', 'harga_jualan',
    'tarikh_lupus','formbs_id','lain-lain','cara_belian','tarikh_pelupusan','cara_pelupusan','nilai_pelupusan','tunai','keterangan_lain'
  ];


  public function formb(){
    return $this->belongsTo('App\FormB', 'formbs_id');

  }

  public function formc(){
    return $this->belongsTo('App\FormC', 'formcs_id');

  }
}
