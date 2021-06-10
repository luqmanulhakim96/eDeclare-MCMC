<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormC;
use App\FormB;
use App\PinjamanB;
use DB;
use Auth;
use App\User;
use App\JenisHarta;
use App\HartaB;
use App\Email;
use App\UserExistingStaffNextofKin;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use Session;
use Illuminate\Support\Facades\Redirect;

// use App\Notifications\Form\UserFormAdminC;
use App\Jobs\SendNotificationFormC;

class FormCController extends Controller
{

  public function ajaxHarta($jenis_harta_lupus){
    $harta = HartaB::where('maklumat_harta', $jenis_harta_lupus)->get();
    echo json_encode($harta);
    exit;
  }

  public function formC()
  {
    $jenisHarta = JenisHarta::get();
    $userid = Auth::user()->id;
    $data_user = FormB::where('user_id', $userid)->where('status',"Diterima") ->get();

    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    $draft_exist = FormC::where('user_id', auth()->user()->id)->where('status', 'Disimpan ke Draf')->first();


    if($data_user->isEmpty()){
      // dd('Sila isi Lampiran B');
      Session::flash('message', "Borang C tidak tersedia kerana masih tiada harta yang telah diluluskan di dalam sistem.");
      return Redirect::back();

    }
    else {
      foreach ($data_user as $data) {
        $harta[] = HartaB::where('formbs_id',$data->id)->where('formcs_id',null)->get();
      }

      return view('user.harta.FormC.formC-has-data', compact('jenisHarta','data_user', 'harta','staffinfo', 'draft_exist'));
    }
  }



  public function kemaskini($id){
    $status = "Menunggu Kebenaran Kemaskini";
    $form=FormC::find($id);
    // dd($request->all());
    $form->status = $status;
    $form->save();

    return redirect()->route('user.harta.FormC.senaraihartaC');
  }

  public function editformC($id){
  // $userid = Auth::user()->id;
  $data = FormC::findOrFail($id);
  // dd($data);
  $harta =HartaB::where('formcs_id',$data->id) ->get();
  // $userid = Auth::user()->id;
  // $data_user = FormB::where('user_id', $userid)->where('status',"Diterima") ->get();
  // foreach ($data_user as $data) {
  //   $harta[] = HartaB::where('formbs_id',$data->id)->where('formcs_id',null)->get();
  // }

  // dd($harta);
    return view('user.harta.FormC.editformC-latest', compact('data', 'harta'));
  }


public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";
  $staffinfo = UserExistingStaffInfo::where('USERNAME', auth()->user()->username)->first();


    return FormC::create([
      'no_staff' => $data['no_staff'],
      'nama_pegawai' => $data['nama_pegawai'],
      'kad_pengenalan' => $data['kad_pengenalan'],
      'jawatan' => $data['jawatan'],
      'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
      'jabatan' => $staffinfo->OLEVEL4NAME,
      'pengakuan' => $data['pengakuan'],
      'user_id' => $userid,
      'status' => $sedang_proses,


    ]);
  }

  public function adddraft(array $data){
    $userid = Auth::user()->id;
    $sedang_proses= "Disimpan ke Draf";
    $staffinfo = UserExistingStaffInfo::where('USERNAME', auth()->user()->username)->first();

      return FormC::create([
        'nama_pegawai' => $data['nama_pegawai'],
        'kad_pengenalan' => $data['kad_pengenalan'],
        'jawatan' => $data['jawatan'],
        'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
        'jabatan' => $staffinfo->OLEVEL4NAME,
        'user_id' => $userid,
        'status' => $sedang_proses,
        // 'harta_id'=> $data['id_harta_']


      ]);
    }

  protected function validatordraft(array $data)
{
    return Validator::make($data, [
      'nama_pegawai' =>['nullable', 'string'],
      'kad_pengenalan' => ['nullable', 'string'],
      'jawatan' => ['nullable', 'string'],
      'alamat_tempat_bertugas' => ['nullable', 'string'],
      'jabatan' =>['nullable', 'string'],
      'jenis_harta_lupus_[]' =>['nullable', 'string'],
      'pemilik_harta_pelupusan_[]' => ['nullable', 'string'],
      'hubungan_pemilik_pelupusan_[]' =>['nullable', 'string'],
      'no_pendaftaran_harta_[]' =>['nullable', 'string'],
      'tarikh_pemilikan_[]' =>['nullable', 'date'],
      'tarikh_pelupusan_[]' => ['nullable', 'date'],
      'cara_pelupusan_[]' => ['nullable', 'string'],
      'nilai_pelupusan_[]' => ['nullable', 'numeric'],
      'pengakuan' => ['nullable'],

    ]);
}
protected function validatorpublish(array $data)
{
  return Validator::make($data, [

    'jenis_harta_lupus_' => ['array'],
    'jenis_harta_lupus_.*' => ['required', 'string'],
    'pemilik_harta_pelupusan_' => ['array'],
    'pemilik_harta_pelupusan_.*' => ['required', 'string'],
    'hubungan_pemilik_pelupusan_' =>['array'],
    'hubungan_pemilik_pelupusan_.*' =>['required', 'string'],
    'no_pendaftaran_harta_' =>['array'],
    'no_pendaftaran_harta_.*' =>['required', 'string'],
    'tarikh_pemilikan_' =>['array'],
    'tarikh_pemilikan_.*' =>['required', 'date'],
    'tarikh_pelupusan_' => ['array'],
    'tarikh_pelupusan_.*' => ['required', 'date'],
    'cara_pelupusan_' => ['array'],
    'cara_pelupusan_.*' => ['required', 'string'],
    'nilai_pelupusan_' => ['array'],
    'nilai_pelupusan_.*' => ['required', 'numeric'],
    'pengakuan' => ['required'],

  ]);
}

  public function submitForm(Request $request){
// dd($request->all());
  if ($request->has('save')){

    $this->validatordraft($request->all())->validate();
    // dd($request->all());
    event($formcs = $this->adddraft($request->all()));

    if($request->jenis_harta_lupus_){
      $count_harta = count($request->jenis_harta_lupus_);
    }
    else {
      $count_harta = 0;
    }
    // dd($request->id_harta_);
    for ($i=0; $i < $count_harta; $i++) {

        // $id= HartaB::where('id', $request->id_harta_[$i])->get('id');
        // dd($id);
        $harta = HartaB::findOrFail($request->id_harta_[$i]);
        // dd($harta);
        // $harta=HartaB::find();

        $harta->tarikh_pelupusan = $request->tarikh_pelupusan_[$i];
        $harta->cara_pelupusan= $request->cara_pelupusan_[$i];
        $harta->nilai_pelupusan = $request->nilai_pelupusan_[$i];
        $harta->formcs_id = $formcs-> id;
        $harta->save();


      }

      // dd('berjaya');
    return redirect()->route('user.harta.senaraidraft');
  }
  else if ($request->has('publish'))
  {

    $this->validatorpublish($request->all())->validate();
    // dd($request->all());
    event($formcs = $this->add($request->all()));

    if($request->jenis_harta_lupus_){
      $count_harta = count($request->jenis_harta_lupus_);
    }
    else {
      $count_harta = 0;
    }
    // dd($request->id_harta_);
    for ($i=0; $i < $count_harta; $i++) {

        // $id= HartaB::where('id', $request->id_harta_[$i])->get('id');
        // dd($id);
        $harta = HartaB::findOrFail($request->id_harta_[$i]);
        // dd($harta);
        // $harta=HartaB::find();
        $harta->tarikh_pelupusan = $request->tarikh_pelupusan_[$i];
        $harta->cara_pelupusan= $request->cara_pelupusan_[$i];
        $harta->nilai_pelupusan = $request->nilai_pelupusan_[$i];
        $harta->formcs_id = $formcs-> id;
        $harta->save();
      }

    //send notification to admin (noti yang dia dah berjaya declare)
    $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
    // $email = null; // for testing
    $admin_available = User::where('role','=','1')->get(); //get system admin information
    // if ($email) {
      foreach ($admin_available as $data) {
        // $formcs->notify(new UserFormAdminC($data, $email));
        $this->dispatch(new SendNotificationFormC($data, $email, $formcs));
      }

  return redirect()->route('user.harta.FormC.senaraihartaC');
  }
}

public function update($id,$sedang_proses){
  $formcs = FormC::find($id);
  $formcs->pengakuan = request()->pengakuan;
  $formcs->status= $sedang_proses;
  $formcs->save();
}

public function updateformC(Request $request,$id){
  // dd($request->all());
  if ($request->has('save')){
    $this->validatordraft(request()->all())->validate();
    $formcs = FormC::find($id);
    $sedang_proses = "Disimpan ke Draf";
    $this->update($id,$sedang_proses);

    if($request->jenis_harta_lupus_){
      $count_harta = count($request->jenis_harta_lupus_);
    }
    else {
      $count_harta = 0;
    }
    // dd($request->id_harta_);
    for ($i=0; $i < $count_harta; $i++) {
        $harta = HartaB::findOrFail($request->id_harta_[$i]);
        $harta->tarikh_pelupusan = $request->tarikh_pelupusan_[$i];
        $harta->cara_pelupusan= $request->cara_pelupusan_[$i];
        $harta->cara_pelupusan= $request->nilai_pelupusan_[$i];
        // if($request->tarikh_pelupusan_[$i] != null){
        //   $harta->tarikh_pelupusan = $request->tarikh_pelupusan_[$i];
        // }
        // if($request->cara_pelupusan_[$i] != null){
        //   $harta->cara_pelupusan= $request->cara_pelupusan_[$i];
        // }
        // if($request->nilai_pelupusan_[$i] != null){
        //   $harta->cara_pelupusan= $request->nilai_pelupusan_[$i];
        // }
        $harta->formcs_id = $formcs-> id;
        $harta->save();
      }

    return redirect()->route('user.harta.senaraidraft');
  }
  else if ($request->has('publish')){
  $this->validatorpublish(request()->all())->validate();
  $formcs = FormC::find($id);
    //send notification to admin (noti yang dia dah berjaya declare)
  $sedang_proses="Sedang Diproses";
  $this->update($id,$sedang_proses);

  if($request->jenis_harta_lupus_){
    $count_harta = count($request->jenis_harta_lupus_);
  }
  else {
    $count_harta = 0;
  }
  // dd($request->id_harta_);
  for ($i=0; $i < $count_harta; $i++) {

      // $id= HartaB::where('id', $request->id_harta_[$i])->get('id');
      // dd($id);
      $harta = HartaB::findOrFail($request->id_harta_[$i]);
      // dd($harta);
      // $harta=HartaB::find();
      $harta->tarikh_pelupusan = $request->tarikh_pelupusan_[$i];
      $harta->cara_pelupusan= $request->cara_pelupusan_[$i];
      $harta->nilai_pelupusan = $request->nilai_pelupusan_[$i];
      $harta->formcs_id = $formcs-> id;
      $harta->save();
    }

    $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
    // $email = null; // for testing
    $admin_available = User::where('role','=','1')->get(); //get system admin information
    // if ($email) {
      foreach ($admin_available as $data) {
        // $formcs->notify(new UserFormAdminC($data, $email));
        $this->dispatch(new SendNotificationFormC($data, $email, $formcs));
      }
    return redirect()->route('user.harta.FormC.senaraihartaC');
    }
  }
}
