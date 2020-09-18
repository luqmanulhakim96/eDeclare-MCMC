<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenD extends Model
{
    protected $table = 'dokumen_ds';
    protected $fillable = [
      'dokumen_pegawai','formds_id'
    ];

    public function dokumen(){
      return $this->belongsTo('App\FormD', 'formds_id');
    }
}
