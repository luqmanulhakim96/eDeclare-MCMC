<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\Request as Request;
use App\UserExistingStaffInfo;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
      // return 'no_staff';
      return 'samaccountname';
      // return 'username';
    }

    public function authenticated($request, $user)
    {
      if($user->name == 'Asset and Gift' || $user->name == 'Siti Rafidah Ahmad Fuad')
      {

        // $user = User::findOrFail($user->id);
        // dd($user);
        $user->role = 4;
        $user->save();
      }


      $staffinfo = UserExistingStaffInfo::where('USERNAME', $user->username)->first();
      // dd($staffinfo);
      if(!$staffinfo){

      }
      else{
      if($staffinfo->OLEVEL5NAME == "INTEGRITY AND EMPLOYEE RELATION"){
        if($staffinfo->DESCRIPTION == "HEAD OF DEPARTMENT"){
          $user->role =2;
          $user->save();
        }
      }
      else if($staffinfo->DESCRIPTION == "HEAD OF DIVISION"){
        $user->role =3;
        $user->save();
      }
      else if($user->name == 'Siti Rafidah Ahmad Fuad')
      {
        $user->role = 4;
        $user->save();
      }
      else {
        $user->role =5;
        $user->save();
      }
    }



        $user->should_re_login = false;
        $user->save();

        return redirect()->intended($this->redirectPath());
    }
}
