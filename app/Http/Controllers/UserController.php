<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Asset;
use App\User;
use App\Gift;
use App\GiftB;
use App\DividenB;
use App\DokumenSyarikat;
use App\PinjamanB;
use App\DividenG;
use App\PinjamanG;
use App\Pinjaman;
use App\FormB;
use App\FormC;
use App\FormD;
use App\FormG;
use App\HartaB;
use App\UlasanHod;
use App\UlasanHodiv;
use App\UlasanAdmin;
use App\Keluarga;
use App\NilaiHadiah;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use PDF;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function disclaimer(){
    return view('user.disclaimer');
  }
  public function security(){
    return view('user.security');
  }
  public function privacy(){
    return view('user.privacy');
  }
  public function index()
  {
      // $user = User::get();
      // $user = User::find(1);
      $nilai_hadiah = NilaiHadiah::first();
      $userid = Auth::user()->id;
      $listB = FormB::where('user_id', $userid)->where('status','!=','Disimpan ke Draf')->count();
      $listC = FormC::where('user_id', $userid)->where('status','!=','Disimpan ke Draf')->count();
      $listD = FormD::where('user_id', $userid)->where('status','!=','Disimpan ke Draf')->count();
      $listG = FormG::where('user_id', $userid)->where('status','!=','Disimpan ke Draf')->count();
      // dd($listHadiah);
      // dd($user);
      // dd($user[0]->name);
      // $full_name = preg_split("/\s+/", Auth::user()->name);
      // $short_name = $full_name[0]." ".$full_name[1];
      // dd($short_name);
      return view('user.view', compact('nilai_hadiah','listB','listC','listD','listG'));
  }

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

  public function addAsset(array $data)
  {
    return Asset::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
  }

  public function senaraiborang()
  {
    $userid = Auth::user()->id;
    $listallA = Asset::with('users')->select('id','created_at','status', 'user_id')->where('user_id', $userid)->get();
    $listallB = FormB::with('users')->select('id','created_at','status', 'user_id')->where('user_id', $userid)->get();
    $listallBTable = FormB::getTableName();
    $listallC = FormC::with('users')->select('id','created_at','status', 'user_id')->where('user_id', $userid)->get();
    $listallD = FormD::with('users')->select('id','created_at','status', 'user_id')->where('user_id', $userid)->get();
    $listallG = FormG::with('users')->select('id','created_at','status', 'user_id')->where('user_id', $userid)->get();
    $merged = $listallA->mergeRecursive($listallB);
    $merged = $merged->mergeRecursive($listallC);
    $merged = $merged->mergeRecursive($listallD);
    $merged = $merged->mergeRecursive($listallG)->sortBy('status');

    $status_form = FormB::where('user_id', auth()->user()->id)->latest()->first();
    // dd($status_form);
    return view('user.form', compact('merged','status_form'));
  }

  public function senaraiboranghadiah()
  {
    $nilai_hadiah = NilaiHadiah::first();
    $userid = Auth::user()->id;
    $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('user_id', $userid)->get();
    $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('user_id', $userid)->get();
    $merged = $listallA->mergeRecursive($listallB)->sortBy('status');
    return view('user.hadiah', compact('nilai_hadiah','merged'));
  }

  public function senaraisemuaharta()
  {
    $user= Auth::user()->id;
    // dd($user);
    $listallA = Asset::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user)->get();
    $listallB = FormB::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user)->get();
    $listallBTable = FormB::getTableName();
    $listallC = FormC::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user)->get();
    $listallD = FormD::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user)->get();
    $listallG = FormG::with('users')->select('id','created_at','status', 'user_id')->where('user_id',$user)->get();
    $merged = $listallA->mergeRecursive($listallB);
    $merged = $merged->mergeRecursive($listallC);
    $merged = $merged->mergeRecursive($listallD);
    $merged = $merged->mergeRecursive($listallG)->sortBy('status');

    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();

    return view('user.senaraiharta',compact('merged','ulasanAdmin','ulasanHOD'));
  }

  public function senaraisemuahadiah()
  {
    $nilai_hadiah = NilaiHadiah::first();
    $user= Auth::user()->id;

    $listallA = Gift::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('user_id',$user)->get();
    $listallB = GiftB::with('users')->select('id','jabatan','jenis_gift','nilai_gift','tarikh_diterima','nama_pemberi','alamat_pemberi','hubungan_pemberi','sebab_gift','gambar_gift','status', 'user_id')->where('user_id',$user)->get();
    $merged = $listallA->mergeRecursive($listallB)->sortBy('status');

    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();
    return view('user.senaraihadiah', compact('nilai_hadiah','merged','ulasanAdmin','ulasanHOD'));
  }

  public function senaraihadiahdashboard($id)
  {
    $username =Auth::user()->username;
    $bahagian=UserExistingStaffInfo::where('USERNAME', $username)->get();
    foreach($bahagian as $division){
      $div=$division->OLEVEL4NAME;
    }

    $role = auth()->user()->role;
    // dd($id);
    $nilai_hadiah = NilaiHadiah::first();
    if (auth()->user()->role == 2) {
      // dd('masuk hod');
      if ($id == "gift") {
        $listHadiah = Gift::where('status', 'Proses ke Ketua Jabatan Integriti')->orWhere('status', 'Diterima')->get();
        // dd($listHadiah);
      }
      else if($id == "giftb"){
        $listHadiah = GiftB::where('status', 'Proses ke Ketua Jabatan Integriti')->orWhere('status', 'Diterima')->get();
      }
    }
    else if(auth()->user()->role == 3){
      // dd('masuk hodiv');
      if ($id == "gift") {
        $listHadiah = Gift::where('status', 'Proses ke Ketua Bahagian')->where('bahagian', $div )->get();
        // dd($listHadiah);
      }
      else if($id == "giftb"){
        $listHadiah = GiftB::where('status', 'Proses ke Ketua Bahagian')->where('bahagian', $div )->get();
      }
    }
    else {
      // dd('masuk admin');
      if ($id == "gift") {
        $listHadiah = Gift::get();
        // dd($listHadiah);
      }
      else if($id == "giftb"){
        $listHadiah = GiftB::get();
      }
    }
    $jenisform = $id;
    return view('user.admin.hadiah.listGift', compact('listHadiah','nilai_hadiah','role','jenisform'));
  }

  public function senaraihartadashboard($id)
  {
    $jenisform = $id;
    // dd($jenisform);
    $username =Auth::user()->username;
    $bahagian=UserExistingStaffInfo::where('USERNAME', $username)->first();
    // dd($id);
    $role = auth()->user()->role;
    // dd($role);
    if (auth()->user()->role == 2) {
      // dd('masuk hod');
      if ($id == "formb") {
        $listHarta = FormB::where('status', 'Proses ke Ketua Jabatan Integriti')->orWhere('status', 'Diterima')->get();
      }
      else if($id == "formc"){
        $listHarta = FormC::where('status', 'Proses ke Ketua Jabatan Integriti')->orWhere('status', 'Diterima')->get();
      }
      else if($id == "formd"){
        $listHarta = FormD::where('status', 'Proses ke Ketua Jabatan Integriti')->orWhere('status', 'Diterima')->get();
      }
      else if($id == "formg"){
        $listHarta = FormG::where('status', 'Proses ke Ketua Jabatan Integriti')->orWhere('status', 'Diterima')->get();
      }
    }
    else if(auth()->user()->role == 3){

      // dd('masuk hodiv');
      if ($id == "formb") {
        $listHartas = FormB::where('status', 'Proses ke Ketua Bahagian')->get();

        $listHarta = [];
        foreach ($listHartas as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          // dd($dataBahagian);
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            // dd($dataBahagian);
            $listHarta[]=$data;
          }
        }
        // dd($listHadiah);
      }
      else if($id == "formc"){
        $listHartas = FormC::where('status', 'Proses ke Ketua Bahagian')->get();
        $listHarta = [];
        foreach ($listHartas as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          // dd($dataBahagian);
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            // dd($dataBahagian);
            $listHarta[]=$data;
          }
        }
      }
      else if($id == "formd"){
        $listHartas = FormD::where('status', 'Proses ke Ketua Bahagian')->get();
        $listHarta = [];
        foreach ($listHartas as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          // dd($dataBahagian);
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            // dd($dataBahagian);
            $listHarta[]=$data;
          }
        }
      }
      else if($id == "formg"){
        $listHartas = FormG::where('status', 'Proses ke Ketua Bahagian')->get();
        $listHarta = [];
        foreach ($listHartas as $data) {
          $dataBahagian=UserExistingStaffInfo::where('USERNAME', $data->users->username)->first();
          // dd($dataBahagian);
          if($dataBahagian->OLEVEL4NAME == $bahagian->OLEVEL4NAME){
            // dd($dataBahagian);
            $listHarta[]=$data;
          }
        }
      }
    }
    else {
      // dd('masuk admin');
      if ($id == "formb") {
        $listHarta = FormB::get();
      }
      else if($id == "formc"){
        $listHarta = FormC::get();
      }
      else if($id == "formd"){
        $listHarta = FormD::get();
      }
      else if($id == "formg"){
        $listHarta = FormG::get();
      }
    }


    return view('user.hartadashboard', compact('listHarta', 'role' ,'jenisform'));
  }


  public function senaraiHarta()
  {
    return view('user.harta.senaraiharta');
  }

  public function senaraiDraftHadiah()
  {
    $userid = Auth::user()->id;
    $listHadiah = Gift::where('user_id', $userid)->where('status','Disimpan ke Draf')->get();
    $listHadiahB = GiftB::where('user_id', $userid)->where('status','Disimpan ke Draf')->get();
    $merged = $listHadiah->mergeRecursive($listHadiahB);
    $nilaiHadiah = NilaiHadiah::first();

    return view('user.hadiah.senaraidraft', compact('merged','nilaiHadiah'));
  }

  public function senaraiHadiah()
  {
    $userid = Auth::user()->id;
    $listHadiah = Gift::where('user_id', $userid)->get();
    $nilaiHadiah = NilaiHadiah::first();
    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();

    return view('user.hadiah.senaraihadiah', compact('listHadiah','nilaiHadiah','ulasanAdmin','ulasanHOD'));
  }

  public function senaraiHadiahB()
  {
    $userid = Auth::user()->id;
    $listHadiahB = GiftB::where('user_id', $userid)->get();
    $nilaiHadiah = NilaiHadiah::first();
    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();
    // $listHadiah = GiftB::get();
    return view('user.hadiah.senaraihadiahB', compact('listHadiahB','nilaiHadiah','ulasanAdmin','ulasanHOD'));
  }


  public function senaraiHartaB()
  {
    $userid = Auth::user()->id;
    $listHarta = FormB::where('user_id', $userid)->get();

    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();


    return view('user.harta.FormB.senaraihartaB', compact('listHarta','ulasanAdmin','ulasanHOD'));
  }

  public function senaraiDraftHarta()
  {
    $userid = Auth::user()->id;
    $listDrafB= FormB::where('user_id', $userid)->where('status','Disimpan ke Draf')->get();
    $listDrafC= FormC::where('user_id', $userid)->where('status','Disimpan ke Draf')->get();
    $listDrafD= FormD::where('user_id', $userid)->where('status','Disimpan ke Draf')->get();
    $listDrafG= FormG::where('user_id', $userid)->where('status','Disimpan ke Draf')->get();
    $merged = $listDrafB->mergeRecursive($listDrafC);
    $merged = $merged->mergeRecursive($listDrafD);
    $merged = $merged->mergeRecursive($listDrafG)->sortBy('status');
    // dd($listDrafB);

    return view('user.harta.senaraidraft', compact('merged'));
  }

  public function deleteDrafHarta(Request $request,$id)
  {
       if($request->form == "formbs"){
        $formB = FormB::findOrFail($id);
        $formB->delete(); //delete form

        // if ($formB->trashed()) { //cek if form deleted or not
        //     dd('test');
        // }
      }
      else if($request->form == "formcs"){
       $formC = FormC::findOrFail($id);
       $formC->delete(); //delete form

       // if ($formB->trashed()) { //cek if form deleted or not
       //     dd('test');
       // }
     }
     else if($request->form == "formds"){
      $formD = FormD::findOrFail($id);
      $formD->delete(); //delete form

      // if ($formB->trashed()) { //cek if form deleted or not
      //     dd('test');
      // }
    }
    else if($request->form == "formgs"){
     $formG = FormG::findOrFail($id);
     $formG->delete(); //delete form

     // if ($formB->trashed()) { //cek if form deleted or not
     //     dd('test');
     // }
   }

    return redirect()->back();
  }

  public function deleteDrafHadiah(Request $request,$id)
  {
       if($request->form == "gifts"){
        $gifts = Gift::findOrFail($id);
        $gifts->delete(); //delete form

        // if ($formB->trashed()) { //cek if form deleted or not
        //     dd('test');
        // }
      }
      else if($request->form == "giftbs"){
       $giftbs = GiftB::findOrFail($id);
       $giftbs->delete(); //delete form

       // if ($formB->trashed()) { //cek if form deleted or not
       //     dd('test');
       // }
     }

    return redirect()->back();
  }

  public function printA($id)
    {
       //dd($id);
      $listHarta = Asset::findOrFail($id);
       // dd($listHarta);

      return view('user.perakuanharta.print', compact('listHarta'));
    }

  public function viewA($id)
  {
     //dd($id);
    $listHarta = Asset::findOrFail($id);
     // dd($listHarta);

    return view('user.perakuanharta.viewformA', compact('listHarta'));
  }

  public function createPDFA($id) {

      $listHarta = Asset::findOrFail($id);
      // dd($listHarta);
      $pdf = PDF::loadView('user.perakuanharta.print', compact('listHarta'));
      // download PDF file with download method
      return $pdf->download('Lampiran_A.pdf');
    }

  public function createPDF($id) {
      // retreive all records from db
      $listHarta = FormB::findOrFail($id);
       // dd($listHarta);
      $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

      $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();

      $hartaB =HartaB::where('formbs_id',$listHarta->id) ->get();


      $user = UserExistingStaffInfo::where('STAFFNO', $listHarta->no_staff) ->get('STAFFNO');
      foreach ($user as $keluarga) {

          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }

      if($maklumat_pasangan->isEmpty()){
          $pdf = PDF::loadView('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB','hartaB'));

          return $pdf->download('Lampiran_B.pdf');
      }
      elseif ($maklumat_anak->isEmpty()) {
          $pdf = PDF::loadView('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan'));
          return $pdf->download('Lampiran_B.pdf');
      }
      else{
        $pdf = PDF::loadView('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_anak','maklumat_pasangan'));
        return $pdf->download('Lampiran_B.pdf');
      }
      // // view()->share('employee',$data);
      // $pdf = PDF::loadView('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB'));
      // // download PDF file with download method
      // return $pdf->download('Lampiran_B.pdf');
    }

    public function printB($id)
    {
       //dd($id);
      $listHarta = FormB::findOrFail($id);
       // dd($listHarta);
      $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

      $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();

      $hartaB =HartaB::where('formbs_id',$listHarta->id) ->get();


      $user = UserExistingStaffInfo::where('STAFFNO', $listHarta->no_staff) ->get('STAFFNO');
      foreach ($user as $keluarga) {

          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
          $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }

      if($maklumat_pasangan->isEmpty()){
        return view('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB','hartaB'));
      }
      elseif ($maklumat_anak->isEmpty()) {
        return view('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan'));
      }
      else{
      return view('user.harta.FormB.print', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_anak','maklumat_pasangan'));
      }
  }

  public function ulasanlampiranB($id)
{
   //dd($id);
  $ulasanAdmin = UlasanAdmin::where('formbs_id',$id)->get();
  $ulasanHod = UlasanHod::where('formbs_id',$id)->get();
  $ulasanHodiv = UlasanHodiv::where('formbs_id',$id)->get();
   // dd($listHarta);
  return view('user.harta.FormB.ulasanpage', compact('ulasanAdmin','ulasanHod','ulasanHodiv'));

}
public function ulasanlampiranC($id)
{
 //dd($id);
$ulasanAdmin = UlasanAdmin::where('formcs_id',$id)->get();
$ulasanHod = UlasanHod::where('formcs_id',$id)->get();
$ulasanHodiv = UlasanHodiv::where('formcs_id',$id)->get();
 // dd($listHarta);
return view('user.harta.FormC.ulasanpage', compact('ulasanAdmin','ulasanHod','ulasanHodiv'));

}
public function ulasanlampiranD($id)
{
 //dd($id);
$ulasanAdmin = UlasanAdmin::where('formds_id',$id)->get();
$ulasanHod = UlasanHod::where('formds_id',$id)->get();
$ulasanHodiv = UlasanHodiv::where('formds_id',$id)->get();
 // dd($listHarta);
return view('user.harta.FormD.ulasanpage', compact('ulasanAdmin','ulasanHod','ulasanHodiv'));

}
public function ulasanlampiranG($id)
{
 //dd($id);
$ulasanAdmin = UlasanAdmin::where('formgs_id',$id)->get();
$ulasanHod = UlasanHod::where('formgs_id',$id)->get();
$ulasanHodiv = UlasanHodiv::where('formgs_id',$id)->get();
 // dd($listHarta);
return view('user.harta.FormD.ulasanpage', compact('ulasanAdmin','ulasanHod','ulasanHodiv'));

}

public function ulasanlampiranGift($id)
{
 //dd($id);
$ulasanAdmin = UlasanAdmin::where('gift_id',$id)->get();
$ulasanHod = UlasanHod::where('gift_id',$id)->get();
$ulasanHodiv = UlasanHodiv::where('gift_id',$id)->get();
$nilaiHadiah = NilaiHadiah::first();
 // dd($listHarta);
return view('user.hadiah.ulasanpageGift', compact('ulasanAdmin','ulasanHod','ulasanHodiv','nilaiHadiah'));

}


public function ulasanlampiranGiftB($id)
{
 //dd($id);
$ulasanAdmin = UlasanAdmin::where('giftb_id',$id)->get();
$ulasanHod = UlasanHod::where('giftb_id',$id)->get();
$ulasanHodiv = UlasanHodiv::where('giftb_id',$id)->get();
$nilaiHadiah = NilaiHadiah::first();
 // dd($listHarta);
return view('user.hadiah.ulasanpageGiftB', compact('ulasanAdmin','ulasanHod','ulasanHodiv','nilaiHadiah'));

}


    public function viewB($id)
  {
     //dd($id);
    $listHarta = FormB::findOrFail($id);
     // dd($listHarta);
    $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

    $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();

    $hartaB =HartaB::where('formbs_id',$listHarta->id) ->get();


    $user = UserExistingStaffInfo::where('STAFFNO', $listHarta->no_staff) ->get('STAFFNO');
    // dd($user);

    foreach ($user as $keluarga) {

        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }

    if($maklumat_pasangan->isEmpty()){
      $maklumat_pasangan = null;
      // dd('test');
      // return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan'));
    }

    if ($maklumat_anak->isEmpty()) {
      $maklumat_anak = null;
      // return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan'));
    }
    return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_anak','maklumat_pasangan'));

}

  public function senaraiHartaC()
  {
    $userid = Auth::user()->id;
    $listHarta = FormC::where('user_id', $userid)->get();
    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();



    return view('user.harta.FormC.senaraihartaC', compact('listHarta','ulasanAdmin','ulasanHOD'));
  }

  public function viewC($id)
  {
     //dd($id);
    $listHarta = FormC::findOrFail($id);
    $hartaB =HartaB::where('formcs_id',$listHarta->id)->get();

      return view('user.harta.FormC.viewformC', compact('listHarta','hartaB'));
  }

  public function printC($id)
  {

    $listHarta = FormC::findOrFail($id);
    $hartaB =HartaB::where('formcs_id',$listHarta->id)->get();

      return view('user.harta.FormC.print', compact('listHarta','hartaB'));
  }

  public function createPDFC($id) {

      $listHarta = FormC::findOrFail($id);
      $hartaB =HartaB::where('formcs_id',$listHarta->id)->get();
      $pdf = PDF::loadView('user.harta.FormC.print', compact('listHarta','hartaB'));

      return $pdf->download('Lampiran_C.pdf');
    }

  public function senaraiHartaD()
  {
    $userid = Auth::user()->id;
    $listHarta = FormD::where('user_id', $userid)->get();
    $ulasanAdmin = UlasanAdmin::get();
    $ulasanHOD = UlasanHod::get();


    return view('user.harta.FormD.senaraihartaD', compact('listHarta','ulasanAdmin','ulasanHOD'));
  }

  public function viewD($id)
  {
     //dd($id);
    $listHarta = FormD::findOrFail($id);
    $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();
    $dokumen_syarikat = DokumenSyarikat::where('formds_id', $listHarta->id) ->get();
    // dd($dokumen_syarikat);
    //data ic user
    // $username =strtoupper(Auth::user()->name);
    // $ic = UserExistingStaffNextofKin::where('NOKNAME',$username) ->get();
    //data testing
    // $ic = UserExistingStaffNextofKin::where('NOKNAME','ADZNAN  ABDUL KARIM') ->get();

      return view('user.harta.FormD.viewformD', compact('listHarta','listKeluarga','dokumen_syarikat'));
  }

  public function printD($id)
  {
     //dd($id);
    $listHarta = FormD::findOrFail($id);
    $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();

      return view('user.harta.FormD.print', compact('listHarta','listKeluarga'));
  }

  public function createPDFD($id) {

      $listHarta = FormD::findOrFail($id);
      $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();

      $pdf = PDF::loadView('user.harta.FormD.print', compact('listHarta','listKeluarga'));
      // download PDF file with download method
      return $pdf->download('Lampiran_D.pdf');
    }

  public function senaraiHartaG()
  {
    $userid = Auth::user()->id;
    $listHarta = FormG::where('user_id', $userid)->get();

      $ulasanAdmin = UlasanAdmin::get();
      $ulasanHOD = UlasanHod::get();



  // dd($ulasanHOD);
  // dd($ulasanAdmin);

    return view('user.harta.FormG.senaraihartaG', compact('listHarta','ulasanAdmin','ulasanHOD'));
  }

  public function viewG($id)
  {
     //dd($id);
    $listHarta = FormG::findOrFail($id);
    // dd($listHarta);
    $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
    $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
    $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();
    $user = UserExistingStaffInfo::where('STAFFNO', $listHarta->no_staff) ->get('STAFFNO');
    // dd($user);

    foreach ($user as $keluarga) {
        $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
        $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
        $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
        }

    // if($maklumat_pasangan->isEmpty()){
    //   return view('user.harta.FormG.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
    // }
    // elseif ($maklumat_anak->isEmpty()) {
    //   return view('user.harta.FormG.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan'));
    // }
    // else{
      return view('user.harta.FormG.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan','maklumat_anak'));
    // }
}

  public function printG($id)
  {
     //dd($id);
    $listHarta = FormG::findOrFail($id);
    $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
    $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
    $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();

      return view('user.harta.FormG.print', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
  }

  public function createPDFG($id) {

      $listHarta = FormG::findOrFail($id);
      $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
      $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
      $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();

      $pdf = PDF::loadView('user.harta.FormG.print', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
      // download PDF file with download method
      return $pdf->download('Lampiran_G.pdf');
    }

    public function createPDFGift($id) {
        // retreive all records from db
        $info = Gift::find($id);

        $nilaiHadiah = NilaiHadiah::first();

        // share data to view
        // view()->share('employee',$data);
        $pdf = PDF::loadView('user.hadiah.print', compact('info','nilaiHadiah'));
        // download PDF file with download method
        return $pdf->download('Lampiran_Hadiah_A.pdf');
      }

      public function printGift($id)
      {
        $userid = Gift::findOrFail($id);
         // dd($listHarta);
        $info = Gift::where('user_id', $userid)->get();
        $nilaiHadiah = NilaiHadiah::first();

        return view('user.hadiah.print', compact('info','nilaiHadiah'));
      }

      public function createPDFGiftB($id) {
          // retreive all records from db
          $info = GiftB::find($id);

          $nilaiHadiah = NilaiHadiah::first();

          // share data to view
          // view()->share('employee',$data);
          $pdf = PDF::loadView('user.hadiah.printB', compact('info','nilaiHadiah'));
          // download PDF file with download method
          return $pdf->download('Lampiran_Hadiah_B.pdf');
        }

        public function printGiftB($id)
        {
          $userid = GiftB::findOrFail($id);
           // dd($listHarta);
          $info = GiftB::where('user_id', $userid)->get();
          $nilaiHadiah = NilaiHadiah::first();

          return view('user.hadiah.printB', compact('info','nilaiHadiah'));
        }



}
