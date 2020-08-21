<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //
    protected $table = 'gifts';
    protected $fillable = [
      'jabatan','jenis_gift', 'nilai_gift', 'tarikh_diterima', 'nama_pemberi', 'alamat_pemberi',
      'hubungan_pemberi', 'sebab_gift', 'ulasan_jabatan', 'gambar_gift',
      'status_gift', 'user_id','status','ulasan_admin','ulasan_hod','ulasan_hodiv'
    ];

    public function gifts(){
      return $this->belongsTo(User::class, 'user_id');
      // return $this->belongsTo(User::class);
    }
}
