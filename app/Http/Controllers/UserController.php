<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Asset;
use App\User;
use App\Gift;
use App\GiftB;
use App\DividenB;
use App\PinjamanB;
use App\DividenG;
use App\PinjamanG;
use App\Pinjaman;
use App\FormB;
use App\FormC;
use App\FormD;
use App\FormG;
use App\Keluarga;
use App\NilaiHadiah;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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

  public function viewB($id)
  {
     //dd($id);
    $listHarta = FormB::findOrFail($id);
     // dd($listHarta);
    $listDividenB = DividenB::where('formbs_id', $listHarta->id) ->get();

    $listPinjamanB = PinjamanB::where('formbs_id', $listHarta->id) ->get();

    $username =strtoupper(Auth::user()->name);
    $user = UserExistingStaff::where('STAFFNAME','SITI RAFIDAH BINTI AHMAD FUAD') ->get('STAFFNO');
    // $user = UserExistingStaff::where('STAFFNAME',$username) ->get('STAFFNO');
    foreach ($user as $pasangan) {
      $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')
                                                ->where('STAFFNO',$pasangan->STAFFNO)->get();
      }

    //data anak
    foreach ($user as $anak) {
     $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$anak->STAFFNO)->get();
     $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$anak->STAFFNO)->where('RELATIONSHIP','D')->get();
     $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);

   }

    return view('user.harta.FormB.viewformB', compact('listHarta','listDividenB','listPinjamanB','maklumat_anak','maklumat_pasangan'));
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
    //data ic user
    // $username =strtoupper(Auth::user()->name);
    // $ic = UserExistingStaffNextofKin::where('NOKNAME',$username) ->get();
    //data testing
    // $ic = UserExistingStaffNextofKin::where('NOKNAME','ADZNAN  ABDUL KARIM') ->get();

      return view('user.harta.FormC.viewformC', compact('listHarta'));
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
    //data ic user
    // $username =strtoupper(Auth::user()->name);
    // $ic = UserExistingStaffNextofKin::where('NOKNAME',$username) ->get();
    //data testing
    // $ic = UserExistingStaffNextofKin::where('NOKNAME','ADZNAN  ABDUL KARIM') ->get();

      return view('user.harta.FormD.viewformD', compact('listHarta','listKeluarga'));
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
    //data ic user
    // $username =strtoupper(Auth::user()->name);
    // $ic = UserExistingStaffNextofKin::where('NOKNAME',$username) ->get();
    //data testing
    // $ic = UserExistingStaffNextofKin::where('NOKNAME','ADZNAN  ABDUL KARIM') ->get();

    //data gaji user
    // $username =strtoupper(Auth::user()->name);
    // $salary = UserExistingStaff::where('STAFFNAME',$username) ->get();
    //data testing
    $salary = UserExistingStaff::where('STAFFNAME','THAMILSELVAN S/O MUNYANDY') ->get();

      return view('user.harta.FormG.viewformG', compact('listHarta','listDividenG','listPinjamanG','listPinjaman','salary'));
  }


  public function editProfile()
  {
    return view('user.profile');
  }

  public function validator(array $data)
  {
    return Validator::make($data, [
      'fName'=>['required']
    ]);
  }

  public function submitForm(Request $request)
  {
    dd($request->all());

    $this->validator($request->all())->validate();
    event($permohonan = $this->addAsset($request->all()));
    return redirect()->route('permohonan-asset');
  }


}
