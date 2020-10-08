<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenSyarikat extends Model
{
  protected $connection = 'sqlsrv';
  
    protected $table = 'dokumen_syarikats';
    protected $fillable = [
      'dokumen_syarikat','formds_id'
    ];

    public function dokumen(){
      return $this->belongsTo('App\FormD', 'formds_id');
    }
}
