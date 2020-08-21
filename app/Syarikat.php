<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Syarikat extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $fillable = [
    'nama_syarikat', 'no_pendaftaran', 'alamat_syarikat', 'jenis_syarikat', 'income_tahunan', 'modal_syarikat',
    'paid_up_capital', 'punca_kewangan', 'ahli_perniagaan', 'hubungan_ahli',
    'jawatan_ahli', 'jumlah_saham_ahli', 'nilai_saham_ahli', 'pengakuan_admin', 'keputusan_urusetia',
    'keputusan_ketua_bahagian','user_id'
  ];

  public function syarikat(){
    return $this->belongsTo('App\User', 'user_id');

  }
    //
}
