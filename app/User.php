<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [

         'name','no_staff','email', 'password', 'kad_pengenalan', 'jabatan','jawatan', 'alamat_tempat_bertugas', 'nama_pasangan',
         'kad_pengenalan_pasangan', 'pekerjaan_pasangan', 'gaji', 'nama_anak', 'umur_anak', 'no_kad_pengenalan_anak', 'lain_lain_pendapatan_bulanan', 'role', 'status', 'should_re_login'

     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //{{--protected $hidden = [
      //  'password',--}}

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    //{{--protected $casts = [
      //  'email_verified_at' => 'datetime',
  //  ];--}}

    public function gift(){
      return $this->hasMany('App\Gift');
    }

    public function asset(){
      return $this->hasMany('App\Asset');
    }

    public function formb(){
      return $this->hasMany('App\FormB');
    }

    public function formc(){
      return $this->hasMany('App\FormC');
    }

    public function keluarga(){
      return $this->hasMany('App\Keluarga');
    }

    public function pendapatan(){
      return $this->hasMany('App\Pendapatan');
    }

    public function pelupusan(){
      return $this->hasMany('App\Pelupusan');
    }

    public function syarikat(){
      return $this->hasMany('App\Syarikat');
    }

    public function tanggungan(){
      return $this->hasMany('App\Tanggungan');
    }
}
