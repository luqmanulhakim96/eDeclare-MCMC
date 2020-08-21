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
use Auth;

class AdminController extends Controller
{
    //
    public function adminDashboard(){

      return view('user.admin.view');
    }

    public function systemConfig(){
      $listHadiah = NilaiHadiah::first();
      // dd($listHadiah);

      return view('user.admin.systemconfig', compact('listHadiah'));
  }

  public function updateNilaiHadiah(Request $request,$id){
    $gifts=NilaiHadiah::find($id);
    // dd($request->all());
    $gifts->nilai_hadiah = $request->nilai_hadiah;
    $gifts->save();

    return redirect()->route('user.admin.systemconfig');
  }

  public function notification(){

    return view('user.admin.notification');
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

    $listHadiah = Gift::get();
    $attendance = Gift::with('gifts')->get();

    return view('user.admin.hadiah.listGift', compact('listHadiah'));

  }
  //senarai hadiah bawah rm100
  public function listGiftB(){
    $listHadiah = GiftB::get();
    $attendance = GiftB::with('giftbs')->get();

    return view('user.admin.hadiah.listGiftB', compact('listHadiah'));

  }

  public function listDiterima(){

    $listHadiah = Gift::get();
    $attendance = Gift::with('gifts')->get();

    return view('user.admin.hadiah.HadiahA.listDiterima', compact('listHadiah'));

  }

  public function listTidakDiterima(){

    $listHadiah = Gift::get();
    $attendance = Gift::with('gifts')->get();

    return view('user.admin.hadiah.HadiahA.listTidakDiterima', compact('listHadiah'));

  }

  public function listTidakLengkap(){

    $listHadiah = Gift::get();
    $attendance = Gift::with('gifts')->get();

    return view('user.admin.hadiah.HadiahA.listTidakLengkap', compact('listHadiah'));

  }

  public function listDiterimaB(){

    $listHadiah = GiftB::get();
    $attendance = GiftB::with('giftbs')->get();

    return view('user.admin.hadiah.HadiahB.listDiterima', compact('listHadiah'));

  }

  public function listTidakDiterimaB(){

    $listHadiah = GiftB::get();
    $attendance = GiftB::with('giftbs')->get();

    return view('user.admin.hadiah.HadiahB.listTidakDiterima', compact('listHadiah'));

  }

  public function listTidakLengkapB(){

    $listHadiah = GiftB::get();
    $attendance = GiftB::with('giftbs')->get();

    return view('user.admin.hadiah.HadiahB.listTidakLengkap', compact('listHadiah'));

  }

  public function diprosesHODIV(){

    $listHadiah = Gift::get();
    $attendance = Gift::with('gifts')->get();

    return view('user.admin.hadiah.HadiahA.diprosesHODIV', compact('listHadiah'));

  }

  public function viewUlasanHadiahB($id)
  {
     //dd($id);
    $listHadiah = GiftB::findOrFail($id);
    $attendance = GiftB::with('giftbs')->get();

    return view('user.admin.hadiah.ulasanHadiahB', compact('listHadiah'));
  }

  public function viewUlasanHadiah($id)
  {
     //dd($id);
    $listHadiah = Gift::findOrFail($id);
    $attendance = Gift::with('gifts')->get();

    return view('user.admin.hadiah.ulasanHadiah', compact('listHadiah'));
  }

  public function viewUlasanHartaG($id)
  {
     //dd($id);
    $listHarta = FormG::findOrFail($id);
    $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
    $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
    $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();

    return view('user.admin.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
  }

  public function viewUlasanHartaB($id)
  {
     //dd($id);
    $listHarta = FormB::findOrFail($id);
    $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

    $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();


    return view('user.admin.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB'));
  }

  public function viewUlasanHartaC($id)
  {
     //dd($id);
    $listHarta = FormC::findOrFail($id);
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.ulasanHartaC', compact('listHarta'));
  }

  public function viewUlasanHartaD($id)
  {
     //dd($id);
    $listHarta = FormD::findOrFail($id);
    $attendance = FormD::with('formds')->get();
    $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();

    return view('user.admin.harta.ulasanHartaD', compact('listHarta','listKeluarga'));
  }

  public function listformB(){

    $listB = FormB::get();
    // dd($listB[0]->id);
    $attendance = FormB::with('formbs')->get();

    return view('user.admin.harta.senaraiformB', compact('listB'));

  }

  public function listformC(){

    $listC = FormC::get();
    $attendance = FormC::with('formcs')->get();

    return view('user.admin.harta.senaraiformC', compact('listC'));

  }

  public function listformD(){

    $listD = FormD::get();
    $attendance = FormD::with('formds')->get();

    return view('user.admin.harta.senaraiformD', compact('listD'));

  }

  public function listformG(){

    $listG = FormG::get();
    $attendance = FormG::with('formgs')->get();

    return view('user.admin.harta.senaraiformG', compact('listG'));

  }


   public function updateStatusUlasanAdminB(Request $request,$id){

     $formbs = FormB::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();

     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.senaraiformB');
   }

   public function updateStatusUlasanAdminC(Request $request,$id){

     $formbs = FormC::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();
     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.senaraiformC');
   }

   public function updateStatusUlasanAdminD(Request $request,$id){

     $formbs = FormD::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();
     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.senaraiformD');
   }

   public function updateStatusUlasanAdminG(Request $request,$id){

     $formbs = FormG::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();
     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.senaraiformG');
   }

   public function updateStatusUlasanAdminGift(Request $request,$id){

     $gifts = Gift::find($id);
     $gifts->status = $request->status;
     $gifts->ulasan_admin = $request->ulasan_admin;
     $gifts->save();

     //send notification to users (status="Diterima" && status="Tidak Diterima" && status="Tidak Lengkap")

     return redirect()->route('user.admin.hadiah.listGift');
   }

   public function updateStatusUlasanAdminGiftB(Request $request,$id){

     $giftbs = GiftB::find($id);
     $giftbs->status = $request->status;
     $giftbs->ulasan_admin = $request->ulasan_admin;
     $giftbs->save();

     //send notification to users (status="Diterima" && status="Tidak Diterima" && status="Tidak Lengkap")

     return redirect()->route('user.admin.hadiah.listGiftB');
   }



}
