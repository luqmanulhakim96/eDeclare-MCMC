<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormC;
use App\PinjamanB;
use DB;
use Auth;
use App\User;
use App\JenisHarta;
use App\Email;

// use App\Notifications\Form\UserFormAdminC;
use App\Jobs\SendNotificationFormC;

class FormCController extends Controller
{
  public function formC()
  {
    $jenisHarta = JenisHarta::get();
    return view('user.harta.FormC.formC', compact('jenisHarta'));
  }
public function editformC($id){
    //$info = SenaraiHarga::find(1);
    $info = FormC::findOrFail($id);
    $jenisHarta = JenisHarta::get();
    //dd($info);
    return view('user.harta.FormC.editformC', compact('info','jenisHarta'));
  }

public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";

    return FormC::create([
      'jabatan' => $data['jabatan'],
      'jenis_harta_lupus' => $data['jenis_harta_lupus'],
      'pemilik_harta_pelupusan' => $data['pemilik_harta_pelupusan'],
      'hubungan_pemilik_pelupusan' => $data['hubungan_pemilik_pelupusan'],
      'no_pendaftaran_harta' => $data['no_pendaftaran_harta'],
      'tarikh_pemilikan' => $data['tarikh_pemilikan'],
      'tarikh_pelupusan' => $data['tarikh_pelupusan'],
      'cara_pelupusan' => $data['cara_pelupusan'],
      'nilai_pelupusan' => $data['nilai_pelupusan'],
      'pengakuan' => $data['pengakuan'],
      'user_id' => $userid,
      'status' => $sedang_proses,


    ]);
  }

  public function adddraft(array $data){
    $userid = Auth::user()->id;
    $sedang_proses= "Disimpan ke Draf";

      return FormC::create([
        'jabatan' => $data['jabatan'],
        'jenis_harta_lupus' => $data['jenis_harta_lupus'],
        'pemilik_harta_pelupusan' => $data['pemilik_harta_pelupusan'],
        'hubungan_pemilik_pelupusan' => $data['hubungan_pemilik_pelupusan'],
        'no_pendaftaran_harta' => $data['no_pendaftaran_harta'],
        'tarikh_pemilikan' => $data['tarikh_pemilikan'],
        'tarikh_pelupusan' => $data['tarikh_pelupusan'],
        'cara_pelupusan' => $data['cara_pelupusan'],
        'nilai_pelupusan' => $data['nilai_pelupusan'],
        'pengakuan' => $data['pengakuan'],
        'user_id' => $userid,
        'status' => $sedang_proses,


      ]);
    }

  protected function validator(array $data)
{
    return Validator::make($data, [
      'jabatan' =>['nullable', 'string'],
      'jenis_harta_lupus' =>['nullable', 'string'],
      'pemilik_harta_pelupusan' => ['nullable', 'string'],
      'hubungan_pemilik_pelupusan' =>['nullable', 'string'],
      'no_pendaftaran_harta' =>['nullable', 'string'],
      'tarikh_pemilikan' =>['nullable', 'date'],
      'tarikh_pelupusan' => ['nullable', 'date'],
      'cara_pelupusan' => ['nullable', 'string'],
      'nilai_pelupusan' => ['nullable', 'numeric'],
      'pengakuan' => ['nullable', 'string'],

    ]);
}

  public function submitForm(Request $request){
  if ($request->has('save')){

    $this->validator($request->all())->validate();
    event($formcs = $this->adddraft($request->all()));

    return redirect()->route('user.harta.senaraidraft');
  }
  else if ($request->has('publish'))
  {

    $this->validator($request->all())->validate();
    event($formcs = $this->add($request->all()));

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

public function update($id){
  $sedang_proses= "Sedang Diproses";
  $formcs = FormC::find($id);
  $formcs->jenis_harta_lupus = request()->jenis_harta_lupus;
  $formcs->pemilik_harta_pelupusan = request()->pemilik_harta_pelupusan;
  $formcs->hubungan_pemilik_pelupusan = request()->hubungan_pemilik_pelupusan;
  $formcs->no_pendaftaran_harta = request()->no_pendaftaran_harta;
  $formcs->tarikh_pemilikan = request()->tarikh_pemilikan;
  $formcs->tarikh_pelupusan = request()->tarikh_pelupusan;
  $formcs->nilai_pelupusan = request()->nilai_pelupusan;
  $formcs->pengakuan = request()->pengakuan;
  $formcs->status= $sedang_proses;
  $formcs->save();
}

public function updateformC(Request $request,$id){
  $this->validator(request()->all())->validate();
  $formcs = FormC::find($id);
  if($request ->status =='Disimpan ke Draf'){
    //send notification to admin (noti yang dia dah berjaya declare)
    $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
    // $email = null; // for testing
    $admin_available = User::where('role','=','1')->get(); //get system admin information
    // if ($email) {
      foreach ($admin_available as $data) {
        // $formcs->notify(new UserFormAdminC($data, $email));
        $this->dispatch(new SendNotificationFormC($data, $email, $formcs));
      }

  }
  else{

  }

  $this->update($id);
  return redirect()->route('user.harta.FormC.senaraihartaC');
}
}
