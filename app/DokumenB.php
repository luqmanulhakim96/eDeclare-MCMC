<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenB extends Model
{
  protected $connection = 'sqlsrv';
  
    protected $table = 'dokumen_bs';
    protected $fillable = [
      'dokumen_pegawai','formbs_id'
    ];

    public function dokumen(){
      return $this->belongsTo('App\FormB', 'formbs_id');
    }
}
