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

      // public function errorLogging(){
      //
      //   return view('user.it.errorlog');
      // }

      //start backup process
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
        return redirect()->route('user.it.backup')->with('success','Full Backup in process! Please wait 5-10 minutes.');
      }

      public function backupRunSystem(){
        Artisan::queue('backup:run --only-files');
        $message = "System Backup success!";
        Log::info($message);
        return redirect()->route('user.it.backup')->with('success','System Backup in process! Please wait 5-10 minutes.');
      }

      public function backupRunDatabase(){
        Artisan::queue('backup:run --only-db');
        $message = "Database Backup success!";
        Log::info($message);
        return redirect()->route('user.it.backup')->with('success','Database Backup in process! Please wait 5-10 minutes.');
      }

      public function backupDownload($filename){
        $filepath = env('APP_NAME').'/'.$filename;
        // dd($filepath);
        // $file=Storage::disk('local')->get($filepath);
        // dd($file);

        return Storage::download($filepath);
      }
      //end of backup process

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

      // private function setEnv($key, $value)
      // {
      //   file_put_contents(app()->environmentFilePath(), str_replace(
      //     $key . '=' . env($value),
      //     $key . '=' . $value,
      //     file_get_contents(app()->environmentFilePath())
      //   ));
      // }

      // public function setEnvironmentValue($envKey, $envValue)
      // {
      //     $envFile = app()->environmentFilePath();
      //     $str = file_get_contents($envFile);
      //
      //     $oldValue = strtok($str, "{$envKey}=");
      //
      //     $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}\n", $str);
      //
      //     $fp = fopen($envFile, 'w');
      //     fwrite($fp, $str);
      //     fclose($fp);
      // }

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
}
