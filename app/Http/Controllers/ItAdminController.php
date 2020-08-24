<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use romanzipp\QueueMonitor\Models\Monitor;

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
        $jobs = Monitor::get();
        // Check the current state of a job
        // $job->isFinished();
        // $job->hasFailed();
        // $job->hasSucceeded();
        //
        // // Exact start & finish dates with milliseconds
        // $job->getStartedAtExact();
        // $job->getFinishedAtExact();
        //
        // // If the job is still running, get the estimated seconds remaining
        // // Notice: This requires a progress to be set
        // $job->getRemainingSeconds();
        // $job->getRemainingInterval(); // Carbon\CarbonInterval
        //
        // // Retrieve any data that has been set while execution
        // $job->getData();
        //
        // // Get the base name of the executed job
        // $job->getBasename();
        return view('user.it.backgroundqueues', compact('jobs'));
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
