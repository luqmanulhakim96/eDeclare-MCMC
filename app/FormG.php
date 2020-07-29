<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormG extends Model
{
    //
    protected $fillable = [
      'tarikh_lantikan','nama_perkhidmatan','gelaran', 'luas_pertanian','lot_pertanian',
      'mukim_pertanian', 'negeri_pertanian', 'luas_perumahan','lot_perumahan','mukim_perumahan',
      'negeri_perumahan','tarikh_diperolehi','luas', 'lot','mukim','negeri',
      'jenis_tanah', 'nama_syarikat', 'modal_berbayar','jumlah_unit_saham','nilai_saham',
      'sumber_kewangan','institusi','alamat_institusi', 'ansuran_bulanan','tarikh_ansuran','tempoh_pinjaman',
      'pengakuan','user_id'
    ];
    
    public function formc(){
      return $this->belongsTo('App\User', 'user_id');

    }
}
