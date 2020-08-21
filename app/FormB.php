<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FormB extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    //
    protected $table = 'formbs';
    protected $fillable = [
      'gaji_pasangan','jumlah_imbuhan','jumlah_imbuhan_pasangan', 'sewa','sewa_pasangan',
      'pinjaman_perumahan_pegawai', 'bulanan_perumahan_pegawai','pinjaman_perumahan_pasangan', 'bulanan_perumahan_pasangan',
      'pinjaman_kenderaan_pegawai', 'bulanan_kenderaan_pegawai', 'pinjaman_kenderaan_pasangan', 'bulanan_kenderaan_pasangan',
      'jumlah_cukai_pegawai', 'bulanan_cukai_pegawai', 'jumlah_cukai_pasangan', 'bulanan_cukai_pasangan',
      'jumlah_koperasi_pegawai','bulanan_koperasi_pegawai','jumlah_koperasi_pasangan', 'bulanan_koperasi_pasangan',
       'jumlah_pinjaman_pegawai', 'jumlah_bulanan_pegawai',
      'jumlah_pinjaman_pasangan','jumlah_bulanan_pasangan','jenis_harta', 'pemilik_harta','hubungan_pemilik', 'maklumat_harta', 'tarikh_pemilikan_harta', 'bilangan',
      'nilai_perolehan', 'cara_perolehan','nama_pemilikan_asal', 'jumlah_pinjaman',
      'institusi_pinjaman', 'tempoh_bayar_balik', 'ansuran_bulanan', 'tarikh_ansuran_pertama',
      'jenis_harta_pelupusan', 'alamat_asset', 'no_pendaftaran', 'harga_jualan',
      'tarikh_lupus','user_id','status','ulasan_admin','ulasan_hod','ulasan_hodiv'
    ];
    public function formbs(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function pinjamanbs(){
      return $this->hasMany('App\PinjamanB');
    }

    public function dividenbs(){
      return $this->hasMany('App\DividenB');
    }


}
