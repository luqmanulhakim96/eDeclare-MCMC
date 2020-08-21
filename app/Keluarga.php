<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class Keluarga extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    
    //
    protected $guarded = [];
    protected $table = 'keluargas';
    protected $fillable = [
      'nama_ahli','hubungan', 'jawatan_syarikat', 'jumlah_saham','nilai_saham','formds_id'
    ];

    public function keluargas(){
      return $this->belongsTo('App\FormD', 'formds_id');

    }
}
