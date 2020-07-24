<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Asset;
use DB;

class PerakuanController extends Controller
{
    //
    public function perakuanBaru(){

      return view('user.perakuanharta.formA');
  }

  public function add(array $data){
      return Asset::create([
        'perakuan' => $data['perakuan'],
        'tarikh_perakuan' => $data['tarikh_perakuan'],

      ]);
    }

    protected function validator(array $data)
  {
      return Validator::make($data, [
        'perakuan'=> ['required', 'string'],
        'tarikh_perakuan'=> ['required', 'date'],
      ]);
  }

    public function submitForm(Request $request){

    $this->validator($request->all())->validate();
// dd($request->all());
    event($perakuanharta = $this->add($request->all()));
    return redirect()->route('menu-utama');

  }
}
