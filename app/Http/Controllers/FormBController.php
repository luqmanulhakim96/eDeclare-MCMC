<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormB;
use App\DividenB;
use App\PinjamanB;
use App\User;
use DB;
use Auth;

use App\Notifications\Form\UserFormAdminB;

class FormBController extends Controller
{
  public function formB()
  {
    return view('user.harta.FormB.formB');
  }
public function editformB($id){
    //$info = SenaraiHarga::find(1);
    $info = FormB::findOrFail($id);

    $listDividenB = DividenB::where('formbs_id', $info->id) ->get();
      // dd($listDividenB[0]->dividen_1);
    $listPinjamanB = PinjamanB::where('formbs_id', $info->id) ->get();

    $count_div = DividenB::where('formbs_id', $info->id)->count();
    $count_pinjaman = PinjamanB::where('formbs_id', $info->id)->count();



    return view('user.harta.FormB.editformB', compact('info','listDividenB','listPinjamanB','count_div','count_pinjaman'));
  }

public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";
  // dd($sedang_proses);

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
      'user_id' => $userid,
      'status' => $sedang_proses,



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

    $count = count($request->dividen_1);

    $count_id = 0;

    for ($i=0; $i < $count; $i++) {
      $count_id++;
  	  $dividen_bs = new DividenB();
  	  $dividen_bs->dividen_1 = $request->dividen_1[$i];
  	  $dividen_bs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
      $dividen_bs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
      $dividen_bs->formbs_id = $formbs-> id;
      $dividen_bs->dividen_id = $count_id;
      $dividen_bs->save();
    }

    $count1 = count($request->lain_lain_pinjaman);
    $count_id_pinjaman = 0;

    for ($i=0; $i < $count1; $i++) {
        $count_id_pinjaman++;
     	  $pinjaman_bs = new PinjamanB();
     	  $pinjaman_bs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
     	  $pinjaman_bs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
        $pinjaman_bs->bulanan_pegawai = $request->bulanan_pegawai[$i];
        $pinjaman_bs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
        $pinjaman_bs->bulanan_pasangan = $request->bulanan_pasangan[$i];
        $pinjaman_bs->formbs_id = $formbs-> id;
        $pinjaman_bs->pinjaman_id = $count_id_pinjaman;
         //dd($request->all());
        $pinjaman_bs->save();
     }

     //send notification to admin (noti yang dia dah berjaya declare)
     // $email = SenaraiEmail::where('kepada', '=', 'admin')->where('jenis', '=', 'permohonan_baru')->first(); //template email yang diguna
     $email = null; // for testing
     $admin_available = User::where('role','=','1')->get(); //get system admin information
     if ($email) {
       foreach ($admin_available as $data) {
         $formbs->notify(new UserFormAdminB($data, $email));
       }
     }
     return redirect()->route('user.harta.FormB.senaraihartaB');
   }

    public function update($id){
      $formbs = FormB::find($id);
      $formbs->gaji_pasangan  = request()->gaji_pasangan;
      $formbs->jumlah_imbuhan  = request()->jumlah_imbuhan;
      $formbs->jumlah_imbuhan_pasangan = request()->jumlah_imbuhan_pasangan;
      $formbs->sewa = request()->sewa;
      $formbs->sewa_pasangan = request()->sewa_pasangan;
      $formbs->pinjaman_perumahan_pegawai  = request()->pinjaman_perumahan_pegawai;
      $formbs->bulanan_perumahan_pegawai = request()->bulanan_perumahan_pegawai;
      $formbs->pinjaman_perumahan_pasangan = request()->pinjaman_perumahan_pasangan;
      $formbs->bulanan_perumahan_pasangan = request()->bulanan_perumahan_pasangan;
      $formbs->pinjaman_kenderaan_pegawai = request()->pinjaman_kenderaan_pegawai;
      $formbs->bulanan_kenderaan_pegawai= request()->bulanan_kenderaan_pegawai;
      $formbs->pinjaman_kenderaan_pasangan = request()->pinjaman_kenderaan_pasangan;
      $formbs->bulanan_kenderaan_pasangan  = request()->bulanan_kenderaan_pasangan;
      $formbs->jumlah_cukai_pegawai  = request()->jumlah_cukai_pegawai;
      $formbs->bulanan_cukai_pegawai = request()->bulanan_cukai_pegawai;
      $formbs->jumlah_cukai_pasangan = request()->jumlah_cukai_pasangan;
      $formbs->bulanan_cukai_pasangan = request()->bulanan_cukai_pasangan;
      $formbs->jumlah_koperasi_pegawai = request()->jumlah_koperasi_pegawai;
      $formbs->bulanan_koperasi_pegawai = request()->bulanan_koperasi_pegawai;
      $formbs->jumlah_koperasi_pasangan = request()->jumlah_koperasi_pasangan;
      $formbs->bulanan_koperasi_pasangan  = request()->bulanan_koperasi_pasangan;
      $formbs->jumlah_pinjaman_pegawai = request()->jumlah_pinjaman_pegawai;
      $formbs->jumlah_bulanan_pegawai = request()->jumlah_bulanan_pegawai;
      $formbs->jumlah_pinjaman_pasangan  = request()->jumlah_pinjaman_pasangan;
      $formbs->jumlah_bulanan_pasangan = request()->jumlah_bulanan_pasangan;
      $formbs->jenis_harta = request()->jenis_harta;
      $formbs->pemilik_harta = request()->pemilik_harta;
      $formbs->hubungan_pemilik = request()->hubungan_pemilik;
      $formbs->maklumat_harta= request()->maklumat_harta;
      $formbs->tarikh_pemilikan_harta = request()->tarikh_pemilikan_harta;
      $formbs->bilangan  = request()->bilangan;
      $formbs->nilai_perolehan  = request()->nilai_perolehan;
      $formbs->cara_perolehan = request()->cara_perolehan;
      $formbs->nama_pemilikan_asal = request()->nama_pemilikan_asal;
      $formbs->jumlah_pinjaman = request()->jumlah_pinjaman;
      $formbs->institusi_pinjaman = request()->institusi_pinjaman;
      $formbs->tempoh_bayar_balik = request()->tempoh_bayar_balik;
      $formbs->ansuran_bulanan = request()->ansuran_bulanan;
      $formbs->tarikh_ansuran_pertama  = request()->tarikh_ansuran_pertama;
      $formbs->jenis_harta_pelupusan = request()->jenis_harta_pelupusan;
      $formbs->alamat_asset = request()->alamat_asset;
      $formbs->no_pendaftaran = request()->no_pendaftaran;
      $formbs->harga_jualan = request()->harga_jualan;
      $formbs->tarikh_lupus= request()->tarikh_lupus;
      $formbs->save();
     }

     public function updateFormB(Request $request,$id){
       // dd(request()->all());
        $this->validator(request()->all())->validate();

        $formbs = FormB::find($id);

        $count_div = DividenB::where('formbs_id', $formbs->id)->get();
        $count = count($count_div);

        for ($i=0; $i < $count; $i++) {
        $id_dividen = DividenB::where('formbs_id', $formbs->id)->get();
        // dd(count($id_dividen));
        for ($i=0; $i < count($id_dividen) ; $i++) {
          // dd($id_dividen[$i]->id);
          $dividen_b = DividenB::findOrFail($id_dividen[$i]->id);
          // dd($dividen_b);
          $dividen_b->delete();
        }
      }

        // $formbs = FormB::find($id);
        $count_pinjaman = PinjamanB::where('formbs_id', $formbs->id)->get();
        $count_loan = count($count_pinjaman);

        for ($i=0; $i < $count_loan; $i++) {
        $id_pinjaman = PinjamanB::where('formbs_id', $formbs->id)->get();
        // dd(count($id_dividen));
        for ($i=0; $i < count($id_pinjaman) ; $i++) {
          // dd($id_dividen[$i]->id);
          $pinjaman_b = PinjamanB::findOrFail($id_pinjaman[$i]->id);
           // dd($pinjaman_b);
          $pinjaman_b->delete();
        }
      }


        $count1 = count($request->dividen_1);
        // dd($request->dividen_1);
        // dd($count1);
        $count = 0;
        for ($i=0; $i < $count1; $i++) {
        $count++;
        $dividen_bs = new DividenB();
        $dividen_bs->dividen_1 = $request->dividen_1[$i];
        $dividen_bs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
        $dividen_bs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
        $dividen_bs->formbs_id = $formbs-> id;
        $dividen_bs->dividen_id = $count;
        //dd($request->all());
        $dividen_bs->save();

      }

      $count2 = count($request->lain_lain_pinjaman);
      $count = 0;
      for ($i=0; $i < $count2; $i++) {
      $count++;
      $pinjaman_bs = new PinjamanB();
      $pinjaman_bs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
      $pinjaman_bs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
      $pinjaman_bs->bulanan_pegawai = $request->bulanan_pegawai[$i];
      $pinjaman_bs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
      $pinjaman_bs->bulanan_pasangan = $request->bulanan_pasangan[$i];
      $pinjaman_bs->formbs_id = $formbs-> id;
      $pinjaman_bs->pinjaman_id = $count;
      $pinjaman_bs->save();
        // dd($this->all());
      }



      $this->update($id);
      return redirect()->route('user.harta.FormB.senaraihartaB');
    }



}
