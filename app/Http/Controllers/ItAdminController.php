<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\User;
use romanzipp\QueueMonitor\Models\Monitor;
use Artisan;
use Log;
use Storage;
use File;
use Auth;
use Carbon\Carbon;
use App\Route;
use Illuminate\Support\Facades\Validator;

use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\Helpers\Format;
use Spatie\Backup\Helpers\RightAlignedTableStyle;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatus;
use Spatie\Backup\Tasks\Monitor\BackupDestinationStatusFactory;

class ItAdminController extends Controller
{
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
        // dd($user);
        // $user = User::where([['role','!=','5'],['status','!=','0']])->get();
        // $user_deact = User::where([['role','!=','5'],['status','!=','1']])->get();
        $user_deact = User::where([['status','!=','1']])->get();

        // dd($user_deact);
        return view('user.it.users', compact('user','user_deact', 'currentUser'));
      }

      public function updateUserRole(Request $request,$id){
        $users=User::find($id);
        // dd($request->all());
        $users->role = $request->role;
        $users->save();

        $currentUser = Auth::user();

        $user = User::where([['status','!=','0']])->get();
        // $user = User::where([['role','!=','5'],['status','!=','0']])->get();
        // $user_deact = User::where([['role','!=','5'],['status','!=','1']])->get();
        $user_deact = User::where([['status','!=','1']])->get();

        return redirect()->route('user.it.users', compact('user','user_deact', 'currentUser'));
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

      public function SistemKonfigurasi(){
        $test = Route::findOrFail(1);
        $admin = json_decode($test->layout);

        $test1 = Route::findOrFail(2);
        $itadmin = json_decode($test1->layout);
        // dd($admin);
        $route=Route::get();
        return view('user.it.sistemkonfigurasi',compact('route','admin','itadmin'));
      }

      // public function addlayout(array $data){
      //     $layouts = [
      //       $data['layout1'],
      //       $data['layout2']
      //     ];
      //     $layouts = json_encode($layouts);
      //     if($data['jawatan'] == 'Pentadbir Sistem')
      //     {
      //       $roles = '1';
      //     }
      //     else if($data['jawatan'] == 'IT Admin'){
      //       $roles = '4';
      //     }
      //
      //     return Route::create([
      //       'jawatan' => $data['jawatan'],
      //       'layout' => $layouts,
      //       'roles' => $roles
      //     ]);
      //   }
      //
      //   protected function validatorlayout(array $data)
      // {
      //     return Validator::make($data, [
      //       'jawatan' =>['nullable', 'string'],
      //       'layout'=>['nullable', 'string'],
      //
      //   ]);
      // }
      //
      //   public function submitlayout(Request $request){
      //
      //   $this->validatorlayout($request->all())->validate();
      //
      //   event($layouts = $this->addlayout($request->all()));
      //
      //   return redirect()->route('user.it.sistemkonfigurasi');
      //   }

      public function updateLayout(Request $request){
        // dd($request->all());
        $routes = Route::find($request->id_admin);

        $layouts = [
              $request['layout1_admin'],
              $request['layout2_admin']
            ];
        $layouts = json_encode($layouts);
        // dd($layouts);
        $routes->layout = $layouts;
        $routes->save();

        $routes2 = Route::find($request->id_itadmin);
        $layouts2 = [
              $request['layout1_it'],
              $request['layout2_it']
            ];
        $layouts2 = json_encode($layouts2);
        // dd($routes2);
        $routes2->layout = $layouts2;
        $routes2->save();

        return redirect()->route('user.it.sistemkonfigurasi');
      }
}
