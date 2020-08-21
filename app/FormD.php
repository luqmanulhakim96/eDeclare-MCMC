<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class FormD extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;

    //
    protected $table = 'formds';
    protected $fillable = [
      'nama_syarikat','no_pendaftaran_syarikat','alamat_syarikat', 'jenis_syarikat','pulangan_tahunan',
      'modal_syarikat', 'modal_dibayar', 'punca_kewangan','dokumen_syarikat','pengakuan','user_id','status','ulasan_admin','ulasan_hod','ulasan_hodiv'
    ];
    public function formds(){
      return $this->belongsTo(User::class, 'user_id');

    }
    public function keluargas(){
      return $this->hasMany('App\Keluarga', 'keluargas_id');

    }
}
