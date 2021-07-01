<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;
use Auth;

class FormBKeteranganMengenaiKeluarga extends Component
{
    public function render()
    {
      $username =Auth::user()->username;
      $user = UserExistingStaffInfo::where('USERNAME', $username) ->get('STAFFNO');
      $maklumat_pasangan_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();
      $maklumat_anak_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();

      if($maklumat_pasangan_check->isEmpty()){
        $maklumat_pasangan = null;
      }
      else{
        foreach ($user as $keluarga) {
          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        }
      }

      if($maklumat_anak_check->isEmpty()){
        $maklumat_anak = null;
      }
      else{
        foreach ($user as $keluarga) {

          // $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }
        }
        return view('livewire.form-b-keterangan-mengenai-keluarga',compact('maklumat_pasangan', 'maklumat_anak'));
    }
}
