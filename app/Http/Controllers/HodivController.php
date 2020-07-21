<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HodivController extends Controller
{
    //
  public function hodivDashboard(){

    return view('user.hodiv.view');
  }

  public function listAsset(){

    return view('user.hodiv.listAsset');
  }

  public function listGift(){

    return view('user.hodiv.listGift');
  }
}
