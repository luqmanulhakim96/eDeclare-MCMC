<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function adminDashboard(){

      return view('user.admin.view');
    }

    public function systemConfig(){

      return view('user.admin.systemconfig');
  }

  public function notification(){

    return view('user.admin.notification');
  }

  public function listAsset(){

    return view('user.admin.listAsset');
  }

  public function listGift(){

    return view('user.admin.listGift');
  }

}
