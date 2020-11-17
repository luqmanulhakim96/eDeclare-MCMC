<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormG;
use App\DividenG;
use App\PinjamanG;
use App\Pinjaman;
use DB;
use Auth;
use App\User;
use App\Email;

// use App\Notifications\Form\UserFormAdminG;
use App\Jobs\SendNotificationFormG;

class FormGController extends Controller
{
  public function formG()
  {
    return view('user.harta.FormG.formG');
  }
public function editformG($id){
    //$info = SenaraiHarga::find(1);
    $info = FormG::findOrFail($id);

    $listDividenG = DividenG::where('formgs_id', $info->id) ->get();

    $listPinjamanG = PinjamanG::where('formgs_id', $info->id) ->get();

    $listPinjaman = Pinjaman::where('formgs_id', $info->id) ->get();

    $count_div = DividenG::where('formgs_id', $info->id)->count();

    $count_pinjaman = PinjamanG::where('formgs_id', $info->id)->count();

    $count_pinjam = Pinjaman::where('formgs_id', $info->id)->count();
    //dd($info);
    return view('user.harta.FormG.editformG', compact('info','listDividenG','listPinjamanG','listPinjaman','count_pinjaman','count_div','count_pinjam'));
  }
  public function adddraft(array $data){
    $userid = Auth::user()->id;
    $sedang_proses= "Disimpan ke Draf";

      return FormG::create([
        'jabatan' => $data['jabatan'],
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
        'pendapatan_pegawai' => $data['pendapatan_pegawai'],
        'pendapatan_pasangan' => $data['pendapatan_pasangan'],
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
        'user_id' => $userid,
        'status' => $sedang_proses,



      ]);
    }

public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";

    return FormG::create([
      'jabatan' => $data['jabatan'],
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
      'pendapatan_pegawai' => $data['pendapatan_pegawai'],
      'pendapatan_pasangan' => $data['pendapatan_pasangan'],
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
      'user_id' => $userid,
      'status' => $sedang_proses,



    ]);
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'jabatan' =>['nullable', 'string'],
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
      'pendapatan_pegawai' => ['nullable', 'string'],
      'pendapatan_pasangan' => ['nullable', 'string'],
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

  if ($request->has('save')){

      $this->validator($request->all())->validate();
     // dd($request->all());
      event($formgs = $this->adddraft($request->all()));
       //dd($request->all());
       // dd($request->dividen_1);

       $count = count($request->dividen_1);
       // dd($request->dividen_1);
       $count_id = 0;

       for ($i=0; $i < $count; $i++) {
            $count_id++;
        	  $dividen_gs = new DividenG();
        	  $dividen_gs->dividen_1 = $request->dividen_1[$i];
        	  $dividen_gs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
            $dividen_gs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
            $dividen_gs->formgs_id = $formgs-> id;
            $dividen_gs->dividen_id = $count_id;
            //dd($request->all());
            $dividen_gs->save();
          }

        $count = count($request->lain_lain_pinjaman);
        // dd($request->dividen_1);
        $count_id_pinjaman = 0;

         for ($i=0; $i < $count; $i++) {
            $count_id_pinjaman++;
         	  $pinjaman_gs = new PinjamanG();
         	  $pinjaman_gs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
         	  $pinjaman_gs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
            $pinjaman_gs->bulanan_pegawai = $request->bulanan_pegawai[$i];
            $pinjaman_gs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
            $pinjaman_gs->bulanan_pasangan = $request->bulanan_pasangan[$i];
            $pinjaman_gs->formgs_id = $formgs-> id;
            $pinjaman_gs->pinjaman_id = $count_id_pinjaman;
             //dd($request->all());
             $pinjaman_gs->save();
           }

         $count = count($request->institusi);
         // dd($request->dividen_1);
         $count_id_pinjam = 0;

          for ($i=0; $i < $count; $i++) {
          $count_id_pinjam++;
        	 $pinjaman = new Pinjaman();
        	 $pinjaman->institusi = $request->institusi[$i];
        	 $pinjaman->alamat_institusi = $request->alamat_institusi[$i];
           $pinjaman->ansuran_bulanan = $request->ansuran_bulanan[$i];
           $pinjaman->tarikh_ansuran = $request->tarikh_ansuran[$i];
           $pinjaman->tempoh_pinjaman = $request->tempoh_pinjaman[$i];
           $pinjaman->formgs_id = $formgs-> id;
           $pinjaman->pinjaman_id = $count_id_pinjam;
           $pinjaman->save();

          }

      return redirect()->route('user.harta.senaraidraft');
    }
  else if ($request->has('publish'))
  {
    $this->validator($request->all())->validate();
   // dd($request->all());
    event($formgs = $this->add($request->all()));
     //dd($request->all());
     // dd($request->dividen_1);

     $count = count($request->dividen_1);
     // dd($request->dividen_1);
     $count_id = 0;

     for ($i=0; $i < $count; $i++) {
          $count_id++;
          $dividen_gs = new DividenG();
          $dividen_gs->dividen_1 = $request->dividen_1[$i];
          $dividen_gs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
          $dividen_gs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
          $dividen_gs->formgs_id = $formgs-> id;
          $dividen_gs->dividen_id = $count_id;
          //dd($request->all());
          $dividen_gs->save();
        }

      $count = count($request->lain_lain_pinjaman);
      // dd($request->dividen_1);
      $count_id_pinjaman = 0;

       for ($i=0; $i < $count; $i++) {
          $count_id_pinjaman++;
          $pinjaman_gs = new PinjamanG();
          $pinjaman_gs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
          $pinjaman_gs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
          $pinjaman_gs->bulanan_pegawai = $request->bulanan_pegawai[$i];
          $pinjaman_gs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
          $pinjaman_gs->bulanan_pasangan = $request->bulanan_pasangan[$i];
          $pinjaman_gs->formgs_id = $formgs-> id;
          $pinjaman_gs->pinjaman_id = $count_id_pinjaman;
           //dd($request->all());
           $pinjaman_gs->save();
         }

       $count = count($request->institusi);
       // dd($request->dividen_1);
       $count_id_pinjam = 0;

        for ($i=0; $i < $count; $i++) {
        $count_id_pinjam++;
         $pinjaman = new Pinjaman();
         $pinjaman->institusi = $request->institusi[$i];
         $pinjaman->alamat_institusi = $request->alamat_institusi[$i];
         $pinjaman->ansuran_bulanan = $request->ansuran_bulanan[$i];
         $pinjaman->tarikh_ansuran = $request->tarikh_ansuran[$i];
         $pinjaman->tempoh_pinjaman = $request->tempoh_pinjaman[$i];
         $pinjaman->formgs_id = $formgs-> id;
         $pinjaman->pinjaman_id = $count_id_pinjam;
         $pinjaman->save();

        }

        //send notification to admin (noti yang dia dah berjaya declare)
        $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
        // $email = null; // for testing
        $admin_available = User::where('role','=','1')->get(); //get system admin information
        // if ($email) {
          foreach ($admin_available as $data) {
            // $formgs->notify(new UserFormAdminG($data, $email));
            $this->dispatch(new SendNotificationFormG($data, $email, $formgs));
          }
      return redirect()->route('user.harta.FormG.senaraihartaG');
  }
}

public function update($id){
  $sedang_proses= "Sedang Diproses";
  $formgs = FormG::find($id);
  $formgs->nama_perkhidmatan  = request()->nama_perkhidmatan;
  $formgs->gelaran  = request()->gelaran;
  $formgs->gaji_pasangan  = request()->gaji_pasangan;
  $formgs->jumlah_imbuhan  = request()->jumlah_imbuhan;
  $formgs->jumlah_imbuhan_pasangan = request()->jumlah_imbuhan_pasangan;
  $formgs->sewa = request()->sewa;
  $formgs->sewa_pasangan = request()->sewa_pasangan;
  $formgs->pendapatan_pasangan = request()->pendapatan_pasangan;
  $formgs->pendapatan_pegawai = request()->pendapatan_pegawai;
  $formgs->pinjaman_perumahan_pegawai  = request()->pinjaman_perumahan_pegawai;
  $formgs->bulanan_perumahan_pegawai = request()->bulanan_perumahan_pegawai;
  $formgs->pinjaman_perumahan_pasangan = request()->pinjaman_perumahan_pasangan;
  $formgs->bulanan_perumahan_pasangan = request()->bulanan_perumahan_pasangan;
  $formgs->pinjaman_kenderaan_pegawai = request()->pinjaman_kenderaan_pegawai;
  $formgs->bulanan_kenderaan_pegawai= request()->bulanan_kenderaan_pegawai;
  $formgs->pinjaman_kenderaan_pasangan = request()->pinjaman_kenderaan_pasangan;
  $formgs->bulanan_kenderaan_pasangan  = request()->bulanan_kenderaan_pasangan;
  $formgs->jumlah_cukai_pegawai  = request()->jumlah_cukai_pegawai;
  $formgs->bulanan_cukai_pegawai = request()->bulanan_cukai_pegawai;
  $formgs->jumlah_cukai_pasangan = request()->jumlah_cukai_pasangan;
  $formgs->bulanan_cukai_pasangan = request()->bulanan_cukai_pasangan;
  $formgs->jumlah_koperasi_pegawai = request()->jumlah_koperasi_pegawai;
  $formgs->bulanan_koperasi_pegawai = request()->bulanan_koperasi_pegawai;
  $formgs->jumlah_koperasi_pasangan = request()->jumlah_koperasi_pasangan;
  $formgs->bulanan_koperasi_pasangan  = request()->bulanan_koperasi_pasangan;
  $formgs->jumlah_pinjaman_pegawai = request()->jumlah_pinjaman_pegawai;
  $formgs->jumlah_bulanan_pegawai = request()->jumlah_bulanan_pegawai;
  $formgs->jumlah_pinjaman_pasangan  = request()->jumlah_pinjaman_pasangan;
  $formgs->jumlah_bulanan_pasangan = request()->jumlah_bulanan_pasangan;
  $formgs->luas_pertanian = request()->luas_pertanian;
  $formgs->lot_pertanian = request()->lot_pertanian;
  $formgs->mukim_pertanian = request()->mukim_pertanian;
  $formgs->luas_perumahan= request()->luas_perumahan;
  $formgs->lot_perumahan = request()->lot_perumahan;
  $formgs->mukim_perumahan  = request()->mukim_perumahan;
  $formgs->negeri_perumahan  = request()->negeri_perumahan;
  $formgs->tarikh_diperolehi = request()->tarikh_diperolehi;
  $formgs->luas = request()->luas;
  $formgs->lot = request()->lot;
  $formgs->mukim = request()->mukim;
  $formgs->negeri = request()->negeri;
  $formgs->jenis_tanah = request()->jenis_tanah;
  $formgs->nama_syarikat  = request()->nama_syarikat;
  $formgs->modal_berbayar = request()->modal_berbayar;
  $formgs->jumlah_unit_saham = request()->jumlah_unit_saham;
  $formgs->nilai_saham = request()->nilai_saham;
  $formgs->sumber_kewangan = request()->sumber_kewangan;
  $formgs->pengakuan= request()->pengakuan;
  $formgs->status= $sedang_proses;
  $formgs->save();
}

public function updateFormG(Request $request,$id){
  $this->validator(request()->all())->validate();

  $formgs = FormG::find($id);

  $count_div = DividenG::where('formgs_id', $formgs->id)->get();
  $count = count($count_div);

  for ($i=0; $i < $count; $i++) {
  $id_dividen = DividenG::where('formgs_id', $formgs->id)->get();
   // dd($id_dividen);
   for ($i=0; $i < count($id_dividen) ; $i++) {
     // dd($id_dividen[$i]->id);
     $dividen_g = DividenG::findOrFail($id_dividen[$i]->id);
     // dd($dividen_b);
     $dividen_g->delete();
   }
}

  $count_pinjaman = PinjamanG::where('formgs_id', $formgs->id)->get();
  $count_loan = count($count_pinjaman);

  for ($i=0; $i < $count_loan; $i++) {
  $id_pinjaman = PinjamanG::where('formgs_id', $formgs->id)->get();
  // dd(count($id_dividen));
  for ($i=0; $i < count($id_pinjaman) ; $i++) {
    // dd($id_dividen[$i]->id);
    $pinjaman_g = PinjamanG::findOrFail($id_pinjaman[$i]->id);
     // dd($pinjaman_b);
    $pinjaman_g->delete();
  }
}

  $count_pinjam = Pinjaman::where('formgs_id', $formgs->id)->get();
  $count_loan1 = count($count_pinjam);

  for ($i=0; $i < $count_loan1; $i++) {
  $id_pinjam = Pinjaman::where('formgs_id', $formgs->id)->get();
  // dd(count($id_dividen));
  for ($i=0; $i < count($id_pinjam) ; $i++) {
    // dd($id_dividen[$i]->id);
    $pinjaman = Pinjaman::findOrFail($id_pinjam[$i]->id);
     // dd($pinjaman_b);
    $pinjaman->delete();
  }
}

$count1 = count($request->dividen_1);
// dd($request->dividen_1);
// dd($count1);
$count = 0;
for ($i=0; $i < $count1; $i++) {
$count++;
$dividen_gs = new DividenG();
$dividen_gs->dividen_1 = $request->dividen_1[$i];
$dividen_gs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
$dividen_gs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
$dividen_gs->formgs_id = $formgs-> id;
$dividen_gs->dividen_id = $count;
$dividen_gs->save();

}

$count2 = count($request->lain_lain_pinjaman);
$count = 0;
for ($i=0; $i < $count2; $i++) {
$count++;
$pinjaman_gs = new PinjamanG();
$pinjaman_gs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
$pinjaman_gs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
$pinjaman_gs->bulanan_pegawai = $request->bulanan_pegawai[$i];
$pinjaman_gs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
$pinjaman_gs->bulanan_pasangan = $request->bulanan_pasangan[$i];
$pinjaman_gs->formgs_id = $formgs-> id;
$pinjaman_gs->pinjaman_id = $count;
$pinjaman_gs->save();
// dd($this->all());
}

$count3 = count($request->institusi);
$count = 0;
for ($i=0; $i < $count3; $i++) {
$count++;
$pinjaman = new Pinjaman();
$pinjaman->institusi = $request->institusi[$i];
$pinjaman->alamat_institusi = $request->alamat_institusi[$i];
$pinjaman->ansuran_bulanan = $request->ansuran_bulanan[$i];
$pinjaman->tarikh_ansuran = $request->tarikh_ansuran[$i];
$pinjaman->tempoh_pinjaman = $request->tempoh_pinjaman[$i];
$pinjaman->formgs_id = $formgs-> id;
$pinjaman->pinjaman_id = $count;
$pinjaman->save();
// dd($this->all());
}

  if($request ->status =='Disimpan ke Draf'){
    //send notification to admin (noti yang dia dah berjaya declare)
    $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
    // $email = null; // for testing
    $admin_available = User::where('role','=','1')->get(); //get system admin information
    // if ($email) {
      foreach ($admin_available as $data) {
        // $formgs->notify(new UserFormAdminG($data, $email));
        $this->dispatch(new SendNotificationFormG($data, $email, $formgs));
      }
  }

  $this->update($id);
  return redirect()->route('user.harta.FormG.senaraihartaG');
}



}
