<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\User;
use App\FormB;
use App\FormC;
use App\FormD;
use App\FormG;
use App\Gift;
use App\GiftB;
use Adldap\Laravel\Facades\Adldap;

use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('*', function ($view)
      {
        // dd(Auth::user());

        if(Auth::user())
        {
          // if(Auth::user()->name == 'Asset and Gift' || Auth::user()->name == 'Siti Rafidah Ahmad Fuad')
          // {
          //   // dd(Auth::user());
          //   $user = User::findOrFail(Auth::user()->id);
          //   // dd($user);
          //   $user->role = 2;
          //   $user->save();
          // }
          // dd($user);

        }
        if(Auth::user()){
          $count_notification = 0;
          $formbs = FormB::get();
          $formcs = FormC::get();
          $formds = FormD::get();
          $formgs = FormG::get();
          $gifts = Gift::get();
          $giftBs = GiftB::get();
          $collections = collect();

          foreach ($formbs as $formb)
            $collections->push($formb);

          foreach ($formcs as $formc)
            $collections->push($formc);

          foreach ($formds as $formd)
            $collections->push($formd);

          foreach ($formgs as $formg)
            $collections->push($formg);

          foreach ($gifts as $gift)
            $collections->push($gift);

          foreach ($giftBs as $giftB)
            $collections->push($giftB);
          // $merged = $merged->merge($gift);
          // $merged = $merged->merge($giftB);

          // dd($collections);

          $permohonan_admin = [];
          foreach ($collections as $collection) {
            // dd($collection->unreadNotifications);
            foreach ($collection->unreadNotifications as $notification) {
              // dd($notification->data['kepada_id']);
              if($notification->data['kepada_id'] == Auth::user()->id){
                $count_notification++;
              }
            }
          }

          // $userldap = Adldap::search()->users()->find('SITI RAFIDAH AHMAD FUAD'); //active directory testing
          // dd($userldap->thumbnailphoto[0]);

          $userldap = Adldap::search()->select('thumbnailphoto')->where('samaccountname',auth()->user()->username)->first();
          // dd($userldap);
          // return view('home', compact('nama', 'permohonan_admin' ,'count_notification'));
          $view->with('permohonan_admin', $collections);
          $view->with('count_notification', $count_notification);
          $view->with('thumbnailphoto', $userldap->thumbnailphoto[0] ?? null);

          // view()->compact('nama', 'permohonan_admin' ,'count_notification');
        }
      });
    }
}
