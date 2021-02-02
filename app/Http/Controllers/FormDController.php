<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormD;
use App\Keluarga;
use App\DokumenSyarikat;
use DB;
use Auth;
use App\User;
use App\Email;
use App\UserExistingStaffNextofKin;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;

use App\Jobs\SendNotificationFormD;

class FormDController extends Controller
{
  public function formD()
  {
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    return view('user.harta.FormD.formD',compact('staffinfo'));
  }

  public function kemaskini($id){
    $status = "Menunggu Kebenaran Kemaskini";
    $form=FormD::find($id);
    // dd($request->all());
    $form->status = $status;
    $form->save();

    return redirect()->route('user.harta.FormD.senaraihartaD');
  }

public function editformD($id){
    //$info = SenaraiHarga::find(1);
    $info = FormD::findOrFail($id);
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();

    $keluarga = Keluarga::where('formds_id', $info->id) ->get();
    $count_keluarga = Keluarga::where('formds_id', $info->id)->count();
    $dokumen_syarikat = DokumenSyarikat::where('formds_id', $info->id) ->get();
    // dd($dokumen_syarikat);
    return view('user.harta.FormD.editformD', compact('info','keluarga','count_keluarga','dokumen_syarikat','staffinfo'));
  }

public function add(array $data){
  $userid = Auth::user()->id;

  $sedang_proses= "Sedang Diproses";
  if(is_null($data['pengakuan'])){
    $pengakuan = false;
  }

    return FormD::create([
      'nama_pegawai' => $data['nama_pegawai'],
      'kad_pengenalan' => $data['kad_pengenalan'],
      'jawatan' => $data['jawatan'],
      'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
      'jabatan' => $data['jabatan'],
      'nama_syarikat' => $data['nama_syarikat'],
      'no_pendaftaran_syarikat' => $data['no_pendaftaran_syarikat'],
      'alamat_syarikat' => $data['alamat_syarikat'],
      'jenis_syarikat' => $data['jenis_syarikat'],
      'pulangan_tahunan' => $data['pulangan_tahunan'],
      'modal_syarikat' => $data['modal_syarikat'],
      'modal_dibayar' => $data['modal_dibayar'],
      'punca_kewangan' => $data['punca_kewangan'],
      'nama_ahli' => $data['nama_ahli'],
      'hubungan' => $data['hubungan'],
      'jawatan_syarikat' => $data['jawatan_syarikat'],
      'jumlah_saham' => $data['jumlah_saham'],
      'nilai_saham' => $data['nilai_saham'],
      'pengakuan' => $data['pengakuan'],
      'user_id' => $userid,
      'status' => $sedang_proses,

    ]);
  }

  public function adddraft(array $data,$isChecked){
    $userid = Auth::user()->id;
    // dd($isChecked);
    $sedang_proses= "Disimpan ke Draf";


      return FormD::create([
        'nama_pegawai' => $data['nama_pegawai'],
        'kad_pengenalan' => $data['kad_pengenalan'],
        'jawatan' => $data['jawatan'],
        'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
        'jabatan' => $data['jabatan'],
        'nama_syarikat' => $data['nama_syarikat'],
        'no_pendaftaran_syarikat' => $data['no_pendaftaran_syarikat'],
        'alamat_syarikat' => $data['alamat_syarikat'],
        'jenis_syarikat' => $data['jenis_syarikat'],
        'pulangan_tahunan' => $data['pulangan_tahunan'],
        'modal_syarikat' => $data['modal_syarikat'],
        'modal_dibayar' => $data['modal_dibayar'],
        'punca_kewangan' => $data['punca_kewangan'],
        'nama_ahli' => $data['nama_ahli'],
        'hubungan' => $data['hubungan'],
        'jawatan_syarikat' => $data['jawatan_syarikat'],
        'jumlah_saham' => $data['jumlah_saham'],
        'nilai_saham' => $data['nilai_saham'],
        'pengakuan' => $isChecked,
        'user_id' => $userid,
        'status' => $sedang_proses,

      ]);

    }

  protected function validator(array $data)
{
    return Validator::make($data, [
      'nama_pegawai' =>['nullable', 'string'],
      'kad_pengenalan' => ['nullable', 'string'],
      'jawatan' => ['nullable', 'string'],
      'alamat_tempat_bertugas' => ['nullable', 'string'],
      'jabatan' =>['nullable', 'string'],
      'nama_syarikat' =>['required', 'string'],
      'no_pendaftaran_syarikat' => ['required', 'string'],
      'alamat_syarikat' =>['required'],
      'jenis_syarikat' =>['required', 'string'],
      'pulangan_tahunan' =>['required', 'numeric'],
      'modal_syarikat' => ['required', 'numeric'],
      'modal_dibayar' => ['required', 'numeric'],
      'punca_kewangan' => ['required', 'string'],
      'nama_ahli[]' => ['nullable', 'string'],
      'hubungan[]' => ['nullable', 'string'],
      'jawatan_syarikat[]' => ['nullable', 'string'],
      'jumlah_saham[]' => ['nullable', 'string'],
      'nilai_saham[]' => ['nullable', 'string'],
      'dokumen_syarikat[]' => ['required', 'max:100000'],
      'pengakuan' => ['required'],

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
    'nama_syarikat' =>['nullable', 'string'],
    'no_pendaftaran_syarikat' => ['nullable', 'string'],
    'alamat_syarikat' =>['nullable', 'string'],
    'jenis_syarikat' =>['nullable', 'string'],
    'pulangan_tahunan' =>['nullable', 'numeric'],
    'modal_syarikat' => ['nullable', 'numeric'],
    'modal_dibayar' => ['nullable', 'numeric'],
    'punca_kewangan' => ['nullable', 'string'],
    'nama_ahli[]' => ['nullable', 'string'],
    'hubungan[]' => ['nullable', 'string'],
    'jawatan_syarikat[]' => ['nullable', 'string'],
    'jumlah_saham[]' => ['nullable', 'string'],
    'nilai_saham[]' => ['nullable', 'string'],
    'dokumen_syarikat[]' => ['nullable', 'max:100000'],
    'pengakuan' => ['nullable', 'string'],

  ]);
}

  public function submitForm(Request $request){
// dd($request->all());
  if ($request->has('save'))
  {
      $isChecked = $request->has('pengakuan');
      $this->validatordraft($request->all())->validate();


      event($formds = $this->adddraft($request->all(),$isChecked));

         // $dokumen_syarikat = $request->file('dokumen_syarikat')->store('public/uploads/dokumen_syarikat');
         // dd($request->all());
        // dd($request->dokumen_syarikat);
        if($request->dokumen_syarikat != NULL){
        foreach($request->dokumen_syarikat as $file)
        {
            $file_syarikat = new DokumenSyarikat();
            $file_syarikat->dokumen_syarikat = $file->store('public/uploads/dokumen_syarikat');
            $file_syarikat->formds_id = $formds->id;
            $file_syarikat->save();
            // dd($file_syarikat);
        }
      }

         $count = count($request->nama_ahli);
         $count_id = 0;

        for ($i=0; $i < $count; $i++) {
          $count_id++;
          $keluargas = new Keluarga();
          $keluargas->nama_ahli = $request->nama_ahli[$i];
          $keluargas->hubungan = $request->hubungan[$i];
          $keluargas->jawatan_syarikat = $request->jawatan_syarikat[$i];
          $keluargas->jumlah_saham = $request->jumlah_saham[$i];
          $keluargas->nilai_saham = $request->nilai_saham[$i];
          $keluargas->formds_id = $formds->id;
          $keluargas->keluarga_id = $count_id;
          $keluargas->save();
        }
    return redirect()->route('user.harta.senaraidraft');
  }
  else if ($request->has('publish'))
  {
    $this->validator($request->all())->validate();
    // dd($request->all());

    event($formds = $this->add($request->all()));

       // $dokumen_syarikat = $request->file('dokumen_syarikat')->store('public/uploads/dokumen_syarikat');
       // dd($request->all());
      // dd($request->dokumen_syarikat);
      foreach($request->dokumen_syarikat as $file)
      {
        // dd($file);
          $file_syarikat = new DokumenSyarikat();
          $file_syarikat->dokumen_syarikat = $file->store('public/uploads/dokumen_syarikat');
          $file_syarikat->formds_id = $formds->id;
          $file_syarikat->save();
          // dd($file_syarikat);
      }

       $count = count($request->nama_ahli);
       $count_id = 0;

      for ($i=0; $i < $count; $i++) {
        $count_id++;
        $keluargas = new Keluarga();
        $keluargas->nama_ahli = $request->nama_ahli[$i];
        $keluargas->hubungan = $request->hubungan[$i];
        $keluargas->jawatan_syarikat = $request->jawatan_syarikat[$i];
        $keluargas->jumlah_saham = $request->jumlah_saham[$i];
        $keluargas->nilai_saham = $request->nilai_saham[$i];
        $keluargas->formds_id = $formds->id;
        $keluargas->keluarga_id = $count_id;
        $keluargas->save();
      }

      //send notification to admin (noti yang dia dah berjaya declare)
      $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
      // $email = null; // for testing
      $admin_available = User::where('role','=','1')->get(); //get system admin information
      // if ($email) {
        foreach ($admin_available as $data) {
          $this->dispatch(new SendNotificationFormD($data, $email, $formds));
          // $formds->notify(new UserFormAdminC($data, $email));
        }
    return redirect()->route('user.harta.FormD.senaraihartaD');
  }

}
public function update($id){
  $sedang_proses= "Sedang Diproses";
  $formds = FormD::find($id);
  $formds->nama_syarikat = request()->nama_syarikat;
  $formds->no_pendaftaran_syarikat = request()->no_pendaftaran_syarikat;
  $formds->alamat_syarikat = request()->alamat_syarikat;
  $formds->jenis_syarikat = request()->jenis_syarikat;
  $formds->pulangan_tahunan = request()->pulangan_tahunan;
  $formds->modal_syarikat = request()->modal_syarikat;
  $formds->modal_dibayar = request()->modal_dibayar;
  $formds->punca_kewangan = request()->punca_kewangan;
  $formds->dokumen_syarikat = request()->dokumen_syarikat;
  $formds->pengakuan = request()->pengakuan;
  $formds->status= $sedang_proses;
  $formds->save();


}

public function updateFormD(Request $request,$id){
  $this->validator(request()->all())->validate();
  //dd($request->all());

  $formds = FormD::find($id);

  $count_d = Keluarga::where('formds_id', $formds->id)->get();
  $count = count($count_d);
  // dd($count);

  for ($i=0; $i < $count; $i++) {
  $id_keluarga = Keluarga::where('formds_id', $formds->id)->get('id');
  // dd($id_d);
  for ($i=0; $i < count($id_keluarga) ; $i++) {

  $keluargas = Keluarga::findOrFail($id_keluarga[$i]->id);
  $keluargas->delete();
  }
}

  $count1 = count($request->nama_ahli);
  $count = 0;

  for ($i=0; $i < $count1; $i++) {
  $count++;
  $keluargas = new Keluarga();
  $keluargas->nama_ahli = $request->nama_ahli[$i];
  $keluargas->hubungan = $request->hubungan[$i];
  $keluargas->jawatan_syarikat = $request->jawatan_syarikat[$i];
  $keluargas->jumlah_saham = $request->jumlah_saham[$i];
  $keluargas->nilai_saham = $request->nilai_saham[$i];
  $keluargas->formds_id = $formds-> id;
  $keluargas->keluarga_id = $count;
  //dd($request->all());
  $keluargas->save();

}
  if($request ->status =='Disimpan ke Draf'){
    //send notification to admin (noti yang dia dah berjaya declare)
    $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
    // $email = null; // for testing
    $admin_available = User::where('role','=','1')->get(); //get system admin information
    // if ($email) {
      foreach ($admin_available as $data) {
        $this->dispatch(new SendNotificationFormD($data, $email, $formds));
        // $formds->notify(new UserFormAdminC($data, $email));
      }
  }
  $this->update($id);
  return redirect()->route('user.harta.FormD.senaraihartaD');
}
}
