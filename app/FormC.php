<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormC extends Model
{
    //
    protected $table = 'formcs';
    protected $fillable = [
      'jenis_harta_lupus','pemilik_harta_pelupusan','hubungan_pemilik_pelupusan', 'no_pendaftaran_harta','tarikh_pemilikan',
      'tarikh_pelupusan', 'cara_pelupusan', 'nilai_pelupusan','pengakuan','user_id','status','ulasan_admin','ulasan_hod','ulasan_hodiv'
    ];
    public function formcs(){
      return $this->belongsTo(User::class, 'user_id');

    }
}
