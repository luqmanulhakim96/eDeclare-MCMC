<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class FormC extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;

    //
    protected $table = 'formcs';
    protected $fillable = [
      'jenis_harta_lupus','pemilik_harta_pelupusan','hubungan_pemilik_pelupusan', 'no_pendaftaran_harta','tarikh_pemilikan',
      'tarikh_pelupusan', 'cara_pelupusan', 'nilai_pelupusan','pengakuan','user_id','status',
      'nama_admin','no_admin','ulasan_admin','nama_hod','no_hod','ulasan_hod','nama_hodiv','no_hodiv','ulasan_hodiv','jabatan'
    ];

    public static function getTableName()
    {
        return (new self())->getTable();
    }

    public function formcs(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function users(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function dokumenPegawai(){
      return $this->hasMany('App\DokumenC');

    }
}
