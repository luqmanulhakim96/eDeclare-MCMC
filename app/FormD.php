<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormD extends Model
{
    //
    protected $fillable = [
      'nama_syarikat','no_pendaftaran_syarikat','alamat_syarikat', 'jenis_syarikat','pulangan_tahunan',
      'modal_syarikat', 'modal_dibayar', 'punca_kewangan','nama_ahli','hubungan',
      'jawatan_syarikat','jumlah_saham','nilai_saham', 'dokumen_syarikat','pengakuan','user_id'
    ];
    public function formc(){
      return $this->belongsTo('App\User', 'user_id');

    }
}
