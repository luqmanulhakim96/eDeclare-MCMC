<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormD;
use App\Keluarga;
use DB;
use Auth;

class FormDController extends Controller
{
  public function formD()
  {
    return view('user.harta.FormD.formD');
  }

public function editformD($id){
    //$info = SenaraiHarga::find(1);
    $info = FormD::findOrFail($id);
    //dd($info);
    $keluarga = Keluarga::where('formds_id', $info->id) ->get();
    $count_keluarga = Keluarga::where('formds_id', $info->id)->count();
    // dd($count_keluarga);
    return view('user.harta.FormD.editformD', compact('info','keluarga','count_keluarga'));
  }

public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";

    return FormD::create([
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
      'dokumen_syarikat' => $data['dokumen_syarikat'],
      'pengakuan' => $data['pengakuan'],
      'user_id' => $userid,
      'status' => $sedang_proses,



    ]);
  }

  protected function validator(array $data)
{
    return Validator::make($data, [
      'nama_syarikat' =>['nullable', 'string'],
      'no_pendaftaran_syarikat' => ['nullable', 'string'],
      'alamat_syarikat' =>['nullable', 'string'],
      'jenis_syarikat' =>['nullable', 'string'],
      'pulangan_tahunan' =>['nullable', 'string'],
      'modal_syarikat' => ['nullable', 'string'],
      'modal_dibayar' => ['nullable', 'string'],
      'punca_kewangan' => ['nullable', 'string'],
      'nama_ahli[]' => ['nullable', 'string'],
      'hubungan[]' => ['nullable', 'string'],
      'jawatan_syarikat[]' => ['nullable', 'string'],
      'jumlah_saham[]' => ['nullable', 'string'],
      'nilai_saham[]' => ['nullable', 'string'],
      'dokumen_syarikat' => ['nullable', 'string'],
      'pengakuan' => ['nullable', 'string'],

    ]);
}

  public function submitForm(Request $request){

  $this->validator($request->all())->validate();
  // dd($request->all());
  event($formds = $this->add($request->all()));
   // dd($request->all());
   // dd($request->dividen_1);

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
    $keluargas->formds_id = $formds-> id;
    $keluargas->keluarga_id = $count_id;
    $keluargas->save();

    }
    //send notification to admin (noti yang dia dah berjaya declare)

    return redirect()->route('user.harta.FormD.senaraihartaD');
     }


// public function deleteHadiah($id){
//     $gifts = Gift::find($id);
//     $gifts-> delete();
//     return redirect()->route('user.hadiah.senaraihadiah');
// }
//
public function update($id){
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

  $this->update($id);
  return redirect()->route('user.harta.FormD.senaraihartaD');
}
}
