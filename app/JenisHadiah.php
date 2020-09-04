<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class JenisHadiah extends Model
{
    //
    protected $table = 'jenis_hadiahs';
    protected $fillable = [
      'jenis_gift','status_jenis_hadiah'
    ];

    // public function jenishadiah(){
    //   return $this->belongsTo(Gift::class, 'gifts_id');
    //   // return $this->belongsTo(User::class);
    // }
    //
    // public function jenishadiahb(){
    //   return $this->belongsTo(GiftB::class, 'giftbs_id');
    //   // return $this->belongsTo(User::class);
    // }
}
