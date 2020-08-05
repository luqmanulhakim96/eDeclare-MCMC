<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DividenB extends Model
{
  protected $guarded = [];
  protected $table = 'dividen_bs';
  protected $fillable = [
    'dividen_1', 'dividen_1_pegawai', 'dividen_1_pasangan','formbs_id'
  ];
  public function dividenbs(){
    return $this->belongsTo('App\FormB', 'formbs_id');

  }
}
