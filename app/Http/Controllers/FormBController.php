<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormB;
use App\DividenB;
use App\PinjamanB;
use DB;

class FormBController extends Controller
{
  public function formB()
  {
    return view('user.harta.formB');
  }
public function editformB($id){
    //$info = SenaraiHarga::find(1);
    $info = FormB::findOrFail($id);
    //dd($info);
    return view('user.harta.formB', compact('info'));
  }

public function add(array $data){
    return FormB::create([
      'gaji_pasangan' => $data['gaji_pasangan'],
      'jumlah_imbuhan' => $data['jumlah_imbuhan'],
      'jumlah_imbuhan_pasangan' => $data['jumlah_imbuhan_pasangan'],
      'sewa' => $data['sewa'],
      'sewa_pasangan' => $data['sewa_pasangan'],
      'dividen_1' => $data['dividen_1'],
      'dividen_1_pegawai' => $data['dividen_1_pegawai'],
      'dividen_1_pasangan' => $data['dividen_1_pasangan'],
      'pinjaman_perumahan_pegawai' => $data['pinjaman_perumahan_pegawai'],
      'bulanan_perumahan_pegawai' => $data['bulanan_perumahan_pegawai'],
      'pinjaman_perumahan_pasangan' => $data['pinjaman_perumahan_pasangan'],
      'bulanan_perumahan_pasangan' => $data['bulanan_perumahan_pasangan'],
      'pinjaman_kenderaan_pegawai' => $data['pinjaman_kenderaan_pegawai'],
      'bulanan_kenderaan_pegawai' => $data['bulanan_kenderaan_pegawai'],
      'pinjaman_kenderaan_pasangan' => $data['pinjaman_kenderaan_pasangan'],
      'bulanan_kenderaan_pasangan' => $data['bulanan_kenderaan_pasangan'],
      'jumlah_cukai_pegawai' => $data['jumlah_cukai_pegawai'],
      'bulanan_cukai_pegawai' => $data['bulanan_cukai_pegawai'],
      'jumlah_cukai_pasangan' => $data['jumlah_cukai_pasangan'],
      'bulanan_cukai_pasangan' => $data['bulanan_cukai_pasangan'],
      'jumlah_koperasi_pegawai' => $data['jumlah_koperasi_pegawai'],
      'bulanan_koperasi_pegawai' => $data['bulanan_koperasi_pegawai'],
      'jumlah_koperasi_pasangan' => $data['jumlah_koperasi_pasangan'],
      'bulanan_koperasi_pasangan' => $data['bulanan_koperasi_pasangan'],
      'lain_lain_pinjaman'=> $data['lain_lain_pinjaman'],
      'pinjaman_pegawai'=>$data['pinjaman_pegawai'],
      'bulanan_pegawai'=> $data['bulanan_pegawai'],
      'pinjaman_pasangan'=> $data['pinjaman_pasangan'],
      'bulanan_pasangan'=> $data['bulanan_pasangan'],
      'jumlah_pinjaman_pegawai' => $data['jumlah_pinjaman_pegawai'],
      'jumlah_bulanan_pegawai' => $data['jumlah_bulanan_pegawai'],
      'jumlah_pinjaman_pasangan' => $data['jumlah_pinjaman_pasangan'],
      'jumlah_bulanan_pasangan' => $data['jumlah_bulanan_pasangan'],
      'jenis_harta' => $data['jenis_harta'],
      'pemilik_harta' => $data['pemilik_harta'],
      'hubungan_pemilik' => $data['hubungan_pemilik'],
      'maklumat_harta' => $data['maklumat_harta'],
      'tarikh_pemilikan_harta' => $data['tarikh_pemilikan_harta'],
      'bilangan' => $data['bilangan'],
      'nilai_perolehan' => $data['nilai_perolehan'],
      'cara_perolehan' => $data['cara_perolehan'],
      'nama_pemilikan_asal' => $data['nama_pemilikan_asal'],
      'jumlah_pinjaman' => $data['jumlah_pinjaman'],
      'institusi_pinjaman' => $data['institusi_pinjaman'],
      'tempoh_bayar_balik' => $data['tempoh_bayar_balik'],
      'ansuran_bulanan' => $data['ansuran_bulanan'],
      'tarikh_ansuran_pertama' => $data['tarikh_ansuran_pertama'],
      'jenis_harta_pelupusan' => $data['jenis_harta_pelupusan'],
      'alamat_asset' => $data['alamat_asset'],
      'no_pendaftaran' => $data['no_pendaftaran'],
      'harga_jualan' => $data['harga_jualan'],
      'tarikh_lupus' => $data['tarikh_lupus'],


    ]);
  }

  protected function validator(array $data)
{
    return Validator::make($data, [
      'gaji_pasangan' =>['nullable', 'string'],
      'jumlah_imbuhan' => ['nullable', 'string'],
      'jumlah_imbuhan_pasangan' =>['nullable', 'string'],
      'sewa' =>['nullable', 'string'],
      'sewa_pasangan' =>['nullable', 'string'],
      'dividen_1[]' => ['nullable', 'string'],
      'dividen_1_pegawai[]' => ['nullable', 'string'],
      'dividen_1_pasangan[]' => ['nullable', 'string'],
      'pinjaman_perumahan_pegawai' => ['nullable', 'string'],
      'bulanan_perumahan_pegawai' =>['nullable', 'string'],
      'pinjaman_perumahan_pasangan' => ['nullable', 'string'],
      'bulanan_perumahan_pasangan' => ['nullable', 'string'],
      'pinjaman_kenderaan_pegawai' => ['nullable', 'string'],
      'bulanan_kenderaan_pegawai' => ['nullable', 'string'],
      'pinjaman_kenderaan_pasangan' => ['nullable', 'string'],
      'bulanan_kenderaan_pasangan' =>['nullable', 'string'],
      'jumlah_cukai_pegawai' =>['nullable', 'string'],
      'bulanan_cukai_pegawai' => ['nullable', 'string'],
      'jumlah_cukai_pasangan' => ['nullable', 'string'],
      'bulanan_cukai_pasangan' =>['nullable', 'string'],
      'jumlah_koperasi_pegawai' => ['nullable', 'string'],
      'bulanan_koperasi_pegawai' => ['nullable', 'string'],
      'jumlah_koperasi_pasangan' => ['nullable', 'string'],
      'bulanan_koperasi_pasangan' => ['nullable', 'string'],
      'lain_lain_pinjaman[]'=> ['nullable', 'string'],
      'pinjaman_pegawai[]'=> ['nullable', 'string'],
      'bulanan_pegawai[]'=> ['nullable', 'string'],
      'pinjaman_pasangan[]'=> ['nullable', 'string'],
      'bulanan_pasangan[]'=> ['nullable', 'string'],
      'jumlah_pinjaman_pegawai' => ['nullable', 'string'],
      'jumlah_bulanan_pegawai' =>['nullable', 'string'],
      'jumlah_pinjaman_pasangan' => ['nullable', 'string'],
      'jumlah_bulanan_pasangan' => ['nullable', 'string'],
      'jenis_harta' => ['required', 'string'],
      'pemilik_harta' => ['required', 'string'],
      'hubungan_pemilik' => ['required', 'string'],
      'maklumat_harta' =>['required', 'string'],
      'tarikh_pemilikan_harta' =>['required', 'string'],
      'bilangan' =>['required', 'string'],
      'nilai_perolehan' => ['required', 'string'],
      'cara_perolehan' => ['required', 'string'],
      'nama_pemilikan_asal' => ['required', 'string'],
      'jumlah_pinjaman' => ['nullable', 'string'],
      'institusi_pinjaman' => ['nullable', 'string'],
      'tempoh_bayar_balik' =>['nullable', 'string'],
      'ansuran_bulanan' =>['nullable', 'string'],
      'tarikh_ansuran_pertama' => ['nullable', 'date'],
      'jenis_harta_pelupusan' => ['nullable', 'string'],
      'alamat_asset' => ['nullable', 'string'],
      'no_pendaftaran' => ['nullable', 'string'],
      'harga_jualan' => ['nullable', 'string'],
      'tarikh_lupus' => ['nullable', 'date'],
    ]);
}

  public function submitForm(Request $request){

  $this->validator($request->all())->validate();
 // dd($request->all());
  event($formbs = $this->add($request->all()));
   //dd($request->all());
   // dd($request->dividen_1);

   $count = count($request->dividen_1);
   // dd($request->dividen_1);

    for ($i=0; $i < $count; $i++) {
	  $dividen_bs = new DividenB();
	  $dividen_bs->dividen_1 = $request->dividen_1[$i];
	  $dividen_bs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
    $dividen_bs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
    //dd($request->all());
    $dividen_bs->save();

    }

    $count = count($request->lain_lain_pinjaman);
    // dd($request->dividen_1);

     for ($i=0; $i < $count; $i++) {
 	  $pinjaman_bs = new PinjamanB();
 	  $pinjaman_bs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
 	  $pinjaman_bs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
    $pinjaman_bs->bulanan_pegawai = $request->bulanan_pegawai[$i];
    $pinjaman_bs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
    $pinjaman_bs->bulanan_pasangan = $request->bulanan_pasangan[$i];
     //dd($request->all());
     $pinjaman_bs->save();

     }

  return redirect()->route('user.harta.senaraiharta');

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



}
