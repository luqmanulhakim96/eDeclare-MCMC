<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormG;
use App\DividenG;
use App\PinjamanG;
use App\Pinjaman;
use DB;

class FormGController extends Controller
{
  public function formG()
  {
    return view('user.harta.formG');
  }
public function editformG($id){
    //$info = SenaraiHarga::find(1);
    $info = FormG::findOrFail($id);
    //dd($info);
    return view('user.harta.formG', compact('info'));
  }

public function add(array $data){
    return FormG::create([
      'tarikh_lantikan' => $data['tarikh_lantikan'],
      'nama_perkhidmatan' => $data['nama_perkhidmatan'],
      'gelaran' => $data['gelaran'],
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
      'luas_pertanian' => $data['luas_pertanian'],
      'lot_pertanian' => $data['lot_pertanian'],
      'mukim_pertanian' => $data['mukim_pertanian'],
      'negeri_pertanian' => $data['negeri_pertanian'],
      'luas_perumahan' => $data['luas_perumahan'],
      'lot_perumahan' => $data['lot_perumahan'],
      'mukim_perumahan' => $data['mukim_perumahan'],
      'negeri_perumahan' => $data['negeri_perumahan'],
      'tarikh_diperolehi' => $data['tarikh_diperolehi'],
      'luas' => $data['luas'],
      'lot' => $data['lot'],
      'mukim' => $data['mukim'],
      'negeri' => $data['negeri'],
      'jenis_tanah' => $data['jenis_tanah'],
      'nama_syarikat' => $data['nama_syarikat'],
      'modal_berbayar' => $data['modal_berbayar'],
      'jumlah_unit_saham' => $data['jumlah_unit_saham'],
      'nilai_saham' => $data['nilai_saham'],
      'sumber_kewangan' => $data['sumber_kewangan'],
      'institusi' => $data['institusi'],
      'alamat_institusi' => $data['alamat_institusi'],
      'ansuran_bulanan' => $data['ansuran_bulanan'],
      'tarikh_ansuran' => $data['tarikh_ansuran'],
      'tempoh_pinjaman' => $data['tempoh_pinjaman'],
      'pengakuan' => $data['pengakuan'],



    ]);
  }

  protected function validator(array $data)
{
    return Validator::make($data, [
      'tarikh_lantikan'  =>['nullable', 'date'],
      'nama_perkhidmatan' =>['nullable', 'string'],
      'gelaran'  =>['nullable', 'string'],
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
      'luas_pertanian' => ['nullable', 'string'],
      'lot_pertanian' => ['nullable', 'string'],
      'mukim_pertanian' => ['nullable', 'string'],
      'luas_perumahan' => ['nullable', 'string'],
      'lot_perumahan'=> ['nullable', 'string'],
      'mukim_perumahan' => ['nullable', 'string'],
      'negeri_perumahan' => ['nullable', 'string'],
      'tarikh_diperolehi' => ['nullable', 'string'],
      'luas' => ['nullable', 'string'],
      'lot'=> ['nullable', 'string'],
      'mukim' => ['nullable', 'string'],
      'negeri' => ['nullable', 'string'],
      'jenis_tanah' => ['nullable', 'string'],
      'nama_syarikat' => ['nullable', 'string'],
      'modal_berbayar' => ['nullable', 'string'],
      'jumlah_unit_saham'=> ['nullable', 'string'],
      'nilai_saham' => ['nullable', 'string'],
      'sumber_kewangan' => ['nullable', 'string'],
      'institusi[]'=> ['nullable', 'string'],
      'alamat_institusi[]' => ['nullable', 'string'],
      'ansuran_bulanan[]' => ['nullable', 'numeric'],
      'tarikh_ansuran[]' => ['nullable', 'date'],
      'tempoh_pinjaman[]' => ['nullable', 'string'],
      'pengakuan' => ['nullable', 'string'],
    ]);
}

  public function submitForm(Request $request){

  $this->validator($request->all())->validate();
 // dd($request->all());
  event($formgs = $this->add($request->all()));
   //dd($request->all());
   // dd($request->dividen_1);

   $count = count($request->dividen_1);
   // dd($request->dividen_1);

    for ($i=0; $i < $count; $i++) {
	  $dividen_gs = new DividenG();
	  $dividen_gs->dividen_1 = $request->dividen_1[$i];
	  $dividen_gs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
    $dividen_gs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
    //dd($request->all());
    $dividen_gs->save();

    }

    $count = count($request->lain_lain_pinjaman);
    // dd($request->dividen_1);

     for ($i=0; $i < $count; $i++) {
   	  $pinjaman_gs = new PinjamanG();
   	  $pinjaman_gs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
   	  $pinjaman_gs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
      $pinjaman_gs->bulanan_pegawai = $request->bulanan_pegawai[$i];
      $pinjaman_gs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
      $pinjaman_gs->bulanan_pasangan = $request->bulanan_pasangan[$i];
       //dd($request->all());
       $pinjaman_gs->save();

     }

     $count = count($request->institusi);
     // dd($request->dividen_1);

      for ($i=0; $i < $count; $i++) {
  	 $pinjaman = new Pinjaman();
  	 $pinjaman->institusi = $request->institusi[$i];
  	 $pinjaman->alamat_institusi = $request->alamat_institusi[$i];
     $pinjaman->ansuran_bulanan = $request->ansuran_bulanan[$i];
     $pinjaman->tarikh_ansuran = $request->tarikh_ansuran[$i];
     $pinjaman->tempoh_pinjaman = $request->tempoh_pinjaman[$i];
      //dd($request->all());
      $pinjaman->save();

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
