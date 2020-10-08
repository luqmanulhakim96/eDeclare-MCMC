<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenC extends Model
{
  protected $connection = 'sqlsrv';
  
    protected $table = 'dokumen_cs';
    protected $fillable = [
      'dokumen_pegawai','formcs_id'
    ];

    public function dokumen(){
      return $this->belongsTo('App\FormC', 'formcs_id');
    }
}
