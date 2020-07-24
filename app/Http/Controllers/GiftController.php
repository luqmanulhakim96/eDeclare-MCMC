<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Gift;
use DB;


class GiftController extends Controller
{
    //
    public function giftBaru(){

      return view('user.hadiah.gift');
  }
  public function editHadiah($id){
      //$info = SenaraiHarga::find(1);
      $info = Gift::findOrFail($id);
      //dd($info);
      return view('user.hadiah.editgift', compact('info'));
    }

  public function add(array $data){
      return Gift::create([
        'jenis_gift' => $data['jenis_hadiah'],
        'nilai_gift' => $data['nilai_hadiah'],
        'tarikh_diterima' => $data['tarikh_diterima'],
        'nama_pemberi' => $data['nama_pemberi'],
        'alamat_pemberi' => $data['alamat_pemberi'],
        'hubungan_pemberi' => $data['hubungan_pemberi'],
        'sebab_gift' => $data['sebab_diberi'],
        'gambar_gift' => $data['gambar_hadiah'],

      ]);
    }

    protected function validator(array $data)
  {
      return Validator::make($data, [
        'jenis_hadiah'=> ['required', 'string'],
        'nilai_hadiah'=> ['required', 'string'],
        'tarikh_diterima'=> ['required', 'date'],
        'nama_pemberi'=> ['required', 'string'],
        'alamat_pemberi'=> ['required', 'string'],
        'hubungan_pemberi'=> ['required', 'string'],
        'sebab_diberi'=> ['required', 'string'],
        'gambar_hadiah'=> ['required', 'string'],
      ]);
  }

    public function submitForm(Request $request){

    $this->validator($request->all())->validate();
// dd($request->all());
    event($gifts = $this->add($request->all()));
    return redirect()->route('user.hadiah.senaraihadiah');

  }

  public function deleteHadiah($id){
      $gifts = Gift::find($id);
      $gifts-> delete();
      return redirect()->route('user.hadiah.senaraihadiah');
  }

  public function update($id){
    $gifts = Gift::find($id);
    $gifts->jenis_gift = request()->jenis_hadiah;
    $gifts->nilai_gift = request()->nilai_hadiah;
    $gifts->tarikh_diterima = request()->tarikh_diterima;
    $gifts->alamat_pemberi = request()->alamat_pemberi;
    $gifts->hubungan_pemberi = request()->hubungan_pemberi;
    $gifts->sebab_gift = request()->sebab_hadiah;
    $gifts->gambar_gift = request()->gambar_hadiah;
    $gifts->save();
  }

  public function updateHadiah($id){
    $this->validator(request()->all())->validate();
    //dd($request->all());

    $this->update($id);
    return redirect()->route('user.hadiah.senaraihadiah');
  }
}
