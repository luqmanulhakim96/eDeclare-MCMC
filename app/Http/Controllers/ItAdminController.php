<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use romanzipp\QueueMonitor\Models\Monitor;
use Artisan;
use Log;
use Storage;
use File;
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
        $data = Audit::get();

        return view('user.it.audit', compact('data'));
      }

      public function users(){

        return view('user.it.users');
      }
}
