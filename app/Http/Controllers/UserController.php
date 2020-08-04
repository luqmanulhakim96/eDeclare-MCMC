<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Asset;
use App\User;
use App\Gift;
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
      // $user = User::find(1);
      $user = User::find(1);
      // dd($user);
      // dd($user[0]->name);
      // $full_name = preg_split("/\s+/", Auth::user()->name);
      // $short_name = $full_name[0]." ".$full_name[1];
      // dd($short_name);
      return view('user.view', compact('user'));
  }

  public function addAsset(array $data)
  {
    return Asset::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
  }

  public function formB()
  {
    return view('user.formB');
  }

  public function formC()
  {
    return view('user.formC');
  }

  public function formD()
  {
    return view('user.formD');
  }

  public function formG()
  {
    return view('user.formG');
  }

  public function senaraiHarta()
  {
    return view('user.senaraiharta');
  }

  public function senaraiHadiah()
  {
    $listHadiah = Gift::get();
    //dd($listHadiah[0]->gambar_gift);
    //$file = Storage::disk('gambar_hadiah')->get($listHadiah[0]->gambar_gift);

    return view('user.hadiah.senaraihadiah', compact('listHadiah'));
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
