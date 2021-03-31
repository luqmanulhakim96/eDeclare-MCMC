<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UlasanHodiv extends Model
{
  use Notifiable;
  protected $connection = 'sqlsrv';
  protected $fillable = [
    'nama_hodiv','no_hodiv','ulasan_hodiv','formbs_id','formcs_id','formds_id','formgs_id','gift_id','giftb_id'
  ];
  public function ulasanB(){
    return $this->belongsTo('App\FormB', 'formbs_id');
  }
  public function ulasanC(){
    return $this->belongsTo('App\FormC', 'formcs_id');
  }
  public function ulasanD(){
    return $this->belongsTo('App\FormD', 'formds_id');
  }
  public function ulasanG(){
    return $this->belongsTo('App\FormG', 'formgs_id');
  }
  public function ulasanGift(){
    return $this->belongsTo('App\Gift', 'gift_id');
  }
  public function ulasanGiftB(){
    return $this->belongsTo('App\GiftB', 'giftb_id');
  }
}
