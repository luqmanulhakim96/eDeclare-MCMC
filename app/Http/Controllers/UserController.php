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
  public function index()
  {
      // $user = User::get();
      // $user = User::find(1);
      $nilai_hadiah = NilaiHadiah::first();
      $userid = Auth::user()->id;
      $listB = FormB::where('user_id', $userid)->count();
      $listC = FormC::where('user_id', $userid)->count();
      $listD = FormD::where('user_id', $userid)->count();
      $listG = FormG::where('user_id', $userid)->count();
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
    return view('user.form');
  }

  public function senaraiboranghadiah()
  {
    $nilai_hadiah = NilaiHadiah::first();
    return view('user.hadiah', compact('nilai_hadiah'));
  }

  public function senaraisemuaharta()
  {
    return view('user.senaraiharta');
  }

  public function senaraisemuahadiah()
  {
    $nilai_hadiah = NilaiHadiah::first();
    return view('user.senaraihadiah', compact('nilai_hadiah'));
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

    return view('user.hadiah.senaraihadiah', compact('listHadiah','nilaiHadiah'));
  }

  public function senaraiHadiahB()
  {
    $userid = Auth::user()->id;
    $listHadiahB = GiftB::where('user_id', $userid)->get();
    $nilaiHadiah = NilaiHadiah::first();
    // $listHadiah = GiftB::get();
    return view('user.hadiah.senaraihadiahB', compact('listHadiahB','nilaiHadiah'));
  }


  public function senaraiHartaB()
  {
    $userid = Auth::user()->id;
    $listHarta = FormB::where('user_id', $userid)->get();

    return view('user.harta.FormB.senaraihartaB', compact('listHarta'));
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
      return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','hartaB'));
    }
    elseif ($maklumat_anak->isEmpty()) {
      return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_pasangan'));
    }
    else{
    return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','hartaB','maklumat_anak','maklumat_pasangan'));
    }
}

  public function senaraiHartaC()
  {
    $userid = Auth::user()->id;
    $listHarta = FormC::where('user_id', $userid)->get();
    // $listHarta = FormC::get();


    return view('user.harta.FormC.senaraihartaC', compact('listHarta'));
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
    // $listHarta = FormD::get();

    return view('user.harta.FormD.senaraihartaD', compact('listHarta'));
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
    // $listHarta = FormG::get();

    return view('user.harta.FormG.senaraihartaG', compact('listHarta'));
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

    if($maklumat_pasangan->isEmpty()){
      return view('user.harta.FormB.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman'));
    }
    elseif ($maklumat_anak->isEmpty()) {
      return view('user.harta.FormB.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan'));
    }
    else{
      return view('user.harta.FormG.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','maklumat_pasangan','maklumat_anak'));
    }
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
