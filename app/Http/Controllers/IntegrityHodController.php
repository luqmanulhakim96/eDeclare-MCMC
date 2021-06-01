<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\DokumenSyarikat;
use Auth;
use App\HartaB;
use DB;
use App\Email;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;
use App\UlasanHod;
use App\UlasanAdmin;
use App\UlasanHodiv;

use App\Jobs\SendNotificationFormBHod;
use App\Jobs\SendNotificationFormCHod;
use App\Jobs\SendNotificationFormDHod;
use App\Jobs\SendNotificationFormGHod;

use App\Jobs\SendNotificationGiftHod;

class IntegrityHodController extends Controller
{
    //
    public function integrityDashboard(){
      $listB = FormB::where('status','Proses ke Ketua Jabatan Integriti')->get();
      $attendance = FormB::with('formbs')->get();
      $listHadiah = Gift::where('status','Proses ke Ketua Jabatan Integriti')->get();
      $attendance = Gift::with('gifts')->get();

      $list = FormB::count();
      $listC = FormC::count();
      $listD = FormD::count();
      $listG = FormG::count();

      $listBDiterima = FormB::where('status','Diterima')->count();
      $listCDiterima = FormC::where('status','Diterima')->count();
      $listDDiterima = FormD::where('status','Diterima')->count();
      $listGDiterima = FormG::where('status','Diterima')->count();

      $listHadiahA = Gift::where('status','Diterima')->count();
      $listHadiahB = GiftB::where('status','Diterima')->count();
      $nilaiHadiah = NilaiHadiah::first();

      $pegawai_dah_declare_Bs =DB::select(DB::raw ("SELECT COUNT( DISTINCT formbs.user_id ) as data from formbs where EXISTS ( SELECT formbs.user_id FROM formbs, users where formbs.user_id= users.id)"));
      $pegawai_dah_declare_Cs =DB::select(DB::raw ("SELECT COUNT( DISTINCT formcs.user_id ) as data from formcs where EXISTS ( SELECT formcs.user_id FROM formcs, users where formcs.user_id= users.id)"));
      $pegawai_dah_declare_Ds =DB::select(DB::raw ("SELECT COUNT( DISTINCT formds.user_id ) as data from formds where EXISTS ( SELECT formds.user_id FROM formds, users where formds.user_id= users.id)"));
      $pegawai_dah_declare_Gs =DB::select(DB::raw ("SELECT COUNT( DISTINCT formgs.user_id ) as data from formgs where EXISTS ( SELECT formgs.user_id FROM formgs, users where formgs.user_id= users.id)"));

      $pegawai_gift_declare =DB::select(DB::raw ("SELECT COUNT( DISTINCT gifts.user_id ) as data from gifts where EXISTS ( SELECT gifts.user_id FROM gifts, users where gifts.user_id= users.id)"));
      $pegawai_giftb_declare =DB::select(DB::raw ("SELECT COUNT( DISTINCT giftbs.user_id ) as data from giftbs where EXISTS ( SELECT giftbs.user_id FROM giftbs, users where giftbs.user_id= users.id)"));

      // $total_declare = $pegawai_dah_declare_Bs[0]->data + $pegawai_dah_declare_Cs[0]->data + $pegawai_dah_declare_Ds[0]->data + $pegawai_dah_declare_Gs[0]->data;
      // dd($total_declare);
      $total_user =DB::select(DB::raw ("SELECT COUNT( DISTINCT users.id ) as data From users"));
      $undeclareB= $total_user[0]->data - $pegawai_dah_declare_Bs[0]->data ;
      $undeclareC= $total_user[0]->data - $pegawai_dah_declare_Cs[0]->data ;
      $undeclareD= $total_user[0]->data - $pegawai_dah_declare_Ds[0]->data ;
      $undeclareG= $total_user[0]->data - $pegawai_dah_declare_Gs[0]->data ;
      $undeclareGift= $total_user[0]->data - $pegawai_gift_declare[0]->data ;
      $undeclareGiftB= $total_user[0]->data - $pegawai_giftb_declare[0]->data ;

      // $total_no_declare = $undeclareB + $undeclareC + $undeclareD + $undeclareG;

      // dd($undeclareC);

      return view('user.admin.view', compact('nilaiHadiah',
                                             'listB','listHadiah','list','listC','listD','listG',
                                             'listHadiahA','listHadiahB','listBDiterima','listCDiterima',
                                             'listDDiterima','listGDiterima','pegawai_dah_declare_Bs',
                                             'pegawai_dah_declare_Cs','pegawai_dah_declare_Ds','pegawai_dah_declare_Gs',
                                             'pegawai_gift_declare','pegawai_giftb_declare','undeclareGift','undeclareGiftB',
                                             'undeclareB','undeclareC','undeclareD','undeclareG'));
    }

    public function listAsset(){

      return view('user.integrityHOD.listAsset');
    }

    public function senaraihadiah()
    {
      $nilai_hadiah = NilaiHadiah::first();
      return view('user.integrityHOD.hadiah.senaraihadiah', compact('nilai_hadiah'));
    }

    public function senaraiharta()
    {
      return view('user.integrityHOD.harta.senaraiharta');
    }

    public function listGift(){

      $listHadiah = Gift::where('status','Diproses ke Ketua Jabatan Integriti')->get();
      $attendance = Gift::with('gifts')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.listGift', compact('listHadiah','nilai_hadiah'));
    }
    public function listDiterima(){

      $listHadiah = Gift::where('status','Diterima')->get();
      $attendance = Gift::with('gifts')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.HadiahA.listDiterima', compact('listHadiah','nilai_hadiah'));

    }

    public function listTidakDiterima(){

      $listHadiah = Gift::where('status','Tidak Diterima')->get();
      $attendance = Gift::with('gifts')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.HadiahA.listTidakDiterima', compact('listHadiah','nilai_hadiah'));

    }

    public function listTidakLengkap(){

      $listHadiah = Gift::where('status','Tidak Lengkap')->get();
      $attendance = Gift::with('gifts')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.HadiahA.listTidakLengkap', compact('listHadiah','nilai_hadiah'));

    }

    public function diprosesHODIV(){

      $listHadiah = Gift::where('status','Diproses ke Pentadbir Sistem')->get();
      $attendance = Gift::with('gifts')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.HadiahA.diprosesHODIV', compact('listHadiah','nilai_hadiah'));

    }
    //senarai hadiah bawah rm100
    public function listGiftB(){
      $listHadiah = GiftB::get();
      $attendance = GiftB::with('giftbs')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.listGiftB', compact('listHadiah','nilai_hadiah'));

    }

    public function viewUlasanHadiahB($id)
    {
      $listHadiah = GiftB::findOrFail($id);
      $attendance = GiftB::with('giftbs')->get();
      $username =Auth::user()->username;
      $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
      $nilai_hadiah = NilaiHadiah::first();
      $ulasanAdmin = UlasanAdmin::where('giftb_id', $listHadiah->id) ->get();
      // $ulasanHodiv = UlasanHodiv::where('giftb_id', $listHadiah->id) ->get();

      return view('user.integrityHOD.hadiah.ulasanHadiahB', compact('listHadiah','nilai_hadiah','staffinfo','ulasanAdmin'));
    }

    public function viewUlasanHadiah($id)
    {
      $listHadiah = Gift::findOrFail($id);
      $attendance = Gift::with('gifts')->get();
      $username =Auth::user()->username;
      $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
      $nilai_hadiah = NilaiHadiah::first();
      $ulasanAdmin = UlasanAdmin::where('gift_id', $listHadiah->id) ->get();
      $ulasanHodiv = UlasanHodiv::where('gift_id', $listHadiah->id) ->get();

      return view('user.integrityHOD.hadiah.ulasanHadiah', compact('listHadiah','nilai_hadiah','staffinfo','ulasanAdmin','ulasanHodiv'));
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
      $ulasanHodiv = UlasanHodiv::where('formgs_id', $listHarta->id) ->get();
      $ulasanHOD = UlasanHod::where('formgs_id', $listHarta->id) ->get();
      // dd($user);

      foreach ($user as $keluarga) {
          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }

      if($maklumat_pasangan->isEmpty()){
        return view('user.integrityHOD.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','staffinfo','ulasanAdmin','ulasanHodiv','ulasanHOD'));
      }
      elseif ($maklumat_anak->isEmpty()) {
        return view('user.integrityHOD.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan','staffinfo','ulasanAdmin','ulasanHodiv','ulasanHOD'));
      }
      else{
        return view('user.integrityHOD.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan','maklumat_anak','staffinfo','ulasanAdmin','ulasanHodiv','ulasanHOD'));
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
      $ulasanHodiv = UlasanHodiv::where('formbs_id', $listHarta->id) ->get();
        $ulasanHOD = UlasanHod::where('formbs_id', $listHarta->id) ->get();
      // dd($user);

      foreach ($user as $keluarga) {

          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }

      if($maklumat_pasangan->isEmpty()){
        return view('user.integrityHOD.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB','hartaB','staffinfo','ulasanAdmin','ulasanHodiv','ulasanHOD'));
      }
      elseif ($maklumat_anak->isEmpty()) {
        return view('user.integrityHOD.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan','staffinfo','ulasanAdmin','ulasanHodiv','ulasanHOD'));
      }
      else{
      return view('user.integrityHOD.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_anak','maklumat_pasangan','staffinfo','ulasanAdmin','ulasanHodiv','ulasanHOD'));
      }
    }

    public function viewUlasanHartaC($id)
    {
      $listHarta = FormC::findOrFail($id);
      $username =Auth::user()->username;
      $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
      $hartaB =HartaB::where('formcs_id',$listHarta->id)->get();
      $ulasanAdmin = UlasanAdmin::where('formcs_id', $listHarta->id) ->get();
      $ulasanHodiv = UlasanHodiv::where('formcs_id', $listHarta->id) ->get();
        $ulasanHOD = UlasanHod::where('formcs_id', $listHarta->id) ->get();

      return view('user.integrityHOD.harta.ulasanHartaC', compact('listHarta','staffinfo','hartaB','ulasanAdmin','ulasanHodiv','ulasanHOD'));

    }

    public function viewUlasanHartaD($id)
    {
      $listHarta = FormD::findOrFail($id);
      $username =Auth::user()->username;
      $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
      $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();
      $dokumen_syarikat = DokumenSyarikat::where('formds_id', $listHarta->id) ->get();
      $ulasanAdmin = UlasanAdmin::where('formds_id', $listHarta->id) ->get();
      $ulasanHodiv = UlasanHodiv::where('formds_id', $listHarta->id) ->get();
        $ulasanHOD = UlasanHod::where('formds_id', $listHarta->id) ->get();

      return view('user.integrityHOD.harta.ulasanHartaD', compact('listHarta','staffinfo','listKeluarga','dokumen_syarikat','ulasanAdmin','ulasanHodiv','ulasanHOD'));

    }

    public function listformB(){

      $listB = FormB::get();
      // dd($listB[0]->id);
      $attendance = FormB::with('formbs')->get();

      return view('user.integrityHOD.harta.senaraiformB', compact('listB'));

    }

    public function listformC(){

      $listC = FormC::get();
      $attendance = FormC::with('formcs')->get();

      return view('user.integrityHOD.harta.senaraiformC', compact('listC'));

    }

    public function listformD(){

      $listD = FormD::get();
      $attendance = FormD::with('formds')->get();

      return view('user.integrityHOD.harta.senaraiformD', compact('listD'));

    }

    public function listformG(){

      $listG = FormG::get();
      $attendance = FormG::with('formgs')->get();

      return view('user.integrityHOD.harta.senaraiformG', compact('listG'));

    }


     public function updateStatusUlasanHODB(Request $request,$id){

       $statusb = FormB::find($id);
       $statusb->status = $request->status;
       $statusb->save();

       $formbs = new UlasanHod();
       $formbs->nama_hod = $request->nama_hod;
       $formbs->no_hod = $request->no_hod;
       $formbs->ulasan_hod = $request->ulasan_hod;
       $formbs->formbs_id = $id;
       $formbs->save();



       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       if($request->status == 'Proses ke Ketua Bahagian'){

       $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Proses ke Ketua Bahagian (Harta)')->first(); //template email yang diguna
       // $email = null; // for testing
       $hodiv_available = User::where('role','=','3')->get(); //get system admin information
       // if ($email) {
         foreach ($hodiv_available as $data) {
           // $formcs->notify(new UserFormAdminC($data, $email));
           $this->dispatch(new SendNotificationFormBHod($data, $email, $formbs));

         }
       }
       elseif ($request->status == 'Diterima') {
         $email = Email::where('jenis', '=', 'Perisytiharan Harta Diterima')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusb->user_id)->first(); //get system admin information
         // dd($user);
         $this->dispatch(new SendNotificationFormBHod($user, $email, $formbs));
         SendNotificationFormBHod::dispatch($user, $email, $formbs)->delay(now()->addMinutes(1));

         // $this->dispatch(new SendNotificationFormBHod($user, $email, $formbs)));

      }
       else {
         $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusb->user_id)->first(); //get system admin information

         $this->dispatch(new SendNotificationFormBHod($user, $email, $formbs));

     }

       return redirect()->route('user.admin.harta.senaraiallharta');
     }


     public function updateStatusUlasanHODC(Request $request,$id){

       $statusc = FormC::find($id);
       $statusc->status = $request->status;
       $statusc->save();

       $formcs = new UlasanHod();
       $formcs->nama_hod = $request->nama_hod;
       $formcs->no_hod = $request->no_hod;
       $formcs->ulasan_hod = $request->ulasan_hod;
       $formcs->formcs_id = $id;
       $formcs->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       if($request->status == 'Proses ke Ketua Bahagian'){

       $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Proses ke Ketua Bahagian (Harta)')->first(); //template email yang diguna
       // $email = null; // for testing
       $hodiv_available = User::where('role','=','3')->get(); //get system admin information
       // if ($email) {
         foreach ($hodiv_available as $data) {
           // $formcs->notify(new UserFormAdminC($data, $email));
           $this->dispatch(new SendNotificationFormCHod($data, $email, $formcs));
         }
       }
       elseif ($request->status == 'Diterima') {
         $email = Email::where('jenis', '=', 'Perisytiharan Harta Diterima')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusc->user_id)->first(); //get system admin information

         $this->dispatch(new SendNotificationFormCHod($user,$email, $formcs));

      }
       else {
         $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusc->user_id)->first(); //get system admin information
         $this->dispatch(new SendNotificationFormCHod($user,$email, $formcs));

     }

       return redirect()->route('user.admin.harta.senaraiallharta');
     }

     public function updateStatusUlasanHODD(Request $request,$id){

       $statusd = FormD::find($id);
       $statusd->status = $request->status;
       $statusd->save();

       $formds = new UlasanHod();
       $formds->nama_hod = $request->nama_hod;
       $formds->no_hod = $request->no_hod;
       $formds->ulasan_hod = $request->ulasan_hod;
       $formds->formds_id = $id;
       $formds->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       if($request->status == 'Proses ke Ketua Bahagian'){

       $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Proses ke Ketua Bahagian (Harta)')->first(); //template email yang diguna
       // $email = null; // for testing
       $hodiv_available = User::where('role','=','3')->get(); //get system admin information
       // if ($email) {
         foreach ($hodiv_available as $data) {
           // $formcs->notify(new UserFormAdminC($data, $email));
           $this->dispatch(new SendNotificationFormDHod($data, $email, $formds));
         }
       }
       elseif ($request->status == 'Diterima') {
         $email = Email::where('jenis', '=', 'Perisytiharan Harta Diterima')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusd->user_id)->first(); //get system admin information
         $this->dispatch(new SendNotificationFormCHod($user, $email, $formds));

      }
       else {
         $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusd->user_id)->first(); //get system admin information
         $this->dispatch(new SendNotificationFormCHod($user, $email, $formds));

     }

       return redirect()->route('user.admin.harta.senaraiallharta');
     }

     public function updateStatusUlasanHODG(Request $request,$id){

       $statusg = FormG::find($id);
      $statusg->status = $request->status;
      $statusg->save();

      $formgs = new UlasanHod();
      $formgs->nama_hod = $request->nama_hod;
      $formgs->no_hod = $request->no_hod;
      $formgs->ulasan_hod = $request->ulasan_hod;
      $formgs->formgs_id = $id;
      $formgs->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       if($request->status == 'Proses ke Ketua Bahagian'){

       $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Proses ke Ketua Bahagian (Harta)')->first(); //template email yang diguna
       // $email = null; // for testing
       $hodiv_available = User::where('role','=','3')->get(); //get system admin information
       // if ($email) {
         foreach ($hodiv_available as $data) {
           // $formcs->notify(new UserFormAdminC($data, $email));
           $this->dispatch(new SendNotificationFormGHod($data, $email, $formgs));
         }
       }
       elseif ($request->status == 'Diterima') {
         $email = Email::where('jenis', '=', 'Perisytiharan Harta Diterima')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusg->user_id)->first(); //get system admin information

         $this->dispatch(new SendNotificationFormGHod($user, $email, $formgs));

      }
       elseif ($request->status == 'Tidak Diterima') {
         $email = Email::where('jenis', '=', 'Perisytiharan Tidak Lengkap (Harta)')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusg->user_id)->first(); //get system admin information

         $this->dispatch(new SendNotificationFormGHod($user, $email, $formgs));

     }

       return redirect()->route('user.admin.harta.senaraiallharta');
     }

     public function updateStatusUlasanHODGift(Request $request,$id){

       $statusgift = Gift::find($id);
       $statusgift->status = $request->status;
       $statusgift->save();

       $gift = new UlasanHod();
       $gift->nama_hod = $request->nama_hod;
       $gift->no_hod = $request->no_hod;
       $gift->ulasan_hod = $request->ulasan_hod;
       $gift->gift_id = $id;
       $gift->save();

       //send notification to admin (ulasan hodiv)
       if ($request->status == 'Diterima') {
           $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Diterima')->first(); //template email yang diguna
           // $email = null; // for testing
           $user = User::where('id', '=', $statusgift->user_id)->first(); //get system admin information

           $this->dispatch(new SendNotificationGiftHod($user, $email, $statusgift));

        }
         else {
           $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Gagal')->first(); //template email yang diguna
           // $email = null; // for testing
           $user = User::where('id', '=', $statusgift->user_id)->first(); //get system admin information

           $this->dispatch(new SendNotificationGiftHod($user, $email, $statusgift));

       }


       return redirect()->route('user.admin.hadiah.senaraiallhadiah');
     }

     public function updateStatusUlasanHODGiftB(Request $request,$id){

       $statusgiftb = GiftB::find($id);
       $statusgiftb->status = $request->status;
       $statusgiftb->save();

       $giftb = new UlasanHod();
       $giftb->nama_hod = $request->nama_hod;
       $giftb->no_hod = $request->no_hod;
       $giftb->ulasan_hod = $request->ulasan_hod;
       $giftb->giftb_id = $id;
       $giftb->save();

     if ($request->status == 'Diterima') {
         $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Diterima')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusgiftb->user_id)->first(); //get system admin information

         $this->dispatch(new SendNotificationGiftHod($user, $email, $statusgiftb));

      }
       else {
         $email = Email::where('jenis', '=', 'Perisytiharan Hadiah Gagal')->first(); //template email yang diguna
         // $email = null; // for testing
         $user = User::where('id', '=', $statusgiftb->user_id)->first(); //get system admin information

         $this->dispatch(new SendNotificationGiftHod($user, $email, $statusgiftb));

     }

       return redirect()->route('user.admin.hadiah.senaraiallhadiah');
     }

     public function senaraiTugasanHadiah(){
       $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->get();
       $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->get();
       $merged = $listallA->mergeRecursive($listallB)->sortBy('status');

       return view('user.integrityHOD.hadiah.senaraitugasanhadiah', compact('merged'));
     }
     public function senaraiTugasanHarta(){
       $listallB = FormB::with('users')->select('id','created_at','status', 'user_id')->get();
       $listallBTable = FormB::getTableName();
       $listallC = FormC::with('users')->select('id','created_at','status', 'user_id')->get();
       $listallD = FormD::with('users')->select('id','created_at','status', 'user_id')->get();
       $listallG = FormG::with('users')->select('id','created_at','status', 'user_id')->get();
       $merged = $listallB->mergeRecursive($listallC);
       $merged = $merged->mergeRecursive($listallD);
       $merged = $merged->mergeRecursive($listallG)->sortBy('status');

       return view('user.integrityHOD.harta.senaraitugasanharta', compact('merged'));
     }
}
