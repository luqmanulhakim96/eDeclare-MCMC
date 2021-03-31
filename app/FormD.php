<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class FormD extends Model implements Auditable
// class FormD extends Model
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    protected $connection = 'sqlsrv';


    //
    protected $table = 'formds';
    protected $fillable = [
      'nama_pegawai','kad_pengenalan','jawatan','alamat_tempat_bertugas','nama_syarikat','no_pendaftaran_syarikat','alamat_syarikat', 'jenis_syarikat','pulangan_tahunan',
      'modal_syarikat', 'modal_dibayar', 'punca_kewangan','dokumen_syarikat','pengakuan','user_id','status',
      'nama_admin','no_admin','ulasan_admin','nama_hod','no_hod','ulasan_hod','nama_hodiv','no_hodiv','ulasan_hodiv','jabatan','no_staff'
    ];

    public static function getTableName()
    {
        return (new self())->getTable();
    }

    public function formds(){
      return $this->belongsTo(User::class, 'user_id');

    }
    public function keluargas(){
      return $this->hasMany('App\Keluarga', 'keluargas_id');

    }
    public function dokumen(){
      return $this->hasMany('App\DokumenSyarikat');

    }

    public function users(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function dokumenPegawai(){
      return $this->hasMany('App\DokumenD');

    }
}
