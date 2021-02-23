<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;

class GiftB extends Model implements Auditable
// class GiftB extends Model
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    protected $connection = 'sqlsrv';


    //
    protected $table = 'giftbs';
    protected $fillable = [
      'jawatan','jabatan','jenis_gift', 'nilai_gift', 'tarikh_diterima', 'nama_pemberi', 'alamat_pemberi',
      'hubungan_pemberi', 'sebab_gift', 'ulasan_jabatan', 'gambar_gift','bahagian',
      'status_gift', 'user_id','status','nama_admin','no_admin','ulasan_admin','ulasan_hod','ulasan_hodiv',
      'nama_pegawai','no_kad_pengenalan'
    ];

    public function giftbs(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function users(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function jenishadiahb(){
      return $this->hasMany('App\JenisHadiah');
    }
}
