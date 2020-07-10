<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelupusan extends Model
{
    //
    protected $fillable = [
      'tarikh_pemilikan', 'tarikh_pelupusan', 'status_pelupusan', 'nilai_pelupusan', 'keputusan_pelupusan', 'user_id', 'assets_id'
    ];

    public function pelupusans(){
      return $this->belongsTo('App\User', 'user_id');

    }

    public function assets(){
      return $this->belongsTo('App\Asset', 'assets_id');

    }
}
