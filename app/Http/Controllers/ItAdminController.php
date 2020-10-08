<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\User;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;

use romanzipp\QueueMonitor\Models\Monitor;
use Artisan;
use Log;
use Storage;
use File;
use Auth;
use Carbon\Carbon;
use Adldap\Laravel\Facades\Adldap;

use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\Helpers\Format;
use Spatie\Backup\Helpers\RightAlignedTableStyle;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class ItAdminController extends Controller
{
      public function itDashboard(){

        return view('user.it.view');
      }

      public function errorLogging(){

        return view('user.it.errorlog');
      }

      public function backup(){

        // $files = Storage::disk('local')->files(env('APP_NAME'));
        $files = Storage::disk('local')->files(env('APP_NAME'));

        $backupDestinationStatuses = BackupDestinationStatusFactory::createForMonitorConfig(config('backup.monitor_backups'));
        $rows = $backupDestinationStatuses->map(function (BackupDestinationStatus $backupDestinationStatus) {
            return $this->convertToRow($backupDestinationStatus);
        });
        $data = [];
        foreach ($files as $file) {
          // $data[] = substr($file, strpos($file, "/")+1);
          // dd(Storage::lastModified($file));
          $data [] = [
            'filename' => substr($file, strpos($file, "/")+1),
            'date' =>  Storage::lastModified($file)
          ];
        }
        // dd($data);
        return view('user.it.backup', compact('rows','data'));
      }

      public function convertToRow(BackupDestinationStatus $backupDestinationStatus): array
      {
          $destination = $backupDestinationStatus->backupDestination();

          $row = [
              'backupName' => $destination->backupName(),
              'disk' => $destination->diskName(),
              'reachable' => Format::emoji($destination->isReachable()),
              'healthy' => Format::emoji($backupDestinationStatus->isHealthy()),
              'amount' => $destination->backups()->count(),
              'newest' => $this->getFormattedBackupDate($destination->newestBackup()),
              'usedStorage' => Format::humanReadableSize($destination->usedStorage()),
          ];

          if (! $destination->isReachable()) {
              foreach (['amount', 'newest', 'usedStorage'] as $propertyName) {
                  $row[$propertyName] = '/';
              }
          }

          if ($backupDestinationStatus->getHealthCheckFailure() !== null) {
              $row['disk'] = '<error>'.$row['disk'].'</error>';
          }

          return $row;
      }

      protected function getFormattedBackupDate(Backup $backup = null)
      {
          return is_null($backup)
              ? 'No backups present'
              : Format::ageInDays($backup->date());
      }

      public function backupRun(){
        Artisan::queue('backup:run');
        $message = "Full Backup success!";
        Log::info($message);
        return redirect()->route('user.it.backup')->with('success','Full Backup success!');
      }

      public function backupRunSystem(){
        Artisan::queue('backup:run --only-files');
        $message = "System Backup success!";
        Log::info($message);
        return redirect()->route('user.it.backup')->with('success','System Backup success!');
      }

      public function backupRunDatabase(){
        Artisan::queue('backup:run --only-db');
        $message = "Database Backup success!";
        Log::info($message);
        return redirect()->route('user.it.backup')->with('success','Database Backup success!');
      }

      public function backupDownload($filename){
        $filepath = env('APP_NAME').'/'.$filename;
        // dd($filepath);
        // $file=Storage::disk('local')->get($filepath);
        // dd($file);

        return Storage::download($filepath);
      }

      public function backgroundQueues(){
        $jobs = Monitor::get();

        return view('user.it.backgroundqueues', compact('jobs'));
      }

      public function audit(){
        // testing data get from mcmc databases

        // $userldap = Adldap::search()->users()->find('MOHD FAIZAL AZIZAN'); //active directory testing
        // dd($userldap);
        // $user = UserExistingStaffNextofKin::first();
        // $user = UserExistingStaffInfo::first();

        $username = strtoupper(Auth::user()->name);
        // dd($username);
        $user = UserExistingStaff::where('STAFFNAME',$username)->get();
        dd($user);

        // end of testing data get from mcmc databases


        $data = Audit::where('event','!=','Log Masuk')->where('event','!=','Log Keluar')->get();
        return view('user.it.audit', compact('data'));
      }

      public function auditTrailLogUser()
      {
        // $data = Audit::with('user')->get();
        // $data = User::where('role','!=','5')->get();
        // $all = $user->audits;
        $data = Audit::where('event','Log Masuk')->orWhere('event','Log Keluar')->get();
        // dd($data);
        return view('user.it.auditUser', compact('data'));
      }

      public function users(){

        // get current user
        $currentUser = Auth::user();

        $user = User::where([['status','!=','0']])->get();
        // $user = User::where([['role','!=','5'],['status','!=','0']])->get();
        // $user_deact = User::where([['role','!=','5'],['status','!=','1']])->get();
        $user_deact = User::where([['status','!=','1']])->get();

        // dd($user_deact);
        return view('user.it.users', compact('user','user_deact', 'currentUser'));
      }

      public function userDelete($id){

          // get current user
          $currentUser = Auth::user();

          // logout user
          $userToLogout = User::find($id);

          // dd($user);

          if($userToLogout->status == false){
            $userToLogout->update(['status' => 1]);
            $success = 'success';
            $text = 'Pengguna berjaya diaktifkan';
          }
          elseif($userToLogout->status == true){
            $userToLogout->update(['status' => 0]);

            $success = 'success';
            $text = 'Pengguna berjaya dinyahaktif';
          }
          return redirect()->route('user.it.users')->with($success,$text);
      }
}
