<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
      $full_name = preg_split("/\s+/", Auth::user()->name);
      $short_name = $full_name[0]." ".$full_name[1];
      // dd($short_name);
      return view('user.view', compact('short_name'));
  }
}
