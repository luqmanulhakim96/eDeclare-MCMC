<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormC;
use App\PinjamanB;
use DB;

class FormCController extends Controller
{
  public function formC()
  {
    return view('user.harta.formC');
  }
public function editformC($id){
    //$info = SenaraiHarga::find(1);
    $info = FormC::findOrFail($id);
    //dd($info);
    return view('user.harta.formC', compact('info'));
  }

public function add(array $data){
    return FormC::create([
      'jenis_harta_lupus' => $data['jenis_harta_lupus'],
      'pemilik_harta_pelupusan' => $data['pemilik_harta_pelupusan'],
      'hubungan_pemilik_pelupusan' => $data['hubungan_pemilik_pelupusan'],
      'no_pendaftaran_harta' => $data['no_pendaftaran_harta'],
      'tarikh_pemilikan' => $data['tarikh_pemilikan'],
      'tarikh_pelupusan' => $data['tarikh_pelupusan'],
      'cara_pelupusan' => $data['cara_pelupusan'],
      'nilai_pelupusan' => $data['nilai_pelupusan'],
      'pengakuan' => $data['pengakuan'],

    ]);
  }

  protected function validator(array $data)
{
    return Validator::make($data, [
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

  $this->validator($request->all())->validate();
 // dd($request->all());
  event($formcs = $this->add($request->all()));
   //dd($request->all());
   // dd($request->dividen_1);

   // $count = count($request->dividen_1);
   // // dd($request->dividen_1);
   //
   //  for ($i=0; $i < $count; $i++) {
	 //  $dividen_bs = new DividenB();
	 //  $dividen_bs->dividen_1 = $request->dividen_1[$i];
	 //  $dividen_bs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
   //  $dividen_bs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
   //  //dd($request->all());
   //  $dividen_bs->save();
return redirect()->route('user.harta.senaraiharta');
    }

    // $count = count($request->lain_lain_pinjaman);
    // // dd($request->dividen_1);
    //
    //  for ($i=0; $i < $count; $i++) {
 	  // $pinjaman_bs = new PinjamanB();
 	  // $pinjaman_bs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
 	  // $pinjaman_bs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
    // $pinjaman_bs->bulanan_pegawai = $request->bulanan_pegawai[$i];
    // $pinjaman_bs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
    // $pinjaman_bs->bulanan_pasangan = $request->bulanan_pasangan[$i];
    //  //dd($request->all());
    //  $pinjaman_bs->save();
    //
    //  }



}

// public function deleteHadiah($id){
//     $gifts = Gift::find($id);
//     $gifts-> delete();
//     return redirect()->route('user.hadiah.senaraihadiah');
// }
//
// public function update($id){
//   $gifts = Gift::find($id);
//   $gifts->jenis_gift = request()->jenis_hadiah;
//   $gifts->nilai_gift = request()->nilai_hadiah;
//   $gifts->tarikh_diterima = request()->tarikh_diterima;
//   $gifts->alamat_pemberi = request()->alamat_pemberi;
//   $gifts->hubungan_pemberi = request()->hubungan_pemberi;
//   $gifts->sebab_gift = request()->sebab_hadiah;
//   $gifts->gambar_gift = request()->gambar_hadiah;
//   $gifts->save();
// }
//
// public function updateHadiah($id){
//   $this->validator(request()->all())->validate();
//   //dd($request->all());
//
//   $this->update($id);
//   return redirect()->route('user.hadiah.senaraihadiah');
// }
