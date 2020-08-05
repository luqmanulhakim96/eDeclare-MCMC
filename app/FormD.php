<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormD extends Model
{
    //
    protected $table = 'formds';
    protected $fillable = [
      'nama_syarikat','no_pendaftaran_syarikat','alamat_syarikat', 'jenis_syarikat','pulangan_tahunan',
      'modal_syarikat', 'modal_dibayar', 'punca_kewangan','dokumen_syarikat','pengakuan','user_id'
    ];
    public function formc(){
      return $this->belongsTo('App\User', 'user_id');

    }
    public function keluargas(){
      return $this->hasMany('App\Keluarga', 'keluargas_id');

    }
}
