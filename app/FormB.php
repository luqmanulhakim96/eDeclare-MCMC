<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormB extends Model implements Auditable
// class FormB extends Model
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    use SoftDeletes;
    protected $connection = 'sqlsrv';
    //
    protected $table = 'formbs';
    protected $fillable = [
      'nama_pegawai','kad_pengenalan','jawatan','alamat_tempat_bertugas','gaji','gaji_pasangan','jumlah_imbuhan','jumlah_imbuhan_pasangan', 'sewa','sewa_pasangan','pendapatan_pegawai','pendapatan_pasangan',
      'pinjaman_perumahan_pegawai', 'bulanan_perumahan_pegawai','pinjaman_perumahan_pasangan', 'bulanan_perumahan_pasangan',
      'pinjaman_kenderaan_pegawai', 'bulanan_kenderaan_pegawai', 'pinjaman_kenderaan_pasangan', 'bulanan_kenderaan_pasangan',
      'jumlah_cukai_pegawai', 'bulanan_cukai_pegawai', 'jumlah_cukai_pasangan', 'bulanan_cukai_pasangan',
      'jumlah_koperasi_pegawai','bulanan_koperasi_pegawai','jumlah_koperasi_pasangan', 'bulanan_koperasi_pasangan',
       'jumlah_pinjaman_pegawai', 'jumlah_bulanan_pegawai',
      'jumlah_pinjaman_pasangan','jumlah_bulanan_pasangan','jenis_harta', 'pemilik_harta','hubungan_pemilik', 'maklumat_harta', 'tarikh_pemilikan_harta', 'bilangan',
      'nilai_perolehan', 'cara_perolehan','nama_pemilikan_asal', 'jumlah_pinjaman',
      'institusi_pinjaman', 'tempoh_bayar_balik', 'ansuran_bulanan', 'tarikh_ansuran_pertama',
      'jenis_harta_pelupusan', 'alamat_asset', 'no_pendaftaran', 'harga_jualan',
      'tarikh_lupus','user_id','status','nama_admin','no_admin','ulasan_admin','nama_hod','no_hod','ulasan_hod',
      'nama_hodiv','no_hodiv','ulasan_hodiv','jabatan','no_staff'
    ];

    public static function getTableName()
    {
        return (new self())->getTable();
    }

    public function formbs(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function users(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function pinjamanbs(){
      return $this->hasMany('App\PinjamanB');
    }

    public function dividenbs(){
      return $this->hasMany('App\DividenB');
    }

    public function dokumenPegawai(){
      return $this->hasMany('App\DokumenB');

    }


}
