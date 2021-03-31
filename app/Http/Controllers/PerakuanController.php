<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Asset;
use DB;
use Auth;
use App\UserExistingStaffInfo;

class PerakuanController extends Controller
{
    //
    public function perakuanBaru(){
      $username =Auth::user()->username;
      $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
      return view('user.perakuanharta.formA',compact('staffinfo'));
  }

  public function add(array $data){
    $userid = Auth::user()->id;
    $status = "Lampiran A";
      return Asset::create([
        'no_staff' => $data['no_staff'],
        'nama_pegawai' => $data['nama_pegawai'],
        'kad_pengenalan' => $data['kad_pengenalan'],
        'jawatan' => $data['jawatan'],
        'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
        'perakuan' => $data['perakuan'],
        'tarikh_perakuan' => $data['tarikh_perakuan'],
        'user_id' => $userid,
        'status' => $status,

      ]);
    }

    protected function validator(array $data)
  {
      return Validator::make($data, [
        'perakuan'=> ['required', 'string'],
        'tarikh_perakuan'=> ['required','date'],
      ]);
  }

    public function submitForm(Request $request){
// dd($request->all());
    $this->validator($request->all())->validate();
// dd($request->all());
    event($perakuanharta = $this->add($request->all()));
    return redirect()->route('user.form');

  }
}
