<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormC extends Model
{
    //
    protected $table = 'formcs';
    protected $fillable = [
      'jenis_harta_lupus','pemilik_harta_pelupusan','hubungan_pemilik_pelupusan', 'no_pendaftaran_harta','tarikh_pemilikan',
      'tarikh_pelupusan', 'cara_pelupusan', 'nilai_pelupusan','pengakuan','user_id'
    ];
    public function formc(){
      return $this->belongsTo('App\User', 'user_id');

    }
}
