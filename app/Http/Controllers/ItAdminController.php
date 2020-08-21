<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;

class ItAdminController extends Controller
{
      public function itDashboard(){

        return view('user.it.view');
      }

      public function errorLogging(){

        return view('user.it.errorlog');
      }

      public function backup(){

        return view('user.it.backup');
      }

      public function backgroundQueues(){

        return view('user.it.backgroundqueues');
      }

      public function audit(){

        // $data = Audit::with('user')->get();
        // $data = User::where('role','!=','5')->get();
        // $all = $user->audits;
        // $data = Audit::whereHas('user', function($q) {
        //   $q->where('role','!=','5');
        // })->get();
        $data = Audit::get();
        // dd($data);

        return view('user.it.audit', compact('data'));
      }

      public function users(){

        return view('user.it.users');
      }
}
