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
use Auth;

class AdminController extends Controller
{
    //
    public function adminDashboard(){
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

      return view('user.admin.view', compact('nilaiHadiah','listB','listHadiah','list','listC','listD','listG','listHadiahA','listHadiahB','listBDiterima','listCDiterima','listDDiterima','listGDiterima'));
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
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.ulasanHadiahB', compact('listHadiah','nilai_hadiah'));
  }

  public function viewUlasanHadiah($id)
  {
     //dd($id);
    $listHadiah = Gift::findOrFail($id);
    $attendance = Gift::with('gifts')->get();
    $nilai_hadiah = NilaiHadiah::first();

    return view('user.admin.hadiah.ulasanHadiah', compact('listHadiah','nilai_hadiah'));
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

     $formbs = FormB::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();

     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.listB.senaraiformB');
   }

   public function updateStatusUlasanAdminC(Request $request,$id){

     $formbs = FormC::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();
     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.listC.senaraiformC');
   }

   public function updateStatusUlasanAdminD(Request $request,$id){

     $formbs = FormD::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();
     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.listD.senaraiformD');
   }

   public function updateStatusUlasanAdminG(Request $request,$id){

     $formbs = FormG::find($id);
     $formbs->status = $request->status;
     $formbs->ulasan_admin = $request->ulasan_admin;
     $formbs->save();
     //send notification to HOD (noti ulasan admin dah check)

     return redirect()->route('user.admin.harta.listG.senaraiformG');
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

}
