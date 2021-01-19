<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\FormB;
use App\DividenB;
use App\PinjamanB;
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
use App\UserExistingStaff;
use App\UserExistingStaffNextofKin;


class FormGController extends Controller
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

  public function formG()
  {
    //data dari form latest
    $userid = Auth::user()->id;
    $data_user = FormB::where('user_id', $userid) ->get();
    //data gaji user
    $username =strtoupper(Auth::user()->name);
    $username=$this->split_name($username);
    // dd($username);
    $salary = UserExistingStaff::where('STAFFNAME','LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get();


    //data ic pasangan
    $username =strtoupper(Auth::user()->name);
    $username=$this->split_name($username);

    $user = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');

    if($user->isEmpty()){
      if($data_user->isEmpty()){
        $last_data_formb = null;
        $dividen_user= null;
        $pinjaman_user= null;
        $maklumat_pasangan = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');
        $maklumat_anak = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');
      return view('user.harta.FormG.formG', compact('salary','maklumat_pasangan','maklumat_anak','dividen_user','last_data_formb','pinjaman_user'));
      }
    }
    else{
      $last_data_formb = collect($data_user)->last();
      $dividen_user = DividenB::where('formbs_id', $last_data_formb->id) ->get();
      $pinjaman_user = PinjamanB::where('formbs_id', $last_data_formb->id) ->get();

      foreach ($user as $keluarga) {

        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }
        return view('user.harta.FormG.formG', compact('salary','maklumat_pasangan','maklumat_anak','last_data_formb','dividen_user','pinjaman_user'));
    }
  }

  public function kemaskini($id){
    $status = "Menunggu Kebenaran Kemaskini";
    $form=FormG::find($id);
    // dd($request->all());
    $form->status = $status;
    $form->save();

    return redirect()->route('user.harta.FormB.senaraihartaB');
  }
  
public function editformG($id){
    //$info = SenaraiHarga::find(1);
    $info = FormG::findOrFail($id);
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

    $listDividenG = DividenG::where('formgs_id', $info->id) ->get();

    $listPinjamanG = PinjamanG::where('formgs_id', $info->id) ->get();

    $listPinjaman = Pinjaman::where('formgs_id', $info->id) ->get();

    $count_div = DividenG::where('formgs_id', $info->id)->count();

    $count_pinjaman = PinjamanG::where('formgs_id', $info->id)->count();

    $count_pinjam = Pinjaman::where('formgs_id', $info->id)->count();
    //dd($info);
    return view('user.harta.FormG.editformG', compact('info','listDividenG','listPinjamanG','listPinjaman','count_pinjaman','count_div','count_pinjam','salary','maklumat_anak','maklumat_pasangan'));
  }
  public function adddraft(array $data,$isChecked){
    $userid = Auth::user()->id;
    $sedang_proses= "Disimpan ke Draf";

      return FormG::create([
        'nama_pegawai' => $data['nama_pegawai'],
        'kad_pengenalan' => $data['kad_pengenalan'],
        'jawatan' => $data['jawatan'],
        'alamat_tempat_bertugas' => $data['alamat_tempat_bertugas'],
        'jabatan' => $data['jabatan'],
        'tarikh_lantikan' => $data['tarikh_lantikan'],
        'nama_perkhidmatan' => $data['nama_perkhidmatan'],
        'gelaran' => $data['gelaran'],
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
        'pengakuan' =>$isChecked,
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

  protected function validatordraft(array $data)
  {
    return Validator::make($data, [
      'nama_pegawai' =>['nullable', 'string'],
      'kad_pengenalan' => ['nullable', 'string'],
      'jawatan' => ['nullable', 'string'],
      'alamat_tempat_bertugas' => ['nullable', 'string'],
      'gaji' =>['nullable', 'string'],
      'jabatan' =>['nullable', 'string'],
      'tarikh_lantikan'  =>['nullable', 'date'],
      'nama_perkhidmatan' =>['nullable', 'string'],
      'gelaran'  =>['nullable', 'string'],
      'gaji_pasangan' =>['nullable', 'numeric'],
      'jumlah_imbuhan' => ['nullable', 'numeric'],
      'jumlah_imbuhan_pasangan' =>['nullable', 'numeric'],
      'sewa' =>['nullable', 'numeric'],
      'sewa_pasangan' =>['nullable', 'numeric'],
      'dividen_1[]' => ['nullable', 'string'],
      'dividen_1_pegawai[]' => ['nullable', 'numeric'],
      'dividen_1_pasangan[]' => ['nullable', 'numeric'],
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
      'luas_pertanian' => ['nullable', 'string'],
      'lot_pertanian' => ['nullable', 'string'],
      'mukim_pertanian' => ['nullable', 'string'],
      'luas_perumahan' => ['nullable', 'string'],
      'lot_perumahan'=> ['nullable', 'string'],
      'mukim_perumahan' => ['nullable', 'string'],
      'negeri_perumahan' => ['nullable', 'string'],
      'tarikh_diperolehi' => ['nullable', 'date'],
      'luas' => ['nullable', 'string'],
      'lot'=> ['nullable', 'string'],
      'mukim' => ['nullable', 'string'],
      'negeri' => ['nullable', 'string'],
      'jenis_tanah' => ['nullable', 'string'],
      'nama_syarikat' => ['nullable', 'string'],
      'modal_berbayar' => ['nullable', 'numeric'],
      'jumlah_unit_saham'=> ['nullable', 'string'],
      'nilai_saham' => ['nullable', 'numeric'],
      'sumber_kewangan' => ['nullable', 'string'],
      'institusi[]'=> ['nullable', 'string'],
      'alamat_institusi[]' => ['nullable', 'string'],
      'ansuran_bulanan[]' => ['nullable', 'string'],
      'tarikh_ansuran[]' => ['nullable', 'date'],
      'tempoh_pinjaman[]' => ['nullable', 'string'],
      'pengakuan' => ['nullable'],
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
      'tarikh_lantikan'  =>['required', 'date'],
      'nama_perkhidmatan' =>['required', 'string'],
      'gelaran'  =>['required', 'string'],
      'gaji_pasangan' =>['nullable', 'numeric'],
      'jumlah_imbuhan' => ['nullable', 'numeric'],
      'jumlah_imbuhan_pasangan' =>['nullable', 'numeric'],
      'sewa' =>['nullable', 'numeric'],
      'sewa_pasangan' =>['nullable', 'numeric'],
      'dividen_1[]' => ['nullable', 'string'],
      'dividen_1_pegawai[]' => ['nullable', 'numeric'],
      'dividen_1_pasangan[]' => ['nullable', 'numeric'],
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
      'luas_pertanian' => ['nullable', 'string'],
      'lot_pertanian' => ['nullable', 'string'],
      'mukim_pertanian' => ['nullable', 'string'],
      'luas_perumahan' => ['nullable', 'string'],
      'lot_perumahan'=> ['nullable', 'string'],
      'mukim_perumahan' => ['nullable', 'string'],
      'negeri_perumahan' => ['nullable', 'string'],
      'tarikh_diperolehi' => ['nullable', 'date'],
      'luas' => ['required', 'string'],
      'lot'=> ['required', 'string'],
      'mukim' => ['required', 'string'],
      'negeri' => ['required', 'string'],
      'jenis_tanah' => ['required', 'string'],
      'nama_syarikat' => ['required', 'string'],
      'modal_berbayar' => ['required', 'numeric'],
      'jumlah_unit_saham'=> ['required', 'string'],
      'nilai_saham' => ['required', 'numeric'],
      'sumber_kewangan' => ['required', 'string'],
      'institusi[]'=> ['nullable', 'string'],
      'alamat_institusi[]' => ['nullable', 'string'],
      'ansuran_bulanan[]' => ['nullable', 'string'],
      'tarikh_ansuran[]' => ['nullable', 'date'],
      'tempoh_pinjaman[]' => ['nullable', 'string'],
      'pengakuan' => ['required'],
    ]);
  }

  public function submitForm(Request $request){

  if ($request->has('save')){
      $isChecked = $request->has('pengakuan');

      $this->validatordraft($request->all())->validate();
     // dd($request->all());
      event($formgs = $this->adddraft($request->all(),$isChecked));
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
