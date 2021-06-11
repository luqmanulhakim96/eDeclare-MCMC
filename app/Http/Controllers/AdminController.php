<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Gift;
use App\GiftB;
use App\FormB;
use App\FormC;
use App\FormD;
use App\FormG;
use App\DividenB;
use App\PinjamanB;
use App\DividenG;
use App\PinjamanG;
use App\Keluarga;
use App\Pinjaman;
use App\NilaiHadiah;
use App\JenisHadiah;
use App\JenisHarta;
use App\Asset;
use Auth;
use DB;
use App\DokumenB;
use App\DokumenC;
use App\DokumenD;
use App\DokumenG;
use App\DokumenSyarikat;
use App\Email;
use App\HartaB;
use App\TempohNotifikasi;
use App\UserTest;
use App\UlasanAdmin;
use App\UlasanHod;
use App\UlasanHodiv;

use App\Jobs\SendNotificationFormBHod;
use App\Jobs\SendNotificationFormCHod;
use App\Jobs\SendNotificationFormDHod;
use App\Jobs\SendNotificationFormGHod;
use App\Jobs\SendNotificationFormB;
use App\Jobs\SendNotificationFormC;
use App\Jobs\SendNotificationFormD;
use App\Jobs\SendNotificationFormG;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;

use App\Jobs\SendNotificationGift;
use App\Jobs\SendNotificationGiftB;

use Adldap\Laravel\Facades\Adldap;

class AdminController extends Controller
{
    //
    public function adminDashboard(){

      $listB = FormB::where('status','Sedang Diproses')->get();
      $attendance = FormB::with('formbs')->get();
      $listHadiah = Gift::where('status','Diproses ke Pentadbir Sistem')->get();
      $attendance = Gift::with('gifts')->get();

      $list = FormB::where('status','!=','Disimpan ke Draf')->count();
      $listC = FormC::where('status','!=','Disimpan ke Draf')->count();
      $listD = FormD::where('status','!=','Disimpan ke Draf')->count();
      $listG = FormG::where('status','!=','Disimpan ke Draf')->count();

      $listBDiterima = FormB::where('status','Diterima')->count();
      $listCDiterima = FormC::where('status','Diterima')->count();
      $listDDiterima = FormD::where('status','Diterima')->count();
      $listGDiterima = FormG::where('status','Diterima')->count();

      $listHadiahA = Gift::where('status','!=','Disimpan ke Draf')->count();
      $listHadiahB = GiftB::where('status','!=','Disimpan ke Draf')->count();
      $nilaiHadiah = NilaiHadiah::first();

      $pegawai_dah_declare_Bs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formbs.user_id ) as data from formbs where EXISTS ( SELECT formbs.user_id FROM formbs, users where formbs.user_id= users.id)"));
      $pegawai_dah_declare_Cs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formcs.user_id ) as data from formcs where EXISTS ( SELECT formcs.user_id FROM formcs, users where formcs.user_id= users.id)"));
      $pegawai_dah_declare_Ds =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formds.user_id ) as data from formds where EXISTS ( SELECT formds.user_id FROM formds, users where formds.user_id= users.id)"));
      $pegawai_dah_declare_Gs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formgs.user_id ) as data from formgs where EXISTS ( SELECT formgs.user_id FROM formgs, users where formgs.user_id= users.id)"));

      $pegawai_gift_declare =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT gifts.user_id ) as data from gifts where EXISTS ( SELECT gifts.user_id FROM gifts, users where gifts.user_id= users.id)"));
      $pegawai_giftb_declare =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT giftbs.user_id ) as data from giftbs where EXISTS ( SELECT giftbs.user_id FROM giftbs, users where giftbs.user_id= users.id)"));

      // $total_declare = $pegawai_dah_declare_Bs[0]->data + $pegawai_dah_declare_Cs[0]->data + $pegawai_dah_declare_Ds[0]->data + $pegawai_dah_declare_Gs[0]->data;
      // dd($total_declare);
      $total_user =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT users.id ) as data From users"));
      $undeclareB= $total_user[0]->data - $pegawai_dah_declare_Bs[0]->data ;
      $undeclareC= $total_user[0]->data - $pegawai_dah_declare_Cs[0]->data ;
      $undeclareD= $total_user[0]->data - $pegawai_dah_declare_Ds[0]->data ;
      $undeclareG= $total_user[0]->data - $pegawai_dah_declare_Gs[0]->data ;
      $undeclareGift= $total_user[0]->data - $pegawai_gift_declare[0]->data ;
      $undeclareGiftB= $total_user[0]->data - $pegawai_giftb_declare[0]->data ;

      // $total_no_declare = $undeclareB + $undeclareC + $undeclareD + $undeclareG;

      // dd($undeclareC);
      // $userldap = Adldap::search()->users()->find('Siti Rafidah'); //active directory testing
      // $userldap = Adldap::first(); //active directory testing

      // $userldap = Adldap::search()->users()->find('Siti Rafidah'); //active directory testing
      // dd($userldap);
      // dd(UserTest::get());
      // $users = DB::connection('sqlsrv2')->select(DB::raw ("SELECT * From dbo.V_ED_STAFF"));
      $bahagian=UserExistingStaffInfo::where('USERNAME', auth()->user()->username)->first();

      if(auth()->user()->role == 2){
        $pegawai_dah_declare_Bs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formbs.user_id ) as data from formbs where EXISTS ( SELECT formbs.user_id FROM formbs, users where formbs.user_id= users.id AND formbs.status='Diproses ke Ketua Jabatan Integriti')"));
        $pegawai_dah_declare_Cs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formcs.user_id ) as data from formcs where EXISTS ( SELECT formcs.user_id FROM formcs, users where formcs.user_id= users.id AND formcs.status='Diproses ke Ketua Jabatan Integriti')"));
        $pegawai_dah_declare_Ds =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formds.user_id ) as data from formds where EXISTS ( SELECT formds.user_id FROM formds, users where formds.user_id= users.id AND formds.status='Diproses ke Ketua Jabatan Integriti')"));
        $pegawai_dah_declare_Gs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formgs.user_id ) as data from formgs where EXISTS ( SELECT formgs.user_id FROM formgs, users where formgs.user_id= users.id AND formgs.status='Diproses ke Ketua Jabatan Integriti')"));

        $pegawai_gift_declare =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT gifts.user_id ) as data from gifts where EXISTS ( SELECT gifts.user_id FROM gifts, users where gifts.user_id= users.id AND gifts.status='Diproses ke Ketua Jabatan Integriti')"));
        $pegawai_giftb_declare =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT giftbs.user_id ) as data from giftbs where EXISTS ( SELECT giftbs.user_id FROM giftbs, users where giftbs.user_id= users.id AND giftbs.status='Diproses ke Ketua Jabatan Integriti')"));

        $list = FormB::where('status','!=','Disimpan ke Draf')->where('status','Diproses ke Ketua Jabatan Integriti')->count();
        $listC = FormC::where('status','!=','Disimpan ke Draf')->where('status','Diproses ke Ketua Jabatan Integriti')->count();
        $listD = FormD::where('status','!=','Disimpan ke Draf')->where('status','Diproses ke Ketua Jabatan Integriti')->count();
        $listG = FormG::where('status','!=','Disimpan ke Draf')->where('status','Diproses ke Ketua Jabatan Integriti')->count();

        $listHadiahA = Gift::where('status','!=','Disimpan ke Draf')->where('status','Diproses ke Ketua Jabatan Integriti')->count();
        $listHadiahB = GiftB::where('status','!=','Disimpan ke Draf')->where('status','Diproses ke Ketua Jabatan Integriti')->count();
      }
      elseif (auth()->user()->role == 3) {
        $pegawai_dah_declare_Bs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formbs.user_id ) as data from formbs where EXISTS ( SELECT formbs.user_id FROM formbs, users where formbs.user_id= users.id AND formbs.status='Diproses ke Ketua Bahagian')"));
        $pegawai_dah_declare_Cs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formcs.user_id ) as data from formcs where EXISTS ( SELECT formcs.user_id FROM formcs, users where formcs.user_id= users.id AND formcs.status='Diproses ke Ketua Bahagian')"));
        $pegawai_dah_declare_Ds =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formds.user_id ) as data from formds where EXISTS ( SELECT formds.user_id FROM formds, users where formds.user_id= users.id AND formds.status='Diproses ke Ketua Bahagian')"));
        $pegawai_dah_declare_Gs =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT formgs.user_id ) as data from formgs where EXISTS ( SELECT formgs.user_id FROM formgs, users where formgs.user_id= users.id AND formgs.status='Diproses ke Ketua Bahagian')"));

        $pegawai_gift_declare =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT gifts.user_id ) as data from gifts where EXISTS ( SELECT gifts.user_id FROM gifts, users where gifts.user_id= users.id AND gifts.status='Diproses ke Ketua Bahagian')"));
        $pegawai_giftb_declare =DB::connection('sqlsrv')->select(DB::raw ("SELECT COUNT( DISTINCT giftbs.user_id ) as data from giftbs where EXISTS ( SELECT giftbs.user_id FROM giftbs, users where giftbs.user_id= users.id AND giftbs.status='Diproses ke Ketua Bahagian')"));


        $hodivFormB = FormB::where('status','Diproses ke Ketua Bahagian')->get();
        // $hodivFormBDiterima = FormB::where('status','Diterima')->get();

        $list = 0; //form b count
        // $listBDiterima = 0;
        foreach ($hodivFormB as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            $list++;
          }
        }
        // foreach ($hodivFormBDiterima as $data) {
        //   $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
        //   if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
        //     $listBDiterima++;
        //   }
        // }

        $hodivFormC = FormC::where('status','Diproses ke Ketua Bahagian')->get();
        $listC = 0; //form C count
        foreach ($hodivFormC as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            $listC++;
          }
        }

        $hodivFormD = FormD::where('status','Diproses ke Ketua Bahagian')->get();
        $listD = 0; //form C count
        foreach ($hodivFormD as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            $listD++;
          }
        }

        $hodivFormG = FormG::where('status','Diproses ke Ketua Bahagian')->get();
        $listG = 0; //form C count
        foreach ($hodivFormG as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            $listG++;
          }
        }

        $hodivHadiahA = Gift::where('status','Diproses ke Ketua Bahagian')->get();
        $listHadiahA = 0;
        foreach ($hodivHadiahA as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            $listHadiahA++;
          }
        }

        $hodivHadiahB = GiftB::where('status','Diproses ke Ketua Bahagian')->get();
        $listHadiahB = 0;
        foreach ($hodivHadiahB as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            $listHadiahB++;
          }
        }

        $total_user =DB::connection('sqlsrv2')->select(DB::raw ("SELECT COUNT( DISTINCT V_ED_STAFF_INFO.STAFFNO ) as data From V_ED_STAFF_INFO WHERE OLEVEL4NAME = '$bahagian->OLEVEL4NAME'"));
        $undeclareB= $total_user[0]->data - $pegawai_dah_declare_Bs[0]->data ;
        $undeclareC= $total_user[0]->data - $pegawai_dah_declare_Cs[0]->data ;
        $undeclareD= $total_user[0]->data - $pegawai_dah_declare_Ds[0]->data ;
        $undeclareG= $total_user[0]->data - $pegawai_dah_declare_Gs[0]->data ;
        $undeclareGift= $total_user[0]->data - $pegawai_gift_declare[0]->data ;
        $undeclareGiftB= $total_user[0]->data - $pegawai_giftb_declare[0]->data ;

      }

      return view('user.admin.view', compact('nilaiHadiah',
                                             'listB','listHadiah','list','listC','listD','listG',
                                             'listHadiahA','listHadiahB','listBDiterima','listCDiterima',
                                             'listDDiterima','listGDiterima','pegawai_dah_declare_Bs',
                                             'pegawai_dah_declare_Cs','pegawai_dah_declare_Ds','pegawai_dah_declare_Gs',
                                             'pegawai_gift_declare','pegawai_giftb_declare',
                                             'undeclareGift','undeclareGiftB',
                                             'undeclareB','undeclareC','undeclareD','undeclareG'));
    }


    public function systemConfig(){
      $nilaiHadiah = NilaiHadiah::first();
      // dd($nilaiHadiah);
      $jenisHadiah = JenisHadiah::get();
      $jenisHarta = JenisHarta::get();
      // dd($listHadiah);

      return view('user.admin.systemconfig', compact('nilaiHadiah','jenisHadiah','jenisHarta'));
  }

  public function updateNilaiHadiah(Request $request,$id){
    $gifts=NilaiHadiah::find($id);
    // dd($request->all());
    $gifts->nilai_hadiah = $request->nilai_hadiah;
    $gifts->save();

    return redirect()->route('user.admin.systemconfig');
  }

  public function notification(){
    $listEmel = Email::get();
    $listTempohNotifikasi = TempohNotifikasi::get();
    // dd($listTempohNotifikasi[0]['id']);
    return view('user.admin.notification',compact('listEmel','listTempohNotifikasi'));
  }

  public function listAsset(){


    return view('user.admin.listAsset');
  }

  public function senaraihadiah()
  {
    $nilai_hadiah = NilaiHadiah::first();
    return view('user.admin.hadiah.senaraihadiah', compact('nilai_hadiah'));
  }

  public function senaraiharta()
  {
    return view('user.admin.harta.senaraiharta');
  }

//senarai hadiah lebih dari rm 100
  public function listGift(){

    $listHadiah = Gift::where('status','Sedang Diproses')->get();
    $attendance = Gift::with('gifts')->get();
    // dd($listHadiah);
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.listGift', compact('listHadiah','nilai_hadiah'));

  }
  //senarai hadiah bawah rm100
  public function listGiftB(){
    $listHadiah = GiftB::where('status','Sedang Diproses')->get();
    $attendance = GiftB::with('giftbs')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.listGiftB', compact('listHadiah','nilai_hadiah'));

  }

  public function listDiterima(){

    $listHadiah = Gift::where('status','Diterima')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahA.listDiterima', compact('listHadiah','nilai_hadiah'));

  }

  public function listTidakDiterima(){

    $listHadiah = Gift::where('status','Tidak Diterima')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahA.listTidakDiterima', compact('listHadiah','nilai_hadiah'));

  }

  public function listTidakLengkap(){

    $listHadiah = Gift::where('status','Tidak Lengkap')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahA.listTidakLengkap', compact('listHadiah','nilai_hadiah'));

  }

  public function listDiterimaB(){

    $listHadiah = GiftB::where('status','Diterima')->get();
    $attendance = GiftB::with('giftbs')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahB.listDiterima', compact('listHadiah','nilai_hadiah'));

  }

  public function listTidakDiterimaB(){

    $listHadiah = GiftB::where('status','Tidak Diterima')->get();
    $attendance = GiftB::with('giftbs')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahB.listTidakDiterima', compact('listHadiah','nilai_hadiah'));

  }

  public function listTidakLengkapB(){

    $listHadiah = GiftB::where('status','Tidak Lengkap')->get();
    $attendance = GiftB::with('giftbs')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahB.listTidakLengkap', compact('listHadiah','nilai_hadiah'));

  }

  public function diprosesHODIV(){

    $listHadiah = Gift::where('status','Diproses ke Pentadbir Sistem')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.HadiahA.diprosesHODIV', compact('listHadiah','nilai_hadiah'));

  }

  public function viewUlasanHadiahB($id)
  {
     //dd($id);
    $listHadiah = GiftB::findOrFail($id);
    $attendance = GiftB::with('giftbs')->get();
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    $nilai_hadiah = NilaiHadiah::first();
    $ulasanAdmin = UlasanAdmin::where('giftb_id', $listHadiah->id) ->get();
    // $ulasanHOD = UlasanHod::where('giftb_id', $listHadiah->id) ->get();

    return view('user.admin.hadiah.ulasanHadiahB', compact('listHadiah','nilai_hadiah','staffinfo','ulasanAdmin'));
  }

  public function viewUlasanHadiah($id)
  {
     //dd($id);
    $listHadiah = Gift::findOrFail($id);
    $attendance = Gift::with('gifts')->get();
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    $nilai_hadiah = NilaiHadiah::first();
    $ulasanAdmin = UlasanAdmin::where('gift_id', $listHadiah->id) ->get();
    $ulasanHodiv = UlasanHodiv::where('gift_id', $listHadiah->id) ->get();

    return view('user.admin.hadiah.ulasanHadiah', compact('listHadiah','nilai_hadiah','staffinfo','ulasanAdmin','ulasanHodiv'));
  }

  public function viewUlasanHartaG($id)
  {
     //dd($id);
    $listHarta = FormG::findOrFail($id);
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    // dd($staffinfo);
    $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
    $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
    $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();
    $user = UserExistingStaffInfo::where('STAFFNO', $listHarta->no_staff) ->get('STAFFNO');
    $ulasanAdmin = UlasanAdmin::where('formgs_id', $listHarta->id) ->get();
    $ulasanHOD = UlasanHod::where('formgs_id', $listHarta->id) ->get();

    // dd($user);

    foreach ($user as $keluarga) {
        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }

    if($maklumat_pasangan->isEmpty()){
      return view('user.admin.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','staffinfo','ulasanAdmin','ulasanHOD'));
    }
    elseif ($maklumat_anak->isEmpty()) {
      return view('user.admin.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan','staffinfo','ulasanAdmin','ulasanHOD'));
    }
    else{
      return view('user.admin.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan','maklumat_anak','staffinfo','ulasanAdmin','ulasanHOD'));
    }
  }

  public function viewUlasanHartaB($id)
  {

    $listHarta = FormB::findOrFail($id);
     // dd($listHarta);
    $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

    $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();

    $hartaB =HartaB::where('formbs_id',$listHarta->id) ->get();

    $username =Auth::user()->username;

    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();

    $user = UserExistingStaffInfo::where('STAFFNO', $listHarta->no_staff) ->get('STAFFNO');
    $ulasanAdmin = UlasanAdmin::where('formbs_id', $listHarta->id) ->get();
    $ulasanHOD = UlasanHod::where('formbs_id', $listHarta->id) ->get();
    // dd($user);

    foreach ($user as $keluarga) {

        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }

    if($maklumat_pasangan->isEmpty()){
      return view('user.admin.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB','hartaB','staffinfo','ulasanAdmin','ulasanHOD'));
    }
    elseif ($maklumat_anak->isEmpty()) {
      return view('user.admin.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan','staffinfo','ulasanAdmin','ulasanHOD'));
    }
    else{
    return view('user.admin.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_anak','maklumat_pasangan','staffinfo','ulasanAdmin','ulasanHOD'));
    }
  }

  public function viewUlasanHartaC($id)
  {
     //dd($id);
    $listHarta = FormC::findOrFail($id);
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    $hartaB =HartaB::where('formcs_id',$listHarta->id)->get();
    $ulasanAdmin = UlasanAdmin::where('formcs_id', $listHarta->id) ->get();
    $ulasanHOD = UlasanHod::where('formcs_id', $listHarta->id) ->get();

    return view('user.admin.harta.ulasanHartaC', compact('listHarta','staffinfo','hartaB','ulasanAdmin','ulasanHOD'));
  }

  public function viewUlasanHartaD($id)
  {
     //dd($id);
    $listHarta = FormD::findOrFail($id);
    $username =Auth::user()->username;
    $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
    $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();
    $dokumen_syarikat = DokumenSyarikat::where('formds_id', $listHarta->id) ->get();
    $ulasanAdmin = UlasanAdmin::where('formds_id', $listHarta->id) ->get();
    $ulasanHOD = UlasanHod::where('formds_id', $listHarta->id) ->get();

    return view('user.admin.harta.ulasanHartaD', compact('listHarta','staffinfo','listKeluarga','dokumen_syarikat','ulasanAdmin','ulasanHOD'));
  }

  public function listformB(){
    $listB = FormB::where('status','Sedang Diproses')->get();
    $attendance = FormB::with('formbs')->get();
    // dd($listB);

    return view('user.admin.harta.listB.senaraiformB', compact('listB'));

  }
  public function listformBupload(){
    $listB = FormB::where('status','Proses ke Jawatankuasa Tatatertib')->get();
    $attendance = FormB::with('formbs')->get();

    return view('user.admin.harta.listB.upload', compact('listB'));

  }

  public function listformCupload(){
    $listC = FormC::where('status','Proses ke Jawatankuasa Tatatertib')->get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.listC.upload', compact('listC'));

  }

  public function listformDupload(){
    $listD = FormD::where('status','Proses ke Jawatankuasa Tatatertib')->get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.listD.upload', compact('listD'));

  }

  public function listformGupload(){
    $listG = FormG::where('status','Proses ke Jawatankuasa Tatatertib')->get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.listG.upload', compact('listG'));

  }

  public function listformBDiterima(){

    $listB = FormB::where('status','Diterima')->get();
    $attendance = FormB::with('formbs')->get();

    return view('user.admin.harta.listB.Diterima', compact('listB'));

  }

  public function listformBTidakLengkap(){

    $listB = FormB::where('status','Tidak Lengkap')->get();
    $attendance = FormB::with('formbs')->get();

    return view('user.admin.harta.listB.TidakLengkap', compact('listB'));

  }

  public function listformBTidakDiterima(){

    $listB = FormB::where('status','Tidak Diterima')->get();
    $attendance = FormB::with('formbs')->get();

    return view('user.admin.harta.listB.TidakDiterima', compact('listB'));

  }

  public function listformBProsesHOD(){

    $listB = FormB::where('status','Proses ke Ketua Jabatan Integriti')->get();
    $attendance = FormB::with('formbs')->get();

    return view('user.admin.harta.listB.ProsesHOD', compact('listB'));

  }

  public function listformC(){

    $listC = FormC::where('status','Sedang Diproses')->get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.listC.senaraiformC', compact('listC'));

  }

  public function listformCDiterima(){

    $listC = FormC::where('status','Diterima')->get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.listC.Diterima', compact('listC'));

  }

  public function listformCTidakLengkap(){

    $listC = FormC::where('status','Tidak Lengkap')->get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.listC.TidakLengkap', compact('listC'));

  }

  public function listformCTidakDiterima(){

    $listC = FormC::where('status','Tidak Diterima')->get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.listC.TidakDiterima', compact('listC'));

  }

  public function listformCProsesHOD(){

    $listC = FormC::where('status','Proses ke Ketua Jabatan Integriti')->get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.listC.ProsesHOD', compact('listC'));

  }

  public function listformD(){

    $listD = FormD::where('status','Sedang Diproses')->get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.listD.senaraiformD', compact('listD'));

  }

  public function listformDDiterima(){

    $listD = FormD::where('status','Diterima')->get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.listD.Diterima', compact('listD'));

  }

  public function listformDTidakLengkap(){

    $listD = FormD::where('status','Tidak Lengkap')->get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.listD.TidakLengkap', compact('listD'));

  }

  public function listformDTidakDiterima(){

    $listD = FormD::where('status','Tidak Diterima')->get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.listD.TidakDiterima', compact('listD'));

  }

  public function listformDProsesHOD(){

    $listD = FormD::where('status','Proses ke Ketua Jabatan Integriti')->get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.listD.ProsesHOD', compact('listD'));

  }

  public function listformG(){

    $listG = FormG::where('status','Sedang Diproses')->get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.listG.senaraiformG', compact('listG'));

  }

  public function listformGDiterima(){

    $listG = FormG::where('status','Diterima')->get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.listG.Diterima', compact('listG'));

  }

  public function listformGTidakLengkap(){

    $listG = FormG::where('status','Tidak Lengkap')->get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.listG.TidakLengkap', compact('listG'));

  }

  public function listformGTidakDiterima(){

    $listG = FormG::where('status','Tidak Diterima')->get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.listG.TidakDiterima', compact('listG'));

  }

  public function listformGProsesHOD(){

    $listG = FormG::where('status','Proses ke Ketua Jabatan Integriti')->get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.listG.ProsesHOD', compact('listG'));

  }


   public function updateStatusUlasanAdminB(Request $request,$id){

      $statusb = FormB::find($id);
      $statusb->status = $request->status;
      $statusb->save();

      $formbs = new UlasanAdmin();
      $formbs->nama_admin = $request->nama_admin;
      $formbs->no_admin = $request->no_admin;
      $formbs->ulasan_admin = $request->ulasan_admin;
      $formbs->formbs_id = $id;
      $formbs->save();

     //send notification to HOD (noti ulasan admin dah check)
     // dd($request->status);
     if($request->status == 'Proses ke Ketua Jabatan Integriti'){

     $email = Email::where('penerima', '=', 'Ketua Jabatan Integriti')->where('jenis', '=', 'Proses ke Ketua Jabatan Integriti (Harta)')->first(); //template email yang diguna
     // $email = null; // for testing
     $hod_available = User::where('role','=','2')->get(); //get system admin information
     // if ($email) {
       foreach ($hod_available as $data) {
         // $formcs->notify(new UserFormAdminC($data, $email));
         $this->dispatch(new SendNotificationFormBHod($data, $email, $statusb));
       }
     }
     else{
     $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
     $user = User::where('id', '=', $statusb->user_id)->first();

     $this->dispatch(new SendNotificationFormB($user, $email, $statusb));

     }

     return redirect()->route('user.admin.harta.senaraiallharta');
   }

   public function updateStatusUlasanAdminC(Request $request,$id){

     $statusc = FormC::find($id);
     $statusc->status = $request->status;
     $statusc->save();

     $formcs = new UlasanAdmin();
     $formcs->nama_admin = $request->nama_admin;
     $formcs->no_admin = $request->no_admin;
     $formcs->ulasan_admin = $request->ulasan_admin;
     $formcs->formcs_id = $id;
     $formcs->save();
     //send notification to HOD (noti ulasan admin dah check)
     if($request->status == 'Proses ke Ketua Jabatan Integriti'){

     $email = Email::where('penerima', '=', 'Ketua Jabatan Integriti')->where('jenis', '=', 'Proses ke Ketua Jabatan Integriti (Harta)')->first(); //template email yang diguna
     // $email = null; // for testing
     $hod_available = User::where('role','=','2')->get(); //get system admin information
     // if ($email) {
       foreach ($hod_available as $data) {
         // $formcs->notify(new UserFormAdminC($data, $email));
         $this->dispatch(new SendNotificationFormCHod($data, $email, $statusc));
       }
     }
     else{

     $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
     $user = User::where('id', '=', $statusc->user_id)->first(); //get system admin information

     $this->dispatch(new SendNotificationFormC($user, $email, $statusc));

     }

     return redirect()->route('user.admin.harta.senaraiallharta');
   }

   public function updateStatusUlasanAdminD(Request $request,$id){

     $statusd = FormD::find($id);
     $statusd->status = $request->status;
     $statusd->save();

     $formds = new UlasanAdmin();
     $formds->nama_admin = $request->nama_admin;
     $formds->no_admin = $request->no_admin;
     $formds->ulasan_admin = $request->ulasan_admin;
     $formds->formds_id = $id;
     $formds->save();
     //send notification to HOD (noti ulasan admin dah check)
     if($request->status == 'Proses ke Ketua Jabatan Integriti'){

     $email = Email::where('penerima', '=', 'Ketua Jabatan Integriti')->where('jenis', '=', 'Proses ke Ketua Jabatan Integriti (Harta)')->first(); //template email yang diguna
     // $email = null; // for testing
     $hod_available = User::where('role','=','2')->get(); //get system admin information
     // if ($email) {
       foreach ($hod_available as $data) {
         // $formcs->notify(new UserFormAdminC($data, $email));
         $this->dispatch(new SendNotificationFormDHod($data, $email, $statusd));
       }
     }
     else{
       $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
       $user = User::where('id', '=', $statusd->user_id)->first(); //get system admin information

       $this->dispatch(new SendNotificationFormD($user, $email, $statusd));
    }

     return redirect()->route('user.admin.harta.senaraiallharta');
   }

   public function updateStatusUlasanAdminG(Request $request,$id){

     $statusg = FormG::find($id);
     $statusg->status = $request->status;
     $statusg->save();

     $formgs = new UlasanAdmin();
     $formgs->nama_admin = $request->nama_admin;
     $formgs->no_admin = $request->no_admin;
     $formgs->ulasan_admin = $request->ulasan_admin;
     $formgs->formgs_id = $id;
     $formgs->save();
     //send notification to HOD (noti ulasan admin dah check)
     if($request->status == 'Proses ke Ketua Jabatan Integriti'){

     $email = Email::where('penerima', '=', 'Ketua Jabatan Integriti')->where('jenis', '=', 'Proses ke Ketua Jabatan Integriti (Harta)')->first(); //template email yang diguna
     // $email = null; // for testing
     $hod_available = User::where('role','=','2')->get(); //get system admin information
     // if ($email) {
       foreach ($hod_available as $data) {
         // $formcs->notify(new UserFormAdminC($data, $email));
         $this->dispatch(new SendNotificationFormGHod($data, $email, $statusg));
       }
     }
     else{
       $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
       $user = User::where('id', '=', $statusg->user_id)->first(); //get system admin information

       $this->dispatch(new SendNotificationFormG($user, $email, $statusg));
    }

     return redirect()->route('user.admin.harta.senaraiallharta');
   }

   public function updateStatusUlasanAdminGift(Request $request,$id){

      $statusgift = Gift::find($id);
      $statusgift->status = $request->status;
      $statusgift->save();

      $gifts = new UlasanAdmin();
      $gifts->nama_admin = $request->nama_admin;
      $gifts->no_admin = $request->no_admin;
      $gifts->ulasan_admin = $request->ulasan_admin;
      $gifts->gift_id = $id;
      $gifts->save();

     //send notification to users (status="Diterima" && status="Tidak Diterima" && status="Tidak Lengkap")

     if($request->status == 'Tidak Lengkap'){

       $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Hadiah)')->first(); //template email yang diguna
       // $email = null; // for testing
       $user = User::where('id', '=', $statusgift->user_id)->first(); //get system admin information

       $this->dispatch(new SendNotificationGift($user, $email, $statusgift));
       }

       else if($request->status == 'Diproses ke Ketua Bahagian'){
       $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Proses ke Ketua Bahagian (Hadiah)')->first(); //template email yang diguna
       // $email = null; // for testing
       $hodiv_available = User::where('role','=','3')->get(); //get system hodiv information
       // if ($email) {
         foreach ($hodiv_available as $data) {
           // $giftbs->notify(new UserGiftAdminB($data, $email));
           $this->dispatch(new SendNotificationGift($data, $email, $statusgift));
         }
       }

   //   if($request->status == 'Tidak Lengkap'){
   //
   //     $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Hadiah)')->first(); //template email yang diguna
   //     // $email = null; // for testing
   //     $user = User::where('id', '=', $gifts->user_id)->first(); //get system admin information
   //
   //     $this->dispatch(new SendNotificationGift($user, $email, $gifts));
   //     }
   //
   //   else if ($request->status == 'Proses ke ') {
   //     $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Diterima')->first(); //template email yang diguna
   //     // $email = null; // for testing
   //     $user = User::where('id', '=', $gifts->user_id)->first(); //get system admin information
   //
   //     $this->dispatch(new SendNotificationGift($user, $email, $gifts));
   //
   //  }
   //   else {
   //     $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Gagal')->first(); //template email yang diguna
   //     // $email = null; // for testing
   //     $user = User::where('id', '=', $gifts->user_id)->first(); //get system admin information
   //
   //     $this->dispatch(new SendNotificationGift($user, $email, $gifts));
   //
   // }


     return redirect()->route('user.admin.hadiah.senaraiallhadiah');
   }

   public function updateStatusUlasanAdminGiftB(Request $request,$id){

     $statusgiftb = GiftB::find($id);
      $statusgiftb->status = $request->status;
      $statusgiftb->save();

      $giftbs = new UlasanAdmin();
      $giftbs->nama_admin = $request->nama_admin;
      $giftbs->no_admin = $request->no_admin;
      $giftbs->ulasan_admin = $request->ulasan_admin;
      $giftbs->giftb_id = $id;
      $giftbs->save();

     //send notification to users (status="Diterima" && status="Tidak Diterima" && status="Tidak Lengkap")
     //send notification to users (status="Diterima" && status="Tidak Diterima" && status="Tidak Lengkap")
     if($request->status == 'Tidak Lengkap'){

       $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Hadiah)')->first(); //template email yang diguna
       // $email = null; // for testing
       $user = User::where('id', '=', $statusgiftb->user_id)->first(); //get system admin information

       $this->dispatch(new SendNotificationGift($user, $email, $statusgiftb));
       }

       else if($request->status == 'Diproses ke Ketua Jabatan Integriti'){
       $email = Email::where('penerima', '=', 'Ketua Jabatan Integriti')->where('jenis', '=', 'Proses ke Ketua Jabatan Integriti (Hadiah)')->first(); //template email yang diguna
       // $email = null; // for testing
       $hod_available = User::where('role','=','2')->get(); //get system hodiv information
       // if ($email) {
         foreach ($hod_available as $data) {
           // $giftbs->notify(new UserGiftAdminB($data, $email));
           $this->dispatch(new SendNotificationGift($data, $email, $statusgiftb));
         }
       }

   //   else if ($request->status == 'Diterima') {
   //     $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Diterima')->first(); //template email yang diguna
   //     // $email = null; // for testing
   //     $user = User::where('id', '=', $giftbs->user_id)->first(); //get system admin information
   //
   //     $this->dispatch(new SendNotificationGift($user, $email, $giftbs));
   //
   //  }
   //   else {
   //     $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Gagal')->first(); //template email yang diguna
   //     // $email = null; // for testing
   //     $user = User::where('id', '=', $giftbs->user_id)->first(); //get system admin information
   //
   //     $this->dispatch(new SendNotificationGift($user, $email, $giftbs));
   //
   // }
   else {
     $email = Email::where('penerima', '=', 'Ketua Jabatan Integriti')->where('jenis', '=', 'Perisytiharan Hadiah Baharu')->first(); //template email yang diguna
     // $email = null; // for testing
     $hod_available = User::where('role','=','2')->get(); //get system hodiv information
     // if ($email) {
       foreach ($hod_available as $data) {
         // $giftbs->notify(new UserGiftAdminB($data, $email));
         $this->dispatch(new SendNotificationGiftB($data, $email, $giftbs));
       }
     }



     return redirect()->route('user.admin.hadiah.senaraiallhadiah');
   }

   public function addjenishadiah(array $data){
      $status_jenis_hadiah= "Aktif";
       return JenisHadiah::create([
         'jenis_gift' => $data['jenis_gift'],
         'status_jenis_hadiah' => $status_jenis_hadiah
       ]);
     }

     protected function validatorjenishadiah(array $data)
   {
       return Validator::make($data, ['jenis_gift' =>['nullable', 'string']]);
   }

     public function submitJenisHadiah(Request $request){

     $this->validatorjenishadiah($request->all())->validate();

     event($jenis_hadiahs = $this->addjenishadiah($request->all()));
// dd($jenis_hadiahs);
     //send notification to admin (noti yang dia dah berjaya declare)
     return redirect()->route('user.admin.systemconfig');
     }

     public function deleteJenisHadiah(Request $request){
        // dd($request->id);
        $status_jenis_hadiah_baru= "Tak Aktif";
        $id=$request->id;
        $gifts=JenisHadiah::find($id);
        $gifts->status_jenis_hadiah = $status_jenis_hadiah_baru;
        $gifts->save();

      return redirect()->route('user.admin.systemconfig');
     }

     public function addjenisharta(array $data){
        $status_jenis_harta= "Aktif";
         return JenisHarta::create([
           'jenis_harta' => $data['jenis_harta'],
           'status_jenis_harta' => $status_jenis_harta
         ]);
       }

       protected function validatorjenisharta(array $data)
     {
         return Validator::make($data, ['jenis_harta' =>['nullable', 'string']]);
     }

       public function submitJenisHarta(Request $request){

       $this->validatorjenishadiah($request->all())->validate();

       event($jenis_hartas = $this->addjenisharta($request->all()));
  // dd($jenis_hadiahs);
       //send notification to admin (noti yang dia dah berjaya declare)
       return redirect()->route('user.admin.systemconfig');
       }

       public function deleteJenisHarta(Request $request){
          // dd($request->id);
          $status_jenis_harta_baru= "Tak Aktif";
          $id=$request->id;
          $gifts=JenisHarta::find($id);
          $gifts->status_jenis_harta = $status_jenis_harta_baru;
          $gifts->save();

        return redirect()->route('user.admin.systemconfig');
       }

       public function senarailaporanharta()
       {
         return view('user.admin.harta.senarailaporanharta');
       }

       public function reportB(){
         $listB = FormB::where('status','Diterima')->get();

         $attendance = FormB::with('formbs')->get();

         return view('user.admin.harta.reportB',compact('listB'));
       }

       public function reportC(){
         $listC = FormC::where('status','Diterima')->get();

         $attendance = FormC::with('formcs')->get();

         return view('user.admin.harta.reportC',compact('listC'));
       }

       public function reportD(){
         $listD = FormD::where('status','Diterima')->get();

         $attendance = FormD::with('formds')->get();

         return view('user.admin.harta.reportD',compact('listD'));
       }

       public function reportG(){
         $listG = FormG::where('status','Diterima')->get();

         $attendance = FormG::with('formgs')->get();

         return view('user.admin.harta.reportG',compact('listG'));
       }

       public function kemaskinigift($id,Request $request){
         $status = "Sedang Diproses";
         $status_edit = "Sedang Dikemaskini";
         $form=Gift::find($id);
         // dd( $request->all());
         if ($request->has('edit'))
         {
           // dd($id);
           $form->status = $status_edit;
           $form->save();
         }
         else if ($request->has('takedit'))
          {
            $form->status = $status;
            $form->save();
          }
          return redirect()->route('user.admin.hadiah.senaraitugasanhadiah');
        }

        public function kemaskinigiftB($id,Request $request){
          $status = "Sedang Diproses";
          $status_edit = "Sedang Dikemaskini";
          $form=GiftB::find($id);
          // dd( $request->all());
          if ($request->has('edit'))
          {
            // dd($id);
            $form->status = $status_edit;
            $form->save();
          }
          else if ($request->has('takedit'))
           {
             $form->status = $status;
             $form->save();
           }
           return redirect()->route('user.admin.hadiah.senaraitugasanhadiah');
         }

       public function kemaskiniB($id,Request $request){
         $status = "Sedang Diproses";
         $status_edit = "Sedang Dikemaskini";
         $form=FormB::find($id);
         // dd( $request->all());
         if ($request->has('edit'))
         {
           // dd($id);
           $form->status = $status_edit;
           $form->save();
         }
         else if ($request->has('takedit'))
          {
            $form->status = $status;
            $form->save();
          }
          return redirect()->route('user.admin.harta.senaraitugasanharta');
        }

      public function kemaskiniC($id,Request $request){
        $status = "Sedang Diproses";
        $status_edit = "Sedang Dikemaskini";
        $form=FormC::find($id);
        // dd( $request->all());
        if ($request->has('edit'))
        {
          // dd($id);
          $form->status = $status_edit;
          $form->save();
        }
        else if ($request->has('takedit'))
         {
           $form->status = $status;
           $form->save();
         }
         return redirect()->route('user.admin.harta.senaraitugasanharta');
       }

       public function kemaskiniD($id,Request $request){
         $status = "Sedang Diproses";
         $status_edit = "Sedang Dikemaskini";
         $form=FormD::find($id);
         // dd( $request->all());
         if ($request->has('edit'))
         {
           // dd($id);
           $form->status = $status_edit;
           $form->save();
         }
         else if ($request->has('takedit'))
          {
            $form->status = $status;
            $form->save();
          }
          return redirect()->route('user.admin.harta.senaraitugasanharta');
        }

      public function kemaskiniG($id,Request $request){
        $status = "Sedang Diproses";
        $status_edit = "Sedang Dikemaskini";
        $form=FormG::find($id);
        // dd( $request->all());
        if ($request->has('edit'))
        {
          // dd($id);
          $form->status = $status_edit;
          $form->save();
        }
        else if ($request->has('takedit'))
         {
           $form->status = $status;
           $form->save();
         }

       return redirect()->route('user.admin.harta.senaraitugasanharta');
     }

       public function senaraiAllForm(){
         if (auth()->user()->role == 2) {
           $listallA = Asset::with('users')->select('id','no_staff','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
            // dd($listallA);
           $listallB = FormB::with('users')->select('id','no_staff','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallBTable = FormB::getTableName();
           $listallC = FormC::with('users')->select('id','no_staff','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallD = FormD::with('users')->select('id','no_staff','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallG = FormG::with('users')->select('id','no_staff','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
         }
         else{
           $listallA = Asset::with('users')->select('id','no_staff','created_at','status', 'user_id')->get();
            // dd($listallA);
           $listallB = FormB::with('users')->select('id','no_staff','created_at','status', 'user_id')->get();
           $listallBTable = FormB::getTableName();
           $listallC = FormC::with('users')->select('id','no_staff','created_at','status', 'user_id')->get();
           $listallD = FormD::with('users')->select('id','no_staff','created_at','status', 'user_id')->get();
           $listallG = FormG::with('users')->select('id','no_staff','created_at','status', 'user_id')->get();
         }

         $merged = $listallA->mergeRecursive($listallB);
         $merged = $merged->mergeRecursive($listallC);
         $merged = $merged->mergeRecursive($listallD);
         $merged = $merged->mergeRecursive($listallG)->sortBy('status');
         // dd($merged);

         return view('user.admin.harta.senaraiallharta', compact('merged'));
       }

       public function senaraiTugasanHarta(){
         if (auth()->user()->role == 2) {
           $listallB = FormB::with('users')->select('id','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallBTable = FormB::getTableName();
           $listallC = FormC::with('users')->select('id','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallD = FormD::with('users')->select('id','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallG = FormG::with('users')->select('id','created_at','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
         }
         else{
           $listallB = FormB::with('users')->select('id','created_at','status', 'user_id')->get();
           $listallBTable = FormB::getTableName();
           $listallC = FormC::with('users')->select('id','created_at','status', 'user_id')->get();
           $listallD = FormD::with('users')->select('id','created_at','status', 'user_id')->get();
           $listallG = FormG::with('users')->select('id','created_at','status', 'user_id')->get();
         }

         $merged = $listallB->mergeRecursive($listallC);
         $merged = $merged->mergeRecursive($listallD);
         $merged = $merged->mergeRecursive($listallG)->sortBy('status');

         // $username =strtoupper(Auth::user()->name);
         // $username=$this->split_name($username);
         // $user = UserExistingStaff::where('STAFFNAME', 'LIKE', strtoupper($username['first_name'].' '.$username['middle_name']).'%') ->get('STAFFNO');

         return view('user.admin.harta.senaraitugasanharta', compact('merged'));
       }

       public function senaraiAllHadiah(){
         if (auth()->user()->role == 2) {
           $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
         }
         else{
           $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->get();
           $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->get();
         }

         $merged = $listallA->mergeRecursive($listallB)->sortBy('status');
         // dd($merged);

         return view('user.admin.hadiah.senaraiallhadiah', compact('merged'));
       }

       public function senaraiTugasanHadiah(){

         if (auth()->user()->role == 2) {
           $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
           $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('status', 'Diproses ke Ketua Jabatan Integriti')->get();
         }
         else{
           $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->get();
           $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->get();
         }

         $merged = $listallA->mergeRecursive($listallB)->sortBy('status');

         return view('user.admin.hadiah.senaraitugasanhadiah', compact('merged'));
       }

       public function reportHadiah(){
         $listHadiah = Gift::where('status','Diterima')->get();
         // dd($listHadiah);
         $attendance = Gift::with('gifts')->get();
         $listHadiahBs = GiftB::where('status','Diterima')->get();
         $attendanceb = GiftB::with('giftbs')->get();


         $listHadiahA = Gift::where('status','Diterima')->count();
         $listHadiahB = GiftB::where('status','Diterima')->count();
         $nilaiHadiah = NilaiHadiah::first();
         // dd($nilaiHadiah);
         $hadiah =DB::connection('sqlsrv')->select(DB::raw("SELECT COUNT(gifts.status) as count, gifts.jenis_gift FROM jenis_hadiahs, gifts WHERE gifts.jenis_gift = jenis_hadiahs.jenis_gift AND gifts.status = 'Diterima' GROUP BY gifts.jenis_gift"));
         // $hadiahB =DB::connection('sqlsrv')->select(DB::raw("SELECT COUNT(giftbs.status) as count, giftbs.jenis_gift FROM jenis_hadiahs, giftbs WHERE giftbs.jenis_gift = jenis_hadiahs.jenis_gift AND giftbs.status = 'Diterima' GROUP BY giftbs.jenis_gift"));
         // $hadiah = $hadiahA->mergeRecursive($hadiahB);
         // dd($hadiah);
         // $hadiahB =DB::select(DB::raw("SELECT COUNT(giftbs.status) as count, giftbs.jenis_gift FROM jenis_hadiahs, giftbs WHERE giftbs.jenis_gift = jenis_hadiahs.jenis_gift AND giftbs.status = 'Diterima' GROUP BY giftbs.jenis_gift"));


         return view('user.admin.hadiah.report', compact('hadiah','nilaiHadiah','listHadiah','listHadiahA','listHadiahBs','listHadiahB'));
       }

       public function submitDokumenB(Request $request, $id){
         // dd($request->all());
         // $status="Proses ke Pentadbir Sistem(Tatatertib)";
         $formbs = FormB::findOrFail($id);
         $formbs->status = $request->status;
         $formbs->save();
         foreach($request->dokumen_pegawai as $file)
         {
             $file_syarikat = new DokumenB();
             $file_syarikat->dokumen_pegawai = $file->store('public/uploads/dokumen_pegawai');
             $file_syarikat->formbs_id = $formbs->id;
             $file_syarikat->save();
              // dd($file);
         }
         return redirect()->route('user.admin.harta.senaraiallharta');
       }

       public function submitDokumenC(Request $request, $id){
         // dd($request->all());
         // $status="Proses ke Pentadbir Sistem(Tatatertib)";
         $formcs = FormC::findOrFail($id);
         $formcs->status = $request->status;
         $formcs->save();

         foreach($request->dokumen_pegawai as $file)
         {
             $file_syarikat = new DokumenC();
             $file_syarikat->dokumen_pegawai = $file->store('public/uploads/dokumen_pegawai');
             $file_syarikat->formcs_id = $formcs->id;
             $file_syarikat->save();
             // dd($file_syarikat);
         }
         return redirect()->route('user.admin.harta.senaraiallharta');
       }

       public function submitDokumenD(Request $request, $id){
         // dd($request->all());
         // $status="Proses ke Pentadbir Sistem(Tatatertib)";
         $formds = FormD::findOrFail($id);
         $formds->status = $request->status;
         $formds->save();

         foreach($request->dokumen_pegawai as $file)
         {
             $file_syarikat = new DokumenD();
             $file_syarikat->dokumen_pegawai = $file->store('public/uploads/dokumen_pegawai');
             $file_syarikat->formds_id = $formds->id;
             $file_syarikat->save();
             // dd($file_syarikat);
         }
         return redirect()->route('user.admin.harta.senaraiallharta');
       }

       public function submitDokumenG(Request $request, $id){
         // dd($request->all());
         // $status="Proses ke Pentadbir Sistem(Tatatertib)";
         $formgs = FormG::findOrFail($id);
         $formgs->status = $request->status;
         $formgs->save();

         foreach($request->dokumen_pegawai as $file)
         {
             $file_syarikat = new DokumenG();
             $file_syarikat->dokumen_pegawai = $file->store('public/uploads/dokumen_pegawai');
             $file_syarikat->formgs_id = $formgs->id;
             $file_syarikat->save();
             // dd($file_syarikat);
         }
         return redirect()->route('user.admin.harta.senaraiallharta');
       }

       public function EmelTemplate()
       {
         return view('user.admin.template_email');
       }

       public function addemel(array $data){
           return Email::create([
             'jenis' => $data['jenis'],
             'penerima' => $data['penerima'],
             'subjek' => $data['subjek'],
             'tajuk' => $data['tajuk'],
             'kandungan' => $data['kandungan']
           ]);
         }

         protected function validatoremel(array $data)
       {
           return Validator::make($data, [
             'jenis' =>['nullable', 'string'],
             'penerima'=>['nullable', 'string'],
             'subjek'=>['nullable', 'string'],
             'tajuk'=>['nullable', 'string'],
             'kandungan'=>['nullable', 'string']
         ]);
       }

         public function submitemel(Request $request){

         $this->validatoremel($request->all())->validate();

         event($emails = $this->addemel($request->all()));

         return redirect()->route('user.admin.notification');
         }

         public function deleteemel($id){
             $gifts = Email::find($id);
             $gifts-> delete();
             return redirect()->route('user.admin.notification');
         }

         public function editemel($id){
             $info = Email::findOrFail($id);
             return view('user.admin.edit_email', compact('info'));
           }

           public function update($id){
             $emails = Email::find($id);
             $emails->jenis = request()->jenis;
             $emails->penerima = request()->penerima;
             $emails->subjek = request()->subjek;
             $emails->tajuk = request()->tajuk;
             $emails->kandungan = request()->kandungan;
             $emails->save();
           }

         public function updateemel(Request $request,$id){
           // dd($request->all());
            $this->validatoremel(request()->all())->validate();
           // dd($request->all());

           $this->update($id);
           return redirect()->route('user.admin.notification');
         }

         public function updateTempohNotifikasi(Request $request,$id){
           // dd($request->all());
           $tempoh=TempohNotifikasi::find($id);
           // dd($tempoh);

           $tempoh->tempoh_notifikasi = $request->tempoh_notifikasi;
           $tempoh->save();

           return redirect()->route('user.admin.notification');
         }

         public function listAllUserDeclaration(){
           return view('user.admin.senarai_user_declaration');
         }

         public function listAllUserDeclarationAjax(Request $request){

           $draw = $request->get('draw');
           $start = $request->get("start");
           $rowperpage = $request->get("length"); // Rows display per page

           $columnIndex_arr = $request->get('order');
           $columnName_arr = $request->get('columns');
           $order_arr = $request->get('order');
           $search_arr = $request->get('search');

           $columnIndex = $columnIndex_arr[0]['column']; // Column index
           $columnName = $columnName_arr[$columnIndex]['data']; // Column name
           $columnSortOrder = $order_arr[0]['dir']; // asc or desc
           $searchValue = $search_arr['value']; // Search value

           // Total records
           $totalRecords = User::select('count(*) as allcount')->count();
           $totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

           $records = User::orderBy($columnName,$columnSortOrder)
            ->where('users.name', 'like', '%' .$searchValue . '%')
            ->select('users.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

            $data_arr = array();
            $sno = $start+1;

            foreach($records as $record){
                $id = $record->id;
                $name = $record->name;
                $link = route('user.admin.senaraiallharta1', $record->id);

                $data_arr[] = array(
                    "id" => $id,
                    "name" => $name,
                    "link" => $link,
                );
            }

            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr
            );

            echo json_encode($response);
            exit;

           // $alluser = User::paginate(10);
           // // dd($alluser);
           //
           // foreach ($alluser as $user) {
           //   // $nostaff = UserExistingStaff::where('STAFFNAME',$user->name)->get();
           //   $nostaff = UserExistingStaff::where('STAFFNAME','LIKE', strtoupper($user->name).'%')->get();
           //
           //   // dd($nostaff);
           //  }
         }

         public function senaraiAllUserForm($id){

           $user= User::find($id);
           // dd($user->id);
           $listallA = Asset::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user->id)->get();
           $listallB = FormB::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user->id)->get();
           $listallBTable = FormB::getTableName();
           $listallC = FormC::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user->id)->get();
           $listallD = FormD::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user->id)->get();
           $listallG = FormG::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user->id)->get();
           $merged = $listallA->mergeRecursive($listallB);
           $merged = $merged->mergeRecursive($listallC);
           $merged = $merged->mergeRecursive($listallD);
           $merged = $merged->mergeRecursive($listallG)->sortBy('status');

           return view('user.admin.senaraiallharta1', compact('merged'));
         }

         public function kemaskiniHarta(Request $request,$id){
           // dd($request->all());
           $harta=HartaB::find($id);
           $harta->jenis_harta = $request->jenis_harta;
           $harta->save();

           return redirect()->back()->with("success","Berjaya Kemaskini Jenis Harta");

         }

         public function kemaskiniHadiahA(Request $request,$id){
           // dd($request->all());
           $gifts=Gift::find($id);
           $gifts->jenis_gift = $request->jenis_gift;
           $gifts->save();

           return redirect()->back()->with("success","Berjaya Kemaskini Jenis Hadiah");

         }

         public function kemaskiniHadiahB(Request $request,$id){
           // dd($request->all());
           $gifts=GiftB::find($id);
           $gifts->jenis_gift = $request->jenis_gift;
           $gifts->save();

           return redirect()->back()->with("success","Berjaya Kemaskini Jenis Hadiah");

         }


}
