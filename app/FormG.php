<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class FormG extends Model implements Auditable
// class FormG extends Model
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    protected $connection = 'sqlsrv';


    //
    protected $table = 'formgs';
    protected $fillable = [
      'tarikh_lantikan','nama_perkhidmatan','gelaran','nama_pegawai','kad_pengenalan','jawatan','alamat_tempat_bertugas','gaji','gaji_pasangan','jumlah_imbuhan','jumlah_imbuhan_pasangan', 'sewa','sewa_pasangan','pendapatan_pegawai','pendapatan_pasangan',
      'pinjaman_perumahan_pegawai', 'bulanan_perumahan_pegawai','pinjaman_perumahan_pasangan', 'bulanan_perumahan_pasangan',
      'pinjaman_kenderaan_pegawai', 'bulanan_kenderaan_pegawai', 'pinjaman_kenderaan_pasangan', 'bulanan_kenderaan_pasangan',
      'jumlah_cukai_pegawai', 'bulanan_cukai_pegawai', 'jumlah_cukai_pasangan', 'bulanan_cukai_pasangan',
      'jumlah_koperasi_pegawai','bulanan_koperasi_pegawai','jumlah_koperasi_pasangan', 'bulanan_koperasi_pasangan',
       'jumlah_pinjaman_pegawai', 'jumlah_bulanan_pegawai',
      'jumlah_pinjaman_pasangan','jumlah_bulanan_pasangan', 'luas_pertanian','lot_pertanian',
      'mukim_pertanian', 'negeri_pertanian', 'luas_perumahan','lot_perumahan','mukim_perumahan',
      'negeri_perumahan','tarikh_diperolehi','luas', 'lot','mukim','negeri',
      'jenis_tanah', 'nama_syarikat', 'modal_berbayar','jumlah_unit_saham','nilai_saham',
      'sumber_kewangan','pengakuan','user_id','status','nama_admin','no_admin','ulasan_admin','nama_hod','no_hod','ulasan_hod',
      'nama_hodiv','no_hodiv','ulasan_hodiv','jabatan'
    ];

    public static function getTableName()
    {
        return (new self())->getTable();
    }

    public function formgs(){
      return $this->belongsTo(User::class, 'user_id');

    }
    public function pinjamangs(){
      return $this->hasMany('App\PinjamanG');
    }

    public function dividengs(){
      return $this->hasMany('App\DividenG');
    }

    public function pinjamans(){
      return $this->hasMany('App\Pinjaman');
    }

    public function users(){
      return $this->belongsTo(User::class, 'user_id');

    }
    public function dokumenPegawai(){
      return $this->hasMany('App\DokumenG');

    }
}
