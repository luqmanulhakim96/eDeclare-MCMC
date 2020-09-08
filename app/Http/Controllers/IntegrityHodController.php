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

class IntegrityHodController extends Controller
{
    //
    public function integrityDashboard(){
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

      return view('user.integrityHOD.view', compact('nilaiHadiah','listB','listHadiah','list','listC','listD','listG','listHadiahA','listHadiahB','listBDiterima','listCDiterima','listDDiterima','listGDiterima'));
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
       //dd($id);
      $listHadiah = GiftB::findOrFail($id);
      $attendance = GiftB::with('giftbs')->get();

      return view('user.integrityHOD.hadiah.ulasanHadiahB', compact('listHadiah','nilai_hadiah'));
    }

    public function viewUlasanHadiah($id)
    {
       //dd($id);
      $listHadiah = Gift::findOrFail($id);
      $attendance = Gift::with('gifts')->get();
      $nilai_hadiah = NilaiHadiah::first();

      return view('user.integrityHOD.hadiah.ulasanHadiah', compact('listHadiah','nilai_hadiah'));
    }

    public function viewUlasanHartaG($id)
    {
       //dd($id);
      $listHarta = FormG::findOrFail($id);
      $listDividenG = DividenG::where('formgs_id', $listHarta->id) ->get();
      $listPinjamanG = PinjamanG::where('formgs_id', $listHarta->id) ->get();
      $listPinjaman = Pinjaman::where('formgs_id', $listHarta->id) ->get();

      return view('user.integrityHOD.harta.ulasanHartaG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
    }

    public function viewUlasanHartaB($id)
    {
       //dd($id);
      $listHarta = FormB::findOrFail($id);
      $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

      $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();


      return view('user.integrityHOD.harta.ulasanHartaB', compact('listHarta','listDividenB','listPinjamanB'));
    }

    public function viewUlasanHartaC($id)
    {
       //dd($id);
      $listHarta = FormC::findOrFail($id);
      $attendance = FormC::with('formcs')->get();

      return view('user.integrityHOD.harta.ulasanHartaC', compact('listHarta'));
    }

    public function viewUlasanHartaD($id)
    {
       //dd($id);
      $listHarta = FormD::findOrFail($id);
      $attendance = FormD::with('formds')->get();
      $listKeluarga = Keluarga::where('formds_id', $listHarta->id) ->get();

      return view('user.integrityHOD.harta.ulasanHartaD', compact('listHarta','listKeluarga'));
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

       $formbs = FormB::find($id);
       $formbs->status = $request->status;
       $formbs->ulasan_hod = $request->ulasan_hod;
       $formbs->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       return redirect()->route('user.integrityHOD.harta.senaraiformB');
     }


     public function updateStatusUlasanHODC(Request $request,$id){

       $formbs = FormC::find($id);
       $formbs->status = $request->status;
       $formbs->ulasan_hod = $request->ulasan_hod;
       $formbs->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       return redirect()->route('user.integrityHOD.harta.senaraiformC');
     }

     public function updateStatusUlasanHODD(Request $request,$id){

       $formbs = FormD::find($id);
       $formbs->status = $request->status;
       $formbs->ulasan_hod = $request->ulasan_hod;
       $formbs->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       return redirect()->route('user.integrityHOD.harta.senaraiformD');
     }

     public function updateStatusUlasanHODG(Request $request,$id){

       $formbs = FormG::find($id);
       $formbs->status = $request->status;
       $formbs->ulasan_hod = $request->ulasan_hod;
       $formbs->save();

       //send notification to hodiv (kalau ada keraguan(status="Diproses ke Ketua Bahagian"))
       //send notification to users (status="Diterima" && status="Tidak Diterima")

       return redirect()->route('user.integrityHOD.harta.senaraiformG');
     }

     public function updateStatusUlasanHODGift(Request $request,$id){

       $gifts = Gift::find($id);
       $gifts->status = $request->status;
       $gifts->ulasan_hod = $request->ulasan_hod;
       $gifts->save();

       //send notification to admin (ulasan hodiv)

       return redirect()->route('user.integrityHOD.hadiah.listGift');
     }

     public function updateStatusUlasanHODGiftB(Request $request,$id){

       $giftbs = GiftB::find($id);
       $giftbs->status = $request->status;
       $giftbs->ulasan_hod = $request->ulasan_hod;
       $giftbs->save();

       return redirect()->route('user.integrityHOD.hadiah.listGiftB');
     }
}
