<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gift extends Model implements Auditable
// class Gift extends Model
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    use SoftDeletes;
    protected $connection = 'sqlsrv';


    //
    protected $table = 'gifts';
    protected $fillable = [
      'jawatan','jabatan','jenis_gift', 'nilai_gift', 'tarikh_diterima', 'nama_pemberi', 'alamat_pemberi','bahagian',
      'hubungan_pemberi', 'sebab_gift', 'ulasan_jabatan', 'gambar_gift',
      'status_gift', 'user_id','status','nama_admin','no_admin','ulasan_admin','nama_hod','no_hod','ulasan_hod','nama_hodiv','no_hodiv','ulasan_hodiv','nama_pegawai','no_kad_pengenalan'
    ];

    public function gifts(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function users(){
      return $this->belongsTo(User::class, 'user_id');

    }

    public function jenishadiah(){
      return $this->hasMany('App\JenisHadiah');
    }
}
