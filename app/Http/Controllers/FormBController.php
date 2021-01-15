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
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;

use PDF;


// use App\Notifications\Form\UserFormAdminB;
use App\Jobs\SendNotificationFormB;

class FormBController extends Controller
{
  public function split_name($name) {
    $parts = array();

  while ( strlen( trim($name)) > 0 ) {
      $name = trim($name);
      $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
      $parts[] = $string;
      $name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
  }

  if (empty($parts)) {
      return false;
  }

  $parts = array_reverse($parts);
  $name = array();
  $name['first_name'] = $parts[0];
  $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
  $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');

  return $name;
  }

  public function formB()
  {
    $jenisHarta = JenisHarta::get();


    //data gaji user (latest)
    // $username =strtoupper(Auth::user()->username);
    //  // dd($username);
    // // $username ="Nik Husna Binti Nik Ali";
    // // $username =$this->split_name($username);
    // // dd($username);
    // $salary = UserExistingStaffInfo::where('USERNAME', $username)->get();
    // // $salary = UserExistingStaffInfo::where('STAFFNAME','$username')  ->get();
    // // dd($salary);


    //data gaji user
    $username =strtoupper(Auth::user()->name);
    // $username ="Nik Husna Binti Nik Ali";
    $username=$this->split_name($username);
    // dd($username);
    $salary = UserExistingStaffInfo::where('STAFFNAME','LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%')->get();
    // $salary = UserExistingStaffInfo::where('STAFFNAME','$username')  ->get();
    // dd($salary);

    //data ic pasangan
    $username =strtoupper(Auth::user()->name);
    //data dari form latest
    $userid = Auth::user()->id;
    $data_user = FormB::where('user_id', $userid) ->get();

    $username=$this->split_name($username);
    $user = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');
    // dd($user);
    if($user->isEmpty()){
      if($data_user->isEmpty()){
        $last_data_formb = null;
        $dividen_user= null;
        $pinjaman_user= null;
        $maklumat_pasangan = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');
        $maklumat_anak = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');
        return view('user.harta.FormB.formB', compact('jenisHarta','salary','maklumat_pasangan','maklumat_anak','dividen_user','last_data_formb','pinjaman_user'));
      }
    }
    else{
      $data_user = FormB::where('user_id', $userid) ->get();
      $last_data_formb = collect($data_user)->last();
      $dividen_user = DividenB::where('formbs_id', $last_data_formb->id) ->get();
      // dd($dividen_user);
      $pinjaman_user = PinjamanB::where('formbs_id', $last_data_formb->id) ->get();

      foreach ($user as $keluarga) {

        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }
        return view('user.harta.FormB.formB', compact('jenisHarta','salary','maklumat_pasangan','maklumat_anak','dividen_user','last_data_formb','pinjaman_user'));

    }

  }

  public function editformB($id){
    //$info = SenaraiHarga::find(1);
    $info = FormB::findOrFail($id);
    // dd($info);
    $jenisHarta = JenisHarta::get();

    //data gaji user
    $username =strtoupper(Auth::user()->name);
    $username=$this->split_name($username);
    $salary = UserExistingStaff::where('STAFFNAME','LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get();
    //data testing
    // $salary = UserExistingStaff::where('STAFFNAME','THAMILSELVAN S/O MUNYANDY') ->get();

    $user = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');
    // dd($user);
    foreach ($user as $pasangan) {
      $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')
                                                ->where('STAFFNO',$pasangan->STAFFNO)->get();
      // dd(UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO','522')->get());

      }

    //data anak
   foreach ($user as $anak) {
    $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$anak->STAFFNO)->get();
    $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$anak->STAFFNO)->where('RELATIONSHIP','D')->get();
    $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);

  }

    $listDividenB = DividenB::where('formbs_id', $info->id) ->get();

    $listPinjamanB = PinjamanB::where('formbs_id', $info->id) ->get();

    $count_div = DividenB::where('formbs_id', $info->id)->count();
    $count_pinjaman = PinjamanB::where('formbs_id', $info->id)->count();



    return view('user.harta.FormB.editformB', compact('info','listDividenB','listPinjamanB','count_div','count_pinjaman','jenisHarta','salary','maklumat_anak','maklumat_pasangan'));
  }

public function add(array $data){
  $userid = Auth::user()->id;
  $sedang_proses= "Sedang Diproses";
  // dd($sedang_proses);

    return FormB::create([
      'nama_pegawai' => $data['nama_pegawai'],
      'kad_pengenalan' => $data['kad_pengenalan'],
      'jawatan' => $data['jawatan'],
      'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
      'gaji' => $data['gaji'],
      'jabatan' => $data['jabatan'],
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
      'pengakuan' => $data['pengakuan'],
      'user_id' => $userid,
      'status' => $sedang_proses,



    ]);

  }

  public function adddraft(array $data,$isChecked){
    $userid = Auth::user()->id;
    $sedang_proses= "Disimpan ke Draf";
    // dd($sedang_proses);

      return FormB::create([
        'nama_pegawai' => $data['nama_pegawai'],
        'kad_pengenalan' => $data['kad_pengenalan'],
        'jawatan' => $data['jawatan'],
        'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
        'gaji' => $data['gaji'],
        'jabatan' => $data['jabatan'],
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
        'pengakuan' =>$isChecked,
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
      'gaji' =>['nullable', 'string'],
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
      'pinjaman_perumahan_pegawai' => ['nullable', 'numeric'],
      'bulanan_perumahan_pegawai' =>['nullable', 'numeric'],
      'pinjaman_perumahan_pasangan' => ['nullable', 'numeric'],
      'bulanan_perumahan_pasangan' => ['nullable', 'numeric'],
      'pinjaman_kenderaan_pegawai' => ['nullable', 'numeric'],
      'bulanan_kenderaan_pegawai' => ['nullable', 'numeric'],
      'pinjaman_kenderaan_pasangan' => ['nullable', 'numeric'],
      'bulanan_kenderaan_pasangan' =>['nullable', 'numeric'],
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
      'jumlah_pinjaman_pegawai' => ['nullable', 'string'],
      'jumlah_bulanan_pegawai' =>['nullable', 'string'],
      'jumlah_pinjaman_pasangan' => ['nullable', 'string'],
      'jumlah_bulanan_pasangan' => ['nullable', 'string'],
      'jenis_harta' => ['required', 'string'],
      'pemilik_harta' => ['required', 'string'],
      'hubungan_pemilik' => ['required', 'string'],
      'maklumat_harta' =>['required', 'string'],
      'tarikh_pemilikan_harta' =>['required', 'date'],
      'bilangan' =>['required', 'numeric'],
      'nilai_perolehan' => ['required', 'numeric'],
      'cara_perolehan' => ['required', 'string'],
      'nama_pemilikan_asal' => ['nullable', 'string'],
      'jumlah_pinjaman' => ['nullable', 'numeric'],
      'institusi_pinjaman' => ['nullable', 'string'],
      'tempoh_bayar_balik' =>['nullable', 'string'],
      'ansuran_bulanan' =>['nullable', 'numeric'],
      'tarikh_ansuran_pertama' => ['nullable', 'date'],
      'jenis_harta_pelupusan' => ['nullable', 'string'],
      'alamat_asset' => ['nullable', 'string'],
      'no_pendaftaran' => ['nullable', 'string'],
      'harga_jualan' => ['nullable', 'string'],
      'tarikh_lupus' => ['nullable', 'date'],
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
      'gaji' =>['nullable', 'string'],
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
      'pinjaman_perumahan_pegawai' => ['nullable', 'numeric'],
      'bulanan_perumahan_pegawai' =>['nullable', 'numeric'],
      'pinjaman_perumahan_pasangan' => ['nullable', 'numeric'],
      'bulanan_perumahan_pasangan' => ['nullable', 'numeric'],
      'pinjaman_kenderaan_pegawai' => ['nullable', 'numeric'],
      'bulanan_kenderaan_pegawai' => ['nullable', 'numeric'],
      'pinjaman_kenderaan_pasangan' => ['nullable', 'numeric'],
      'bulanan_kenderaan_pasangan' =>['nullable', 'numeric'],
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
      'jumlah_pinjaman_pegawai' => ['nullable', 'string'],
      'jumlah_bulanan_pegawai' =>['nullable', 'string'],
      'jumlah_pinjaman_pasangan' => ['nullable', 'string'],
      'jumlah_bulanan_pasangan' => ['nullable', 'string'],
      'jenis_harta' => ['nullable', 'string'],
      'pemilik_harta' => ['nullable', 'string'],
      'hubungan_pemilik' => ['nullable', 'string'],
      'maklumat_harta' =>['nullable', 'string'],
      'tarikh_pemilikan_harta' =>['nullable', 'date'],
      'bilangan' =>['nullable', 'numeric'],
      'nilai_perolehan' => ['nullable', 'numeric'],
      'cara_perolehan' => ['nullable', 'string'],
      'nama_pemilikan_asal' => ['nullable', 'string'],
      'jumlah_pinjaman' => ['nullable', 'numeric'],
      'institusi_pinjaman' => ['nullable', 'string'],
      'tempoh_bayar_balik' =>['nullable', 'string'],
      'ansuran_bulanan' =>['nullable', 'numeric'],
      'tarikh_ansuran_pertama' => ['nullable', 'date'],
      'jenis_harta_pelupusan' => ['nullable', 'string'],
      'alamat_asset' => ['nullable', 'string'],
      'no_pendaftaran' => ['nullable', 'string'],
      'harga_jualan' => ['nullable', 'string'],
      'tarikh_lupus' => ['nullable', 'date'],
    ]);
  }

  public function submitForm(Request $request){
// dd($request->all());
  if ($request->has('save'))
  {
    $isChecked = $request->has('pengakuan');
    $this->validatordraft($request->all())->validate();
    // dd($request->all());
    event($formbs = $this->adddraft($request->all(),$isChecked));

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
     return redirect()->route('user.harta.senaraidraft');
   }

  else if ($request->has('publish'))
  {
    $this->validator($request->all())->validate();

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

    public function update($id){
      $formbs = FormB::find($id);
      $sedang_proses= "Sedang Diproses";
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
      $formbs->status= $sedang_proses;
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

      if($request ->status =='Disimpan ke Draf'){
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

      }
      else{

      }

      $this->update($id);
      return redirect()->route('user.harta.FormB.senaraihartaB');
    }

}
