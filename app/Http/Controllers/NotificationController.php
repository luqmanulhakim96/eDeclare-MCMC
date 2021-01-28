<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
// use Illuminate\Notifications\DatabaseNotification as Notification;
use App\Notification;

class NotificationController extends Controller
{
  public function redirectNotification($id){

    $markAsRead = Notification::where('id', $id)->first();
    // dd($markAsRead);
    $hartaBaru = str_contains($markAsRead, 'Harta');
    $hadiahBaru = str_contains($markAsRead, 'Hadiah');
    $roles = Auth::user()->role;
    // dd($roles);
    $markAsRead->markAsRead();
      if($roles == '1')
      {
        if($hartaBaru){
          return redirect()->route('user.admin.harta.senaraitugasanharta');
        }
        elseif ($hadiahBaru) {
          return redirect()->route('user.admin.hadiah.senaraitugasanhadiah');
        }
      }
      else if($roles == '2')
      {
        if($hartaBaru){
          return redirect()->route('user.integrityHOD.harta.senaraitugasanharta');
        }
        elseif ($hadiahBaru) {
          return redirect()->route('user.integrityHOD.hadiah.senaraitugasanhadiah');
        }
      }
      else if($roles == '3')
      {
        if($hartaBaru){
          return redirect()->route('user.hodiv.harta.senaraitugasanharta');
        }
        elseif ($hadiahBaru) {
          return redirect()->route('user.hodiv.hadiah.senaraitugasanhadiah');
        }
      }
    }
}
