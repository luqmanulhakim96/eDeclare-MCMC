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

class HodivController extends Controller
{
    //
  public function hodivDashboard(){
    $listB = FormB::where('status','Sedang Diproses')->get();
    $attendance = FormB::with('formbs')->get();
    $listHadiah = Gift::where('status','Diproses ke Pentadbir Sistem')->get();
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

    return view('user.hodiv.view', compact('nilaiHadiah','listB','listHadiah','list','listC','listD','listG','listHadiahA','listHadiahB','listBDiterima','listCDiterima','listDDiterima','listGDiterima'));
  }

  public function listAsset(){

    return view('user.hodiv.listAsset');
  }

  public function senaraihadiah()
  {
    $nilai_hadiah = NilaiHadiah::first();
    return view('user.hodiv.hadiah.senaraihadiah', compact('nilai_hadiah'));
  }

  public function senaraiharta()
  {
    return view('user.hodiv.harta.senaraiharta');
  }

  public function listGift(){

    $listHadiah = Gift::where('status','Sedang Diproses')->get();
    $attendance = Gift::with('gifts')->get();
    // dd($listHadiah);
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.listGift', compact('listHadiah','nilai_hadiah'));
  }

  public function listDiterima(){

    $listHadiah = Gift::where('status','Diterima')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.HadiahA.listDiterima', compact('listHadiah','nilai_hadiah'));

  }

  public function listTidakDiterima(){

    $listHadiah = Gift::where('status','Tidak Diterima')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.HadiahA.listTidakDiterima', compact('listHadiah','nilai_hadiah'));

  }

  public function listTidakLengkap(){

    $listHadiah = Gift::where('status','Tidak Lengkap')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.HadiahA.listTidakLengkap', compact('listHadiah','nilai_hadiah'));

  }

  public function diprosesHODIV(){

    $listHadiah = Gift::where('status','Diproses ke Ketua Jabatan Integriti')->get();
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.HadiahA.diprosesHODIV', compact('listHadiah','nilai_hadiah'));

  }
  //senarai hadiah bawah rm100
  public function listGiftB(){
    $listHadiah = GiftB::get();
    $attendance = GiftB::with('giftbs')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.listGiftB', compact('listHadiah','nilai_hadiah'));

  }

  public function viewUlasanHadiahB($id)
  {
     //dd($id);
    $listHadiah = GiftB::findOrFail($id);
    $attendance = GiftB::with('giftbs')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.ulasanHadiahB', compact('listHadiah','nilai_hadiah'));
  }

  public function viewUlasanHadiah($id)
  {
     //dd($id);
    $listHadiah = Gift::findOrFail($id);
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.hodiv.hadiah.ulasanHadiah', compact('listHadiah','nilai_hadiah'));
  }

  public function viewUlasanHartaG($id)
  {
     //dd($id);
    $listHarta = FormG::findOrFail($id);
    $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
    $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
    $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();

    return view('user.hodiv.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
  }

  public function viewUlasanHartaB($id)
  {
     //dd($id);
    $listHarta = FormB::findOrFail($id);
    $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

    $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();


    return view('user.hodiv.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB'));
  }

  public function viewUlasanHartaC($id)
  {
     //dd($id);
    $listHarta = FormC::findOrFail($id);
    $attendance = FormC::with('formcs')->get();

    return view('user.hodiv.harta.ulasanHartaC', compact('listHarta'));
  }

  public function viewUlasanHartaD($id)
  {
     //dd($id);
    $listHarta = FormD::findOrFail($id);
    $attendance = FormD::with('formds')->get();
    $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();

    return view('user.hodiv.harta.ulasanHartaD', compact('listHarta','listKeluarga'));
  }

  public function listformB(){

    $listB = FormB::get();
    // dd($listB[0]->id);
    $attendance = FormB::with('formbs')->get();

    return view('user.hodiv.harta.senaraiformB', compact('listB'));

  }

  public function listformC(){

    $listC = FormC::get();
    $attendance = FormC::with('formcs')->get();

    return view('user.hodiv.harta.senaraiformC', compact('listC'));

  }

  public function listformD(){

    $listD = FormD::get();
    $attendance = FormD::with('formds')->get();

    return view('user.hodiv.harta.senaraiformD', compact('listD'));

  }

  public function listformG(){

    $listG = FormG::get();
    $attendance = FormG::with('formgs')->get();

    return view('user.hodiv.harta.senaraiformG', compact('listG'));

  }


   public function updateStatusUlasanHODivB(Request $request,$id){

     $formbs = FormB::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_hodiv = $request->ulasan_hodiv;
     $formbs->save();

     //send notification to hod (kalau diterima(status="Proses ke Ketua Jabatan Integriti"))

     return redirect()->route('user.hodiv.harta.senaraiformB');
   }

   public function updateStatusUlasanHODivC(Request $request,$id){

     $formbs = FormC::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_hodiv = $request->ulasan_hodiv;
     $formbs->save();

     //send notification to hod (kalau diterima(status="Proses ke Ketua Jabatan Integriti"))

     return redirect()->route('user.hodiv.harta.senaraiformC');
   }

   public function updateStatusUlasanHODivD(Request $request,$id){

     $formbs = FormD::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_hodiv = $request->ulasan_hodiv;
     $formbs->save();

     //send notification to hod (kalau diterima(status="Proses ke Ketua Jabatan Integriti"))

     return redirect()->route('user.hodiv.harta.senaraiformD');
   }

   public function updateStatusUlasanHODivG(Request $request,$id){

     $formbs = FormG::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_hodiv = $request->ulasan_hodiv;
     $formbs->save();

     //send notification to hod (kalau diterima(status="Proses ke Ketua Jabatan Integriti"))

     return redirect()->route('user.hodiv.harta.senaraiformG');
   }

   public function updateStatusUlasanHODivGift(Request $request,$id){

     $gifts = Gift::find($id);
     $gifts->status = $request->status;
     $gifts->ulasan_hodiv = $request->ulasan_hodiv;
     $gifts->save();

     //send notification to hod (ulasan hodiv)

     return redirect()->route('user.hodiv.hadiah.listGift');
   }

   public function updateStatusUlasanHODivGiftB(Request $request,$id){

     $giftbs = GiftB::find($id);
     $giftbs->status = $request->status;
     $giftbs->ulasan_hodiv = $request->ulasan_hodiv;
     $giftbs->save();

     return redirect()->route('user.hodiv.hadiah.listGiftB');
   }
}
