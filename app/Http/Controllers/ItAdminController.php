<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\User;
use App\SettingAuth;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;
use App\Duration;
use App\FormB;

use romanzipp\QueueMonitor\Models\Monitor;
use Artisan;
use Log;
use Storage;
use File;
use Auth;
use Carbon\Carbon;

use Adldap\Laravel\Facades\Adldap;
use App\Route;
use Illuminate\Support\Facades\Validator;


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

      // error log viewer can be found at resources > vendor > laravel-log-viewer > log.blade.php
      // using \Rap2hpoutre\LaravelLogViewer\LogViewerController@index Controller

      public function backgroundQueues(){
        $jobs = Monitor::get();

        return view('user.it.backgroundqueues', compact('jobs'));
      }

      public function audit(){

        // $user = User::where('username','azizulr')->first();
        // dd($user);
        // $info = FormB::findOrFail(48);
        //
        // $user = User::where('username', 'azizulr')->first();
        // $info = FormB::where('user_id', $user->id)->get();
        // dd($info);
        /* php artisan import user dari ldap */
        // \Artisan::call('adldap:import --no-interaction');

        // testing data get from mcmc databases
        // $userldap = Adldap::search()->users()->find('Azizul Rahman Zainal'); //active directory testing
        // $users = Adldap::search()->users()->get();
        // dd($userldap);

        // 'sync_attributes' => [
        //     //insert data from ad to users table
        //
        //     'email' => 'mail',
        //     'username' => 'samaccountname',
        //     // 'samaccountname' => 'userprincipalname',
        //     'title' => 'title',
        //     'alamat_tempat_bertugas' => 'l',
        //     'jawatan' => 'title',
        //     'jabatan' => 'department',
        //     'name' => 'cn',
        //
        // ],

        // $user = UserExistingStaffNextofKin::first();
        // $user = UserExistingStaffNextofKin::where('STAFFNO','540')->get();
        // $user = UserExistingStaffInfo::get()->groupBy('DESCRIPTION');
        // $user = UserExistingStaffInfo::where('USERNAME','azizulr')->get();
        // dd($user);
        // $user = UserExistingStaff::first();
        // dd($user);

        // $username = strtoupper(Auth::user()->name);
        // dd($username);
        // $user = UserExistingStaff::where('STAFFNAME','SITI RAFIDAH BINTI AHMAD FUAD')->get();
        // $user = UserExistingStaffInfo::where('STAFFNAME','SITI RAFIDAH BINTI AHMAD FUAD')->get();
        // dd($user);

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
        if($request->role == 1){
          $users->route_id = 1;
        }
        elseif ($request->role == 4) {
          $users->route_id = 2;
        }
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
            $userToLogout->update(['should_re_login' => 1]);

            $success = 'success';
            $text = 'Pengguna berjaya dinyahaktif';
          }
          // dd($userToLogout);
          return redirect()->route('user.it.users')->with($success,$text);
      }


      public function SistemKonfigurasi(){
        // $table = Duration::first();
        // dd($table->duration);

        $test = Route::findOrFail(1);
        $admin = json_decode($test->layout);

        $test1 = Route::findOrFail(2);
        $itadmin = json_decode($test1->layout);
        // dd($admin);
        $route=Route::get();
        $auth = SettingAuth::first();

        $duration = Duration::first();
        // dd($duration);
        return view('user.it.sistemkonfigurasi',compact('route','admin','itadmin','auth','duration'));
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

      public function konfigurasiSistem(){
        $config_app = config('app');
        $attributes_config_app = array_keys($config_app);

        $config_database = config('database');
        $config_database_sqlsrv = $config_database['connections']['sqlsrv'];
        $attributes_config_database = array_keys($config_database_sqlsrv);

        $config_mail = config('mail');
        $config_mail_smtp = $config_mail['mailers']['smtp'];
        $config_mail_from = $config_mail['from'];

        $attributes_config_mail_smtp = array_keys($config_mail_smtp);
        $attributes_config_mail_from = array_keys($config_mail_from);

        // dd($config_app);

        return view('user.it.konfigurasi', compact('config_app','attributes_config_app', 'config_database_sqlsrv', 'attributes_config_database', 'config_mail_smtp', 'config_mail_from', 'attributes_config_mail_smtp', 'attributes_config_mail_from'));
      }

      public function editKonfigurasiSistem(Request $request){
        // dd($request->all());
        $aplikasi_name = $request->aplikasi_name;
        $aplikasi_debug = $request->aplikasi_debug;
        if($aplikasi_debug == '1')
        {
          $aplikasi_debug = 'true';
        }
        else {
          $aplikasi_debug = 'false';
        }
        $aplikasi_url = $request->aplikasi_url;
        $aplikasi_timezone = $request->aplikasi_timezone;

        $database_host = $request->database_host;
        $database_port = $request->database_port;
        $database_database = $request->database_database;
        $database_username = $request->database_username;
        $database_password = $request->database_password;

        $smtp_host = $request->smtp_host;
        $smtp_port = $request->smtp_port;
        $smtp_encryption = $request->smtp_encryption;
        $smtp_username = $request->smtp_username;
        $smtp_password = $request->smtp_password;
        $smtp_address = $request->smtp_address;
        $smtp_name = $request->smtp_name;

        // config(['app.name' => $request->aplikasi_name]);
         // $day = $this->setEnv("APP_NAME", $request->aplikasi_name);

         // App config
         $this->setEnvironmentValue('APP_NAME', $aplikasi_name);
         $this->setEnvironmentValue('APP_DEBUG', $aplikasi_debug);
         $this->setEnvironmentValue('APP_URL', $aplikasi_url);
         // $this->setEnvironmentValue('APP_NAME', '"testing"');
        // config(['app.timezone' => $request->aplikasi_timezone]);

        // Database config
        $this->setEnvironmentValue('DB_HOST', $database_host);
        $this->setEnvironmentValue('DB_PORT', $database_port);
        $this->setEnvironmentValue('DB_DATABASE', $database_database);
        $this->setEnvironmentValue('DB_USERNAME', $database_username);
        $this->setEnvironmentValue('DB_PASSWORD', $database_password);

        // Email config
        $this->setEnvironmentValue('MAIL_HOST', $smtp_host);
        $this->setEnvironmentValue('MAIL_PORT', $smtp_port);
        $this->setEnvironmentValue('MAIL_USERNAME', $smtp_username);
        $this->setEnvironmentValue('MAIL_PASSWORD', $smtp_password);
        $this->setEnvironmentValue('MAIL_ENCRYPTION', $smtp_encryption);
        $this->setEnvironmentValue('MAIL_FROM_ADDRESS', $smtp_address);
        $this->setEnvironmentValue('MAIL_FROM_NAME', $smtp_name);

        // config(['app.url' => $request->aplikasi_url]);
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        // Artisan::call('config:cache');

        return redirect()->route('user.it.konfigurasi');
        // Auth::logout();
        // return redirect()->route('login');
      }

      private function setEnvironmentValue($envKey, $envValue)
      {
          $envFile = app()->environmentFilePath();
          $str = file_get_contents($envFile);

          $str .= "\n"; // In case the searched variable is in the last line without \n
          $keyPosition = strpos($str, "{$envKey}=");
          $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
          $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
          $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
          $str = substr($str, 0, -1);

          $fp = fopen($envFile, 'w');
          fwrite($fp, $str);
          fclose($fp);

      }
      public function submitauth(Request $request,$id){
          $auths=SettingAuth::find($id);
          $auths->max_attempts = $request->max_attempts;
          $auths->decay_minutes = $request->decay_minutes;
          $auths->save();

          return redirect()->route('user.it.sistemkonfigurasi');
        }

      public function importuser(){
        // dd('tes');
        \Artisan::call('adldap:import --no-interaction'); //call php artisan adldap:import

        $users = User::get();
        foreach ($users as $user) {
          $staffinfo = UserExistingStaffInfo::where('USERNAME', $user->username)->first();
          if($staffinfo){
            if($staffinfo->OLEVEL5NAME == "INTEGRITY AND EMPLOYEE RELATION"){
              if($staffinfo->DESCRIPTION == "HEAD OF DEPARTMENT"){
                $user->role =2;
                $user->save();
                // dd('HEAD OF DEPARTMENT');
              }
            }
            else if($staffinfo->DESCRIPTION == "HEAD OF DIVISION"){
              $user->role =3;
              $user->save();
              // dd('HEAD OF DIVISION');
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
        }

        return redirect()->back()->with('success','Operasi Berjaya!');
      }

      public function submitTempohNotifikasi(request $request){
          $years = ($request->years ?? 0) * 365;
          $month = ($request->months ?? 0) *30;
          $days = $request->days ?? 0;
          $duration = $years + $month + $days;

          $table = Duration::first();
          // dd($table);

          if(!$table){
            Duration::create([
              'duration' => $duration,
              'years' => $years,
              'months' => $month,
              'days' => $days,
            ]);
          }else {
          // dd('update');

          $table->days = $days;
          $table->years = $years;
          $table->months = $month;
          $table->duration = $duration;

          $table->save();
        }
        return redirect()->back();
      }
}
