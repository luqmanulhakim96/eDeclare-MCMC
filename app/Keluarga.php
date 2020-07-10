<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    //
    protected $fillable = [
      'nama', 'umur', 'ic'
    ];

    public function keluarga(){
      return $this->belongsTo('App\User', 'user_id');

    }
}
