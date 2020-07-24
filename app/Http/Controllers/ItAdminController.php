<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('user.it.audit');
      }

      public function users(){

        return view('user.it.users');
      }
}
