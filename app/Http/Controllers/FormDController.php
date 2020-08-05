<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormD;
use App\Keluarga;
use DB;

class FormDController extends Controller
{
  public function formD()
  {
    return view('user.harta.formD');
  }
public function editformD($id){
    //$info = SenaraiHarga::find(1);
    $info = FormD::findOrFail($id);
    //dd($info);
    return view('user.harta.formD', compact('info'));
  }

public function add(array $data){
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
    // dd($request->nama_ahli);

    for ($i=0; $i < $count; $i++) {
	  $keluargas = new Keluarga();
	  $keluargas->nama_ahli = $request->nama_ahli[$i];
	  $keluargas->hubungan = $request->hubungan[$i];
    $keluargas->jawatan_syarikat = $request->jawatan_syarikat[$i];
    $keluargas->jumlah_saham = $request->jumlah_saham[$i];
    $keluargas->nilai_saham = $request->nilai_saham[$i];
    //dd($request->all());
    $keluargas->save();

    }
   //
   //  $count = count($request->lain_lain_pinjaman);
   //  // dd($request->dividen_1);
   //
   //   for ($i=0; $i < $count; $i++) {
 	 //  $pinjaman_bs = new PinjamanB();
 	 //  $pinjaman_bs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
 	 //  $pinjaman_bs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
   //  $pinjaman_bs->bulanan_pegawai = $request->bulanan_pegawai[$i];
   //  $pinjaman_bs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
   //  $pinjaman_bs->bulanan_pasangan = $request->bulanan_pasangan[$i];
   //   //dd($request->all());
   //   $pinjaman_bs->save();
return redirect()->route('user.harta.senaraiharta');
     }



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
