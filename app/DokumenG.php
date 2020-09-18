<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenG extends Model
{
    protected $table = 'dokumen_gs';
    protected $fillable = [
      'dokumen_pegawai','formgs_id'
    ];

    public function dokumen(){
      return $this->belongsTo('App\FormG', 'formgs_id');
    }
}
