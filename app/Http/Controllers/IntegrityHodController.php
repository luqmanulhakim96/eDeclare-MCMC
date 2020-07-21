<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntegrityHodController extends Controller
{
    //
    public function integrityDashboard(){

      return view('user.integrityHOD.view');
    }

    public function listAsset(){

      return view('user.integrityHOD.listAsset');
    }

    public function listGift(){

      return view('user.integrityHOD.listGift');
    }
}
