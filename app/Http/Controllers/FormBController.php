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
use App\JenisHarta;
use App\Email;
use App\HartaB;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;
use Carbon\Carbon;
use App\Duration;

use PDF;

use App\Jobs\SendEmailNotification;

// use App\Notifications\Form\UserFormAdminB;
use App\Jobs\SendNotificationFormB;

class FormBController extends Controller
{
  // public function split_name($name) {
  //   $parts = array();
  //
  // while ( strlen( trim($name)) > 0 ) {
  //     $name = trim($name);
  //     $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
  //     $parts[] = $string;
  //     $name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
  // }
  //
  // if (empty($parts)) {
  //     return false;
  // }
  //
  // $parts = array_reverse($parts);
  // $name = array();
  // $name['first_name'] = $parts[0];
  // $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
  // $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
  //
  // return $name;
  // }

  public function formB()
  {
    $jenisHarta = JenisHarta::get();
    //data gaji user (latest)
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    // dd($staffinfo);

    //data dari form latest
    $userid = Auth::user()->id;
    $data_user = FormB::where('user_id', $userid) ->get();
    // $status_sedang_diproses = FormB::where('user_id', $userid)->where('status',"Sedang Diproses") ->get();

    $draft_exist = FormB::where('user_id', auth()->user()->id)->where('status', 'Disimpan ke Draf')->first();
    $status_form = FormB::where('user_id', auth()->user()->id)->latest()->first();


    $user = UserExistingStaffInfo::where('USERNAME', $username) ->get('STAFFNO');
    // if(!$data_user->isEmpty()){ // user for to view no data blade if user has already has data
    if($data_user->isEmpty()){

      $last_data_formb = null;
      $dividen_user= null;
      $pinjaman_user= null;
      $maklumat_pasangan = UserExistingStaffInfo::where('USERNAME', $username) ->get();
      $maklumat_anak = UserExistingStaffInfo::where('USERNAME', $username) ->get();
      if($maklumat_pasangan->isEmpty()){
        $maklumat_pasangan = null;
      }
      else{
        foreach ($user as $keluarga) {
        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        }
      }

      if($maklumat_anak->isEmpty()){
        $maklumat_anak = null;
      }
      else{
        foreach ($user as $keluarga) {

          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }


        }

        return view('user.harta.FormB.formB-no-data', compact('jenisHarta','staffinfo','maklumat_pasangan','maklumat_anak','dividen_user','last_data_formb','pinjaman_user', 'draft_exist', 'status_form'));
      }


      else{

        $last_data_formb = collect($data_user)->last();
        $dividen_user = DividenB::where('formbs_id', $last_data_formb->id) ->get();
        // dd($dividen_user);
        $pinjaman_user = PinjamanB::where('formbs_id', $last_data_formb->id) ->get();
        // dd($pinjaman_user);


      foreach ($user as $keluarga) {

        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }

        $data_form = FormB::where('user_id', $userid) ->where('status', "Diterima")->get();
        $harta = null;
        foreach ($data_form as $data) {
        // dd($data->id);
        $harta[]= HartaB::where('formbs_id',$data->id)->where('formcs_id',null)->get();
        // dd($harta);
      }
 // dd($harta);
        return view('user.harta.FormB.formB-has-data', compact('jenisHarta','staffinfo','maklumat_pasangan','maklumat_anak','dividen_user','last_data_formb','pinjaman_user','harta','data_form', 'draft_exist', 'status_form'));

      }

  }

  public function kemaskini($id){
    $status = "Menunggu Kebenaran Kemaskini";
    $form=FormB::find($id);
    // dd($request->all());
    $form->status = $status;
    $form->save();

    return redirect()->route('user.harta.FormB.senaraihartaB');
  }

  public function editformB($id){
    // $info = SenaraiHarga::find(1);
    $info = FormB::findOrFail($id);
    // dd($info);
    $jenisHarta = JenisHarta::get();

    $listDividenB = DividenB::where('formbs_id', $info->id) ->get();
      // dd($listDividenB[0]->dividen_1);
    $listPinjamanB = PinjamanB::where('formbs_id', $info->id) ->get();

    $count_div = DividenB::where('formbs_id', $info->id)->count();
    $count_pinjaman = PinjamanB::where('formbs_id', $info->id)->count();

    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    $user = UserExistingStaffInfo::where('USERNAME', $username) ->get('STAFFNO');

    foreach ($user as $keluarga) {

      $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
      $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
      $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
      $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
      }

    $hartaB =HartaB::where('formbs_id',$info->id) ->get();
    // dd($hartaB);



    return view('user.harta.FormB.editformB-latest', compact('info','maklumat_pasangan','maklumat_anak','listDividenB','listPinjamanB','count_div','count_pinjaman','jenisHarta','hartaB','staffinfo'));
  }

  public function deleteHartaB($id){
    $harta = HartaB::findOrFail($id);
    $harta-> delete();
    // return redirect()->route('user.hadiah.senaraihadiah');
    // dd($harta);
  }

public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";
  // dd($sedang_proses);

    return FormB::create([
      'no_staff' => $data['no_staff'],
      'nama_pegawai' => $data['nama_pegawai'],
      'kad_pengenalan' => $data['kad_pengenalan'],
      'jawatan' => $data['jawatan'],
      'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
      'jabatan' => $data['jabatan'],
      'gaji' => $data['gaji'],
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
      'user_id' => $userid,
      'status' => $sedang_proses,



    ]);

  }

  public function adddraft(array $data){
    $userid = Auth::user()->id;
    $sedang_proses= "Disimpan ke Draf";
    // dd($data);

      return FormB::create([
        'no_staff' => $data['no_staff'],
        'nama_pegawai' => $data['nama_pegawai'],
        'kad_pengenalan' => $data['kad_pengenalan'],
        'jawatan' => $data['jawatan'],
        'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
        'jabatan' => $data['jabatan'],
        'gaji' => $data['gaji'],
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
        'user_id' => $userid,
        'status' => $sedang_proses,



      ]);

    }

    public function adddraftbackend(array $data){
      $userid = Auth::user()->id;
      $sedang_proses= "";
      // dd($data);

        return FormB::create([
          'no_staff' => $data['no_staff'],
          'nama_pegawai' => $data['nama_pegawai'],
          'kad_pengenalan' => $data['kad_pengenalan'],
          'jawatan' => $data['jawatan'],
          'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
          'jabatan' => $data['jabatan'],
          'gaji' => $data['gaji'],
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
          'user_id' => $userid,
          'status' => $sedang_proses,
        ]);

      }
  protected function validatorpublish(array $data)
  {
    // dd($data);
     return Validator::make($data, [
      'gaji_pasangan' =>['nullable', 'numeric'],
      'jumlah_imbuhan' => ['nullable', 'numeric'],
      'jumlah_imbuhan_pasangan' =>['nullable', 'numeric'],
      'sewa' =>['nullable', 'numeric'],
      'sewa_pasangan' =>['nullable', 'numeric'],
      'dividen_1[]' => ['nullable', 'numeric'],
      'dividen_1_pegawai[]' => ['nullable', 'string'],
      'dividen_1_pasangan[]' => ['nullable', 'numeric'],
      'pendapatan_pegawai' => ['nullable', 'numeric'],
      'pendapatan_pasangan' => ['nullable', 'numeric'],
      'pinjaman_perumahan_pegawai' => ['nullable'],
      'bulanan_perumahan_pegawai' =>['nullable'],
      'pinjaman_perumahan_pasangan' => ['nullable'],
      'bulanan_perumahan_pasangan' => ['nullable'],
      'pinjaman_kenderaan_pegawai' => ['nullable'],
      'bulanan_kenderaan_pegawai' => ['nullable'],
      'pinjaman_kenderaan_pasangan' => ['nullable'],
      'bulanan_kenderaan_pasangan' =>['nullable'],
      'jumlah_cukai_pegawai' =>['nullable', 'numeric'],
      'bulanan_cukai_pegawai' => ['nullable', 'numeric'],
      'jumlah_cukai_pasangan' => ['nullable', 'numeric'],
      'bulanan_cukai_pasangan' =>['nullable', 'numeric'],
      'jumlah_koperasi_pegawai' => ['nullable', 'numeric'],
      'bulanan_koperasi_pegawai' => ['nullable', 'numeric'],
      'jumlah_koperasi_pasangan' => ['nullable', 'numeric'],
      'bulanan_koperasi_pasangan' => ['nullable', 'numeric'],
      'lain_lain_pinjaman[]'=> ['nullable', 'string'],
      'pinjaman_pegawai[]'=> ['nullable', 'numeric'],
      'bulanan_pegawai[]'=> ['nullable', 'numeric'],
      'pinjaman_pasangan[]'=> ['nullable', 'numeric'],
      'bulanan_pasangan[]'=> ['nullable', 'numeric'],
      'jumlah_pinjaman_pegawai' => ['nullable', 'numeric'],
      'jumlah_bulanan_pegawai' =>['nullable', 'numeric'],
      'jumlah_pinjaman_pasangan' => ['nullable', 'numeric'],
      'jumlah_bulanan_pasangan' => ['nullable', 'numeric'],

      // 'jenis_harta_[]' => ['required', 'string'],
      'jenis_harta_' => ['required', 'array'],
      'jenis_harta_.*' => ['required', 'string'],
      'pemilik_harta_' => ['required', 'array'],
      'pemilik_harta_.*' => ['required', 'string'],
      'select_hubungan_' => ['required', 'array'],
      'select_hubungan_.*' => ['required', 'string'],
      'maklumat_harta_' => ['required', 'array'],
      'maklumat_harta_.*' => ['required', 'string'],
      'tarikh_pemilikan_harta_' => ['required', 'array'],
      'tarikh_pemilikan_harta_.*' => ['required', 'date'],
      'bilangan_' => ['required', 'array'],
      'bilangan_.*' => ['required', 'numeric'],
      'unit_bilangan_' => ['required', 'array'],
      'unit_bilangan_.*' => ['required', 'string'],
      'nilai_perolehan_' => ['required', 'array'],
      'nilai_perolehan_.*' => ['required', 'numeric'],
      'cara_perolehan_' => ['required', 'array'],
      'cara_perolehan_.*' => ['required', 'string'],
      'pengakuan'=> ['required'],
    ]);
  }

  protected function validatorharta(array $data){
    $count_perolehan = count($data['cara_perolehan_']);
    for($i=0;$i<$count_perolehan;$i++){
      if($data['cara_perolehan_'][$i] == "Dipusakai" || $data['cara_perolehan_'][$i] == "Dihadiahkan"){
         return Validator::make($data, [
        'nama_pemilikan_asal_' => ['array'],
        'nama_pemilikan_asal_.*' => ['required_with:cara_perolehan_,Dipusakai', 'string'],
      ]);
      }
      else if($data['cara_perolehan_'][$i] == "Lain-lain"){
        return Validator::make($data, [
        'lain_lain_' => ['array'],
        'lain_lain_.*' => ['required_if:cara_perolehan_,==,Lain-lain', 'string'],
        ]);
      }
      else if ($data['cara_perolehan_'][$i] == "Dibeli") {
        if($data['cara_belian_'][$i] == "Pinjaman"){
          return Validator::make($data, [
            'cara_belian_' => ['array'],
            'cara_belian_.*' => ['required_if:cara_perolehan_,==,Dibeli', 'string'],
            'jumlah_pinjaman_' => ['array'],
            'jumlah_pinjaman_.*' => ['required_if:cara_belian_,==,Pinjaman', 'string'],
            'institusi_pinjaman_' => ['array'],
            'institusi_pinjaman_.*' => ['required_if:cara_belian_,==,Pinjaman', 'string'],
            'tempoh_bayar_balik_' => ['array'],
            'tempoh_bayar_balik_.*' => ['required_if:cara_belian_,==,Pinjaman', 'string'],
            'ansuran_bulanan_' => ['array'],
            'ansuran_bulanan_.*' => ['required_if:cara_belian_,==,Pinjaman', 'string'],
            'tarikh_ansuran_pertama_' => ['array'],
            'tarikh_ansuran_pertama_.*' => ['required_if:cara_belian_,==,Pinjaman', 'date'],
            'keterangan_lain_.*' => ['nullable', 'string'],
          ]);
        }
        else if($data['cara_belian_'][$i] == "Tunai"){
           return Validator::make($data, [
            'cara_belian_' => ['array'],
            'cara_belian_.*' => ['required_if:cara_perolehan_,==,Dibeli', 'string'],
            'tunai_' => ['array'],
            'tunai_.*' => ['required_if:cara_belian_,Tunai', 'string'],
        ]);
        }
        else{
        return Validator::make($data, [
            'cara_belian_' => ['array'],
            'cara_belian_.*' => ['required_if:cara_perolehan_,==,Dibeli', 'string'],
            'jenis_harta_pelupusan_' => ['array'],
            'jenis_harta_pelupusan_.*' => ['required_if:cara_belian_,==,Pelupusan', 'string'],
            'alamat_asset_' => ['array'],
            'alamat_asset_.*' => ['required_if:cara_belian_,==,Pelupusan', 'string'],
            'no_pendaftaran_' => ['array'],
            'no_pendaftaran_.*' => ['required_if:cara_belian_,==,Pelupusan', 'string'],
            'harga_jualan_' => ['array'],
            'harga_jualan_.*' => ['required_if:cara_belian_,==,Pelupusan', 'string'],
            'tarikh_lupus_' => ['array'],
            'tarikh_lupus_.*' => ['required_if:cara_belian_,==,Pelupusan', 'date'],
          ]);
        }
      }
    }
    // if ($validator->fails())
    // {
    //     foreach ($validator->messages()->getMessages() as $field_name => $messages)
    //     {
    //         $message[] = $messages; // messages are retrieved (publicly)
    //     }
    //     dd($message);
    // }
  }


  protected function validatorsave(array $data)
  {
    return Validator::make($data, [
      'jabatan' =>['nullable', 'string'],
      'gaji_pasangan' =>['nullable', 'numeric'],
      'jumlah_imbuhan' => ['nullable', 'numeric'],
      'jumlah_imbuhan_pasangan' =>['nullable', 'numeric'],
      'sewa' =>['nullable', 'numeric'],
      'sewa_pasangan' =>['nullable', 'numeric'],
      'dividen_1[]' => ['nullable', 'numeric'],
      'dividen_1_pegawai[]' => ['nullable', 'string'],
      'dividen_1_pasangan[]' => ['nullable', 'numeric'],
      'pendapatan_pegawai' => ['nullable', 'numeric'],
      'pendapatan_pasangan' => ['nullable', 'numeric'],
      'pinjaman_perumahan_pegawai' => ['nullable'],
      'bulanan_perumahan_pegawai' =>['nullable'],
      'pinjaman_perumahan_pasangan' => ['nullable'],
      'bulanan_perumahan_pasangan' => ['nullable'],
      'pinjaman_kenderaan_pegawai' => ['nullable'],
      'bulanan_kenderaan_pegawai' => ['nullable'],
      'pinjaman_kenderaan_pasangan' => ['nullable'],
      'bulanan_kenderaan_pasangan' =>['nullable'],
      'jumlah_cukai_pegawai' =>['nullable', 'numeric'],
      'bulanan_cukai_pegawai' => ['nullable', 'numeric'],
      'jumlah_cukai_pasangan' => ['nullable', 'numeric'],
      'bulanan_cukai_pasangan' =>['nullable', 'numeric'],
      'jumlah_koperasi_pegawai' => ['nullable', 'numeric'],
      'bulanan_koperasi_pegawai' => ['nullable', 'numeric'],
      'jumlah_koperasi_pasangan' => ['nullable', 'numeric'],
      'bulanan_koperasi_pasangan' => ['nullable', 'numeric'],
      'lain_lain_pinjaman[]'=> ['nullable', 'string'],
      'pinjaman_pegawai[]'=> ['nullable', 'numeric'],
      'bulanan_pegawai[]'=> ['nullable', 'numeric'],
      'pinjaman_pasangan[]'=> ['nullable', 'numeric'],
      'bulanan_pasangan[]'=> ['nullable', 'numeric'],
      'jumlah_pinjaman_pegawai' => ['nullable', 'numeric'],
      'jumlah_bulanan_pegawai' =>['nullable', 'numeric'],
      'jumlah_pinjaman_pasangan' => ['nullable', 'numeric'],
      'jumlah_bulanan_pasangan' => ['nullable', 'numeric'],
      // 'company_name' => 'required_if:is_company,1',
      'jenis_harta_' => ['nullable', 'array'],
      'jenis_harta_.*' => ['nullable', 'string'],
      'pemilik_harta_' => ['nullable', 'array'],
      'pemilik_harta_.*' => ['nullable', 'string'],
      'select_hubungan_' => ['nullable', 'array'],
      'select_hubungan_.*' => ['nullable', 'string'],
      'maklumat_harta_' => ['nullable', 'array'],
      'maklumat_harta_.*' => ['nullable', 'string'],
      'tarikh_pemilikan_harta_' => ['nullable', 'array'],
      'tarikh_pemilikan_harta_.*' => ['nullable', 'date'],
      'bilangan_' => ['nullable', 'array'],
      'bilangan_.*' => ['nullable', 'numeric'],
      'unit_bilangan_' => ['nullable', 'array'],
      'unit_bilangan_.*' => ['nullable', 'string'],
      'nilai_perolehan_' => ['nullable', 'array'],
      'nilai_perolehan_.*' => ['nullable', 'numeric'],
      'cara_perolehan_' => ['nullable', 'array'],
      'cara_perolehan_.*' => ['nullable', 'string'],
      'nama_pemilikan_asal_' => ['array'],
      'nama_pemilikan_asal_.*' => ['nullable', 'string'],
      'lain_lain_' => ['array'],
      'lain_lain_.*' => ['nullable', 'string'],
      'cara_belian_' => ['array'],
      'cara_belian_.*' => ['nullable', 'string'],
      'tunai_' => ['array'],
      'tunai_.*' => ['nullable', 'string'],
      'jumlah_pinjaman_' => ['array'],
      'jumlah_pinjaman_.*' => ['nullable', 'string'],
      'institusi_pinjaman_' => ['array'],
      'institusi_pinjaman_.*' => ['nullable', 'string'],
      'tempoh_bayar_balik_' => ['array'],
      'tempoh_bayar_balik_.*' => ['nullable', 'string'],
      'ansuran_bulanan_' => ['array'],
      'ansuran_bulanan_.*' => ['nullable', 'string'],
      'tarikh_ansuran_pertama_' => ['array'],
      'tarikh_ansuran_pertama_.*' => ['nullable', 'date'],
      'keterangan_lain_' => ['array'],
      'keterangan_lain_.*' => ['nullable', 'string'],
      'jenis_harta_pelupusan_' => ['array'],
      'jenis_harta_pelupusan_.*' => ['nullable', 'string'],
      'alamat_asset_' => ['array'],
      'alamat_asset_.*' => ['nullable', 'string'],
      'no_pendaftaran_' => ['array'],
      'no_pendaftaran_.*' => ['nullable', 'string'],
      'harga_jualan_' => ['array'],
      'harga_jualan_.*' => ['nullable', 'string'],
      'tarikh_lupus_' => ['array'],
      'tarikh_lupus_.*' => ['nullable', 'date'],

    ]);
  }

  public function submitForm(Request $request){
    // dd($request->all());

  if ($request->has('save')){
   // dd($request->all());
    $this->validatorsave($request->all())->validate();
    // dd($request->all());
    event($formbs = $this->adddraft($request->all()));

    $count = count($request->dividen_1);
    // dd($request->dividen_1); //get the index number of the first array
    // dd($count);
    $count_id = 0;

    // for ($i=1; $i < $count; $i++) {
    // for ($i=key($request->dividen_1); $i <= $count; $i++) {
    for ($i=0; $i < $count; $i++) {
      $count_id++;
      // dd($i);
  	  $dividen_bs = new DividenB();
  	  $dividen_bs->dividen_1 = $request->dividen_1[$i];
  	  $dividen_bs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
      $dividen_bs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
      $dividen_bs->formbs_id = $formbs-> id;
      $dividen_bs->dividen_id = $count_id;
      $dividen_bs->save();
    }

    $count1 = count($request->lain_lain_pinjaman);
    // dd($count1);
    $count_id_pinjaman = 0;
    // dd(key($request->lain_lain_pinjaman));//get the index number of the first array

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

     if($request->jenis_harta_){
       $count_harta = count($request->jenis_harta_);
     }
     else {
       $count_harta = 0;
     }

     for ($i=0; $i < $count_harta; $i++) {

   	   $hartaB = new HartaB();
   	   $hartaB->jenis_harta = $request->jenis_harta_[$i];
   	   $hartaB->pemilik_harta = $request->pemilik_harta_[$i];
       $hartaB->hubungan_pemilik = $request->select_hubungan_[$i];
       $hartaB->maklumat_harta = $request->maklumat_harta_[$i];
       $hartaB->tarikh_pemilikan_harta = $request->tarikh_pemilikan_harta_[$i];
       $hartaB->bilangan = $request->bilangan_[$i];
       $hartaB->unit_bilangan = $request->unit_bilangan_[$i];
   	   $hartaB->nilai_perolehan = $request->nilai_perolehan_[$i];
       $hartaB->cara_perolehan = $request->cara_perolehan_[$i];
       $hartaB->lain_lain = $request->lain_lain_[$i];
       $hartaB->cara_belian = $request->cara_belian_[$i];
       $hartaB->nama_pemilikan_asal = $request->nama_pemilikan_asal_[$i];
       $hartaB->tunai = $request->tunai_[$i];
   	   $hartaB->jumlah_pinjaman = $request->jumlah_pinjaman_[$i];
       $hartaB->institusi_pinjaman = $request->institusi_pinjaman_[$i];
       $hartaB->tempoh_bayar_balik = $request->tempoh_bayar_balik_[$i];
       $hartaB->ansuran_bulanan = $request->ansuran_bulanan_[$i];
       $hartaB->tarikh_ansuran_pertama = $request->tarikh_ansuran_pertama_[$i];
       $hartaB->keterangan_lain = $request->keterangan_lain_[$i];
       $hartaB->jenis_harta_pelupusan = $request->jenis_harta_pelupusan_[$i];
   	   $hartaB->alamat_asset = $request->alamat_asset_[$i];
       $hartaB->no_pendaftaran = $request->no_pendaftaran_[$i];
       $hartaB->harga_jualan = $request->harga_jualan_[$i];
       $hartaB->tarikh_lupus = $request->tarikh_lupus_[$i];
       $hartaB->formbs_id = $formbs-> id;
       $hartaB->save();
     }

     // dd(HartaB::where('formbs_id',$formbs-> id));

     return redirect()->route('user.harta.senaraidraft');
   }

  else if ($request->has('publish'))
  {
    //save draft backend
    // $this->validatorsave($request->all())->validate();
    // // dd($request->all());
    // event($formbs = $this->adddraftbackend($request->all()));
    //
    // $count = count($request->dividen_1);
    // // dd($request->dividen_1); //get the index number of the first array
    // // dd($count);
    // $count_id = 0;
    //
    // // for ($i=1; $i < $count; $i++) {
    // // for ($i=key($request->dividen_1); $i <= $count; $i++) {
    // for ($i=0; $i < $count; $i++) {
    //   $count_id++;
    //   // dd($i);
  	//   $dividen_bs = new DividenB();
  	//   $dividen_bs->dividen_1 = $request->dividen_1[$i];
  	//   $dividen_bs->dividen_1_pegawai = $request->dividen_1_pegawai[$i];
    //   $dividen_bs->dividen_1_pasangan = $request->dividen_1_pasangan[$i];
    //   $dividen_bs->formbs_id = $formbs-> id;
    //   $dividen_bs->dividen_id = $count_id;
    //   $dividen_bs->save();
    // }
    //
    // $count1 = count($request->lain_lain_pinjaman);
    // // dd($count1);
    // $count_id_pinjaman = 0;
    // // dd(key($request->lain_lain_pinjaman));//get the index number of the first array
    //
    // for ($i=0; $i < $count1; $i++) {
    //
    //     $count_id_pinjaman++;
    //  	  $pinjaman_bs = new PinjamanB();
    //  	  $pinjaman_bs->lain_lain_pinjaman = $request->lain_lain_pinjaman[$i];
    //  	  $pinjaman_bs->pinjaman_pegawai = $request->pinjaman_pegawai[$i];
    //     $pinjaman_bs->bulanan_pegawai = $request->bulanan_pegawai[$i];
    //     $pinjaman_bs->pinjaman_pasangan = $request->pinjaman_pasangan[$i];
    //     $pinjaman_bs->bulanan_pasangan = $request->bulanan_pasangan[$i];
    //     $pinjaman_bs->formbs_id = $formbs-> id;
    //     $pinjaman_bs->pinjaman_id = $count_id_pinjaman;
    //      //dd($request->all());
    //     $pinjaman_bs->save();
    //  }
    //
    //  if($request->jenis_harta_){
    //    $count_harta = count($request->jenis_harta_);
    //  }
    //  else {
    //    $count_harta = 0;
    //  }
    //
    //  for ($i=0; $i < $count_harta; $i++) {
    //
   	//    $hartaB = new HartaB();
   	//    $hartaB->jenis_harta = $request->jenis_harta_[$i];
   	//    $hartaB->pemilik_harta = $request->pemilik_harta_[$i];
    //    $hartaB->hubungan_pemilik = $request->select_hubungan_[$i];
    //    $hartaB->maklumat_harta = $request->maklumat_harta_[$i];
    //    $hartaB->tarikh_pemilikan_harta = $request->tarikh_pemilikan_harta_[$i];
    //    $hartaB->bilangan = $request->bilangan_[$i];
   	//    $hartaB->nilai_perolehan = $request->nilai_perolehan_[$i];
    //    $hartaB->cara_perolehan = $request->cara_perolehan_[$i];
    //    $hartaB->lain_lain = $request->lain_lain_[$i];
    //    $hartaB->cara_belian = $request->cara_belian_[$i];
    //    $hartaB->nama_pemilikan_asal = $request->nama_pemilikan_asal_[$i];
   	//    $hartaB->jumlah_pinjaman = $request->jumlah_pinjaman_[$i];
    //    $hartaB->institusi_pinjaman = $request->institusi_pinjaman_[$i];
    //    $hartaB->tempoh_bayar_balik = $request->tempoh_bayar_balik_[$i];
    //    $hartaB->ansuran_bulanan = $request->ansuran_bulanan_[$i];
    //    $hartaB->tarikh_ansuran_pertama = $request->tarikh_ansuran_pertama_[$i];
    //    $hartaB->jenis_harta_pelupusan = $request->jenis_harta_pelupusan_[$i];
   	//    $hartaB->alamat_asset = $request->alamat_asset_[$i];
    //    $hartaB->no_pendaftaran = $request->no_pendaftaran_[$i];
    //    $hartaB->harga_jualan = $request->harga_jualan_[$i];
    //    $hartaB->tarikh_lupus = $request->tarikh_lupus_[$i];
    //    $hartaB->formbs_id = $formbs-> id;
    //    $hartaB->save();
    //  }

  // submit form
    $this->validatorpublish($request->all())->validate();
    $this->validatorharta($request->all())->validate();
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
        $pinjaman_bs->save();
     }

     if($request->jenis_harta_){
       $count_harta = count($request->jenis_harta_);
     }
     else {
       $count_harta = 0;
     }

     for ($i=0; $i < $count_harta; $i++) {

   	   $hartaB = new HartaB();
   	   $hartaB->jenis_harta = $request->jenis_harta_[$i];
   	   $hartaB->pemilik_harta = $request->pemilik_harta_[$i];
       $hartaB->hubungan_pemilik = $request->select_hubungan_[$i];
       $hartaB->maklumat_harta = $request->maklumat_harta_[$i];
       $hartaB->tarikh_pemilikan_harta = $request->tarikh_pemilikan_harta_[$i];
       $hartaB->bilangan = $request->bilangan_[$i];
       $hartaB->unit_bilangan = $request->unit_bilangan_[$i];
   	   $hartaB->nilai_perolehan = $request->nilai_perolehan_[$i];
       $hartaB->cara_perolehan = $request->cara_perolehan_[$i];
       $hartaB->lain_lain = $request->lain_lain_[$i];
       $hartaB->cara_belian = $request->cara_belian_[$i];
       $hartaB->nama_pemilikan_asal = $request->nama_pemilikan_asal_[$i];
       $hartaB->tunai = $request->tunai_[$i];
   	   $hartaB->jumlah_pinjaman = $request->jumlah_pinjaman_[$i];
       $hartaB->institusi_pinjaman = $request->institusi_pinjaman_[$i];
       $hartaB->tempoh_bayar_balik = $request->tempoh_bayar_balik_[$i];
       $hartaB->ansuran_bulanan = $request->ansuran_bulanan_[$i];
       $hartaB->tarikh_ansuran_pertama = $request->tarikh_ansuran_pertama_[$i];
       $hartaB->keterangan_lain = $request->keterangan_lain_[$i];
       $hartaB->jenis_harta_pelupusan = $request->jenis_harta_pelupusan_[$i];
   	   $hartaB->alamat_asset = $request->alamat_asset_[$i];
       $hartaB->no_pendaftaran = $request->no_pendaftaran_[$i];
       $hartaB->harga_jualan = $request->harga_jualan_[$i];
       $hartaB->tarikh_lupus = $request->tarikh_lupus_[$i];
       $hartaB->formbs_id = $formbs-> id;
       $hartaB->save();
     }

     //send notification to admin (noti yang dia dah berjaya declare)
     $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
     // dd($email);
     // $email = null; // for testing
     $admin_available = User::where('role','=','1')->get(); //get system admin information
     // if (!$email) {
     // dd($admin_available);
     foreach ($admin_available as $data) {
       // $formbs->notify(new UserFormAdminB($data, $email));
       // dd($formbs);
       $this->dispatch(new SendNotificationFormB($data, $email, $formbs));
       // dd($data);

       $table = Duration::first();
       // dd($table->duration);
       // $this->dispatch(new SendEmailNotification($data)->delay(Carbon::now()->addSeconds(5)));
       $emailJob = (new SendEmailNotification($data))->delay(Carbon::now()->addDays($table->duration));
       dispatch($emailJob);
     }
     return redirect()->route('user.harta.FormB.senaraihartaB');
  }
}

    public function update($id,$sedang_proses, $pinjaman_kenderaan_sendiri, $bulanan_kenderaan_sendiri, $pinjaman_kenderaan_pasangan, $bulanan_kenderaan_pasangan, $pinjaman_rumah_sendiri, $bulanan_rumah_sendiri, $pinjaman_rumah_pasangan, $bulanan_rumah_pasangan){
      // dd($request->all());
      $formbs = FormB::find($id);
      $formbs->gaji_pasangan  = request()->gaji_pasangan;
      $formbs->jumlah_imbuhan  = request()->jumlah_imbuhan;
      $formbs->jumlah_imbuhan_pasangan = request()->jumlah_imbuhan_pasangan;
      $formbs->sewa = request()->sewa;
      $formbs->sewa_pasangan = request()->sewa_pasangan;
      // $formbs->pinjaman_perumahan_pegawai  = request()->pinjaman_perumahan_pegawai;
      // $formbs->bulanan_perumahan_pegawai = request()->bulanan_perumahan_pegawai;
      // $formbs->pinjaman_perumahan_pasangan = request()->pinjaman_perumahan_pasangan;
      // $formbs->bulanan_perumahan_pasangan = request()->bulanan_perumahan_pasangan;
      // $formbs->pinjaman_kenderaan_pegawai = request()->pinjaman_kenderaan_pegawai;
      // $formbs->bulanan_kenderaan_pegawai= request()->bulanan_kenderaan_pegawai;
      // $formbs->pinjaman_kenderaan_pasangan = request()->pinjaman_kenderaan_pasangan;
      // $formbs->bulanan_kenderaan_pasangan  = request()->bulanan_kenderaan_pasangan;
      $formbs->pinjaman_perumahan_pegawai  = $pinjaman_rumah_sendiri;
      $formbs->bulanan_perumahan_pegawai = $bulanan_rumah_sendiri;
      $formbs->pinjaman_perumahan_pasangan = $pinjaman_rumah_pasangan;
      $formbs->bulanan_perumahan_pasangan = $bulanan_rumah_pasangan;

      $formbs->pinjaman_kenderaan_pegawai = $pinjaman_kenderaan_sendiri;
      $formbs->bulanan_kenderaan_pegawai= $bulanan_kenderaan_sendiri;
      $formbs->pinjaman_kenderaan_pasangan = $pinjaman_kenderaan_pasangan;
      $formbs->bulanan_kenderaan_pasangan  = $bulanan_kenderaan_pasangan;

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
      $formbs->status= $sedang_proses;
      $formbs->save();
     }

     public function updateFormB(Request $request,$id){
       // dd($request->all());
       if ($request->has('save')){
        $this->validatorsave(request()->all())->validate();
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
        // for ($i=key($request->dividen_1); $i <= $count1; $i++) {
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

      // for ($i=key($request->lain_lain_pinjaman); $i <= $count2; $i++) {
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

      //HartaB
      $hartaB= HartaB::where('formbs_id',$formbs->id)->get();
      // dd($hartaB);
      foreach ($hartaB as $data) {
        $data=HartaB::findOrFail($data->id);
        $data->delete();
        // $data->save();
      }

      if($request->jenis_harta_){
        $count_harta = count($request->jenis_harta_);
      }
      else {
        $count_harta = 0;
      }

      // $hartaB= HartaB::where('formbs_id',$formbs->id)->get();
      // dd($hartaB);
      $pinjaman_rumah_pasangan = 0;
      $bulanan_rumah_pasangan = 0;
      $pinjaman_kenderaan_pasangan = 0;
      $bulanan_kenderaan_pasangan = 0;

      $pinjaman_rumah_sendiri = 0;
      $bulanan_rumah_sendiri = 0;
      $pinjaman_kenderaan_sendiri = 0;
      $bulanan_kenderaan_sendiri = 0;

      for ($i=0; $i < $count_harta; $i++) {

        $hartaB = new HartaB();
        $hartaB->jenis_harta = $request->jenis_harta_[$i];
        $hartaB->pemilik_harta = $request->pemilik_harta_[$i];
        $hartaB->hubungan_pemilik = $request->select_hubungan_[$i];
        $hartaB->maklumat_harta = $request->maklumat_harta_[$i];
        $hartaB->tarikh_pemilikan_harta = $request->tarikh_pemilikan_harta_[$i];
        $hartaB->bilangan = $request->bilangan_[$i];
        $hartaB->unit_bilangan = $request->unit_bilangan_[$i];
        $hartaB->nilai_perolehan = $request->nilai_perolehan_[$i];
        $hartaB->cara_perolehan = $request->cara_perolehan_[$i];
        $hartaB->lain_lain = $request->lain_lain_[$i];
        $hartaB->cara_belian = $request->cara_belian_[$i];
        $hartaB->nama_pemilikan_asal = $request->nama_pemilikan_asal_[$i];
        $hartaB->tunai = $request->tunai_[$i];
        $hartaB->jumlah_pinjaman = $request->jumlah_pinjaman_[$i];
        $hartaB->institusi_pinjaman = $request->institusi_pinjaman_[$i];
        $hartaB->tempoh_bayar_balik = $request->tempoh_bayar_balik_[$i];
        $hartaB->ansuran_bulanan = $request->ansuran_bulanan_[$i];
        $hartaB->tarikh_ansuran_pertama = $request->tarikh_ansuran_pertama_[$i];
        $hartaB->keterangan_lain = $request->keterangan_lain_[$i];
        $hartaB->jenis_harta_pelupusan = $request->jenis_harta_pelupusan_[$i];
        $hartaB->alamat_asset = $request->alamat_asset_[$i];
        $hartaB->no_pendaftaran = $request->no_pendaftaran_[$i];
        $hartaB->harga_jualan = $request->harga_jualan_[$i];
        $hartaB->tarikh_lupus = $request->tarikh_lupus_[$i];
        $hartaB->formbs_id = $formbs-> id;
        $hartaB->save();
        // dd($hartaB);
        if ($request->jenis_harta_[$i] == "Kenderaan") {
          // dd("test");
          if($request->cara_belian_[$i] == "Pinjaman"){
            if ($request->select_hubungan_[$i] == "Sendiri") {
              $pinjaman_kenderaan_sendiri = $pinjaman_kenderaan_sendiri + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_kenderaan_sendiri = $bulanan_kenderaan_sendiri + $request->ansuran_bulanan_[$i] ?? 0;
            }
            elseif ($request->select_hubungan_[$i] == "Isteri/Suami") {
              $pinjaman_kenderaan_pasangan = $pinjaman_kenderaan_pasangan + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_kenderaan_pasangan = $bulanan_kenderaan_pasangan + $request->ansuran_bulanan_[$i] ?? 0;
            }
          }
        }
        elseif ($request->jenis_harta_[$i] == "Rumah") {
          if($request->cara_belian_[$i] == "Pinjaman"){
            if ($request->select_hubungan_[$i] == "Sendiri") {
              $pinjaman_rumah_sendiri = $pinjaman_rumah_sendiri + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_rumah_sendiri = $bulanan_rumah_sendiri + $request->ansuran_bulanan_[$i] ?? 0;
            }
            elseif ($request->select_hubungan_[$i] == "Isteri/Suami") {
              $pinjaman_rumah_pasangan = $pinjaman_rumah_pasangan + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_rumah_pasangan = $bulanan_rumah_pasangan + $request->ansuran_bulanan_[$i] ?? 0;
            }
          }
        }
      }

      // dd($pinjaman_kenderaan_sendiri);

      $sedang_proses ="Disimpan ke Draf";
      //ni masuk update function
      $this->update($id,$sedang_proses, $pinjaman_kenderaan_sendiri, $bulanan_kenderaan_sendiri, $pinjaman_kenderaan_pasangan, $bulanan_kenderaan_pasangan, $pinjaman_rumah_sendiri, $bulanan_rumah_sendiri, $pinjaman_rumah_pasangan, $bulanan_rumah_pasangan);


      return redirect()->route('user.harta.senaraidraft');
    }

       else if($request->has('publish')){

        $this->validatorpublish(request()->all())->validate();

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
        // for ($i=key($request->dividen_1); $i <= $count1; $i++) {
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

      // for ($i=key($request->lain_lain_pinjaman); $i <= $count2; $i++) {
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

      //HartaB
      $hartaB= HartaB::where('formbs_id',$formbs->id)->get();
      // dd($hartaB);
      foreach ($hartaB as $data) {
        $data=HartaB::findOrFail($data->id);
        $data->delete();
        // $data->save();
      }

      if($request->jenis_harta_){
        $count_harta = count($request->jenis_harta_);
      }
      else {
        $count_harta = 0;
      }

      // $hartaB= HartaB::where('formbs_id',$formbs->id)->get();
      // dd($hartaB);

      $pinjaman_rumah_pasangan = 0;
      $bulanan_rumah_pasangan = 0;
      $pinjaman_kenderaan_pasangan = 0;
      $bulanan_kenderaan_pasangan = 0;

      $pinjaman_rumah_sendiri = 0;
      $bulanan_rumah_sendiri = 0;
      $pinjaman_kenderaan_sendiri = 0;
      $bulanan_kenderaan_sendiri = 0;

      for ($i=0; $i < $count_harta; $i++) {

    	  $hartaB = new HartaB();
    	  $hartaB->jenis_harta = $request->jenis_harta_[$i];
    	  $hartaB->pemilik_harta = $request->pemilik_harta_[$i];
        $hartaB->hubungan_pemilik = $request->select_hubungan_[$i];
        $hartaB->maklumat_harta = $request->maklumat_harta_[$i];
        $hartaB->tarikh_pemilikan_harta = $request->tarikh_pemilikan_harta_[$i];
        $hartaB->bilangan = $request->bilangan_[$i];
        $hartaB->unit_bilangan = $request->unit_bilangan_[$i];
    	  $hartaB->nilai_perolehan = $request->nilai_perolehan_[$i];
        $hartaB->cara_perolehan = $request->cara_perolehan_[$i];
        $hartaB->lain_lain = $request->lain_lain_[$i];
        $hartaB->cara_belian = $request->cara_belian_[$i];
        $hartaB->nama_pemilikan_asal = $request->nama_pemilikan_asal_[$i];
        $hartaB->tunai = $request->tunai_[$i];
    	  $hartaB->jumlah_pinjaman = $request->jumlah_pinjaman_[$i];
        $hartaB->institusi_pinjaman = $request->institusi_pinjaman_[$i];
        $hartaB->tempoh_bayar_balik = $request->tempoh_bayar_balik_[$i];
        $hartaB->ansuran_bulanan = $request->ansuran_bulanan_[$i];
        $hartaB->tarikh_ansuran_pertama = $request->tarikh_ansuran_pertama_[$i];
        $hartaB->keterangan_lain = $request->keterangan_lain_[$i];
        $hartaB->jenis_harta_pelupusan = $request->jenis_harta_pelupusan_[$i];
    	  $hartaB->alamat_asset = $request->alamat_asset_[$i];
        $hartaB->no_pendaftaran = $request->no_pendaftaran_[$i];
        $hartaB->harga_jualan = $request->harga_jualan_[$i];
        $hartaB->tarikh_lupus = $request->tarikh_lupus_[$i];
        $hartaB->formbs_id = $formbs-> id;
        $hartaB->save();

        if ($request->jenis_harta_[$i] == "Kenderaan") {
          // dd("test");
          if($cara_belian_[$i] =="Pinjaman"){
            if ($request->select_hubungan_[$i] == "Sendiri") {
              $pinjaman_kenderaan_sendiri = $pinjaman_kenderaan_sendiri + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_kenderaan_sendiri = $bulanan_kenderaan_sendiri + $request->ansuran_bulanan_[$i] ?? 0;
            }
            elseif ($request->select_hubungan_[$i] == "Isteri/Suami") {
              $pinjaman_kenderaan_pasangan = $pinjaman_kenderaan_pasangan + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_kenderaan_pasangan = $bulanan_kenderaan_pasangan + $request->ansuran_bulanan_[$i] ?? 0;
            }
          }
        }
        elseif ($request->jenis_harta_[$i] == "Rumah") {
          if($cara_belian_[$i] =="Pinjaman"){
            if ($request->select_hubungan_[$i] == "Sendiri") {
              $pinjaman_rumah_sendiri = $pinjaman_rumah_sendiri + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_rumah_sendiri = $bulanan_rumah_sendiri + $request->ansuran_bulanan_[$i] ?? 0;
            }
            elseif ($request->select_hubungan_[$i] == "Isteri/Suami") {
              $pinjaman_rumah_pasangan = $pinjaman_rumah_pasangan + $request->jumlah_pinjaman_[$i] ?? 0;
              $bulanan_rumah_pasangan = $bulanan_rumah_pasangan + $request->ansuran_bulanan_[$i] ?? 0;
            }
          }
        }
      }

      $sedang_proses ="Sedang Diproses";
      //ni masuk update function
      $this->update($id,$sedang_proses, $pinjaman_kenderaan_sendiri, $bulanan_kenderaan_sendiri, $pinjaman_kenderaan_pasangan, $bulanan_kenderaan_pasangan, $pinjaman_rumah_sendiri, $bulanan_rumah_sendiri, $pinjaman_rumah_pasangan, $bulanan_rumah_pasangan);

      //send notification to admin (noti yang dia dah berjaya declare)
      $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
      // dd($email);
      // $email = null; // for testing
      $admin_available = User::where('role','=','1')->get(); //get system admin information
      // if (!$email) {
      foreach ($admin_available as $data) {
        // $formbs->notify(new UserFormAdminB($data, $email));
        $this->dispatch(new SendNotificationFormB($data, $email, $formbs));
      }

      return redirect()->route('user.harta.FormB.senaraihartaB');
    }
  }


}
