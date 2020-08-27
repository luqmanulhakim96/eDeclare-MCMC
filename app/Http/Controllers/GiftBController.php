<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\GiftB;
use DB;
use Auth;
use App\NilaiHadiah;

use App\Notifications\Gift\UserGiftAdminB;

class GiftBController extends Controller
{
    //
    public function giftBaru(){
      $nilaiHadiah = NilaiHadiah::first();
      return view('user.hadiah.giftB', compact('nilaiHadiah'));
  }
  public function editHadiah($id){
      //$info = SenaraiHarga::find(1);
      $info = GiftB::findOrFail($id);
      $nilaiHadiah = NilaiHadiah::first();
      //dd($info);
      return view('user.hadiah.editgiftB', compact('info','nilaiHadiah'));
    }



  public function add(array $data, $uploaded_gambar_hadiah){
      $userid = Auth::user()->id;
      $sedang_proses= "Sedang Diproses";

      return GiftB::create([
        'jabatan' => $data['jabatan'],
        'jenis_gift' => $data['jenis_hadiah'],
        'nilai_gift' => $data['nilai_hadiah'],
        'tarikh_diterima' => $data['tarikh_diterima'],
        'nama_pemberi' => $data['nama_pemberi'],
        'alamat_pemberi' => $data['alamat_pemberi'],
        'hubungan_pemberi' => $data['hubungan_pemberi'],
        'sebab_gift' => $data['sebab_diberi'],
        'gambar_gift' => $uploaded_gambar_hadiah,
        'user_id' => $userid,
        'status' => $sedang_proses,

      ]);
    }

    protected function validator(array $data)
  {
      return Validator::make($data, [
        'jabatan' => ['required', 'string'],
        'jenis_hadiah'=> ['required', 'string'],
        'nilai_hadiah'=> ['required', 'string'],
        'tarikh_diterima'=> ['required', 'date'],
        'nama_pemberi'=> ['required', 'string'],
        'alamat_pemberi'=> ['required', 'string'],
        'hubungan_pemberi'=> ['required', 'string'],
        'sebab_diberi'=> ['required', 'string'],
        'gambar_hadiah'=> ['required','max:100000','mimes:jpeg,jpg,png'],
      ]);
  }

    public function submitForm(Request $request){

    $this->validator($request->all())->validate();
    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');
    event($giftbs = $this->add($request->all(),$uploaded_gambar_hadiah));

    //send notification to hodiv (user declare)
    // $email = SenaraiEmail::where('kepada', '=', 'admin')->where('jenis', '=', 'permohonan_baru')->first(); //template email yang diguna
    $email = null; // for testing
    $admin_available = User::where('role','=','2')->get(); //get system hodiv information
    if ($email) {
      foreach ($admin_available as $data) {
        $formbs->notify(new UserGiftAdminB($data, $email));
      }
    }

    return redirect()->route('user.hadiah.senaraihadiahB');

  }

  public function deleteHadiah($id){
      $giftbs = GiftB::find($id);
      $giftbs-> delete();
      return redirect()->route('user.hadiah.senaraihadiahB');
  }

  public function update($id){
    $giftbs = GiftB::find($id);
    $giftbs->jabatan = request()->jabatan;
    $giftbs->jenis_gift = request()->jenis_hadiah;
    $giftbs->nilai_gift = request()->nilai_hadiah;
    $giftbs->tarikh_diterima = request()->tarikh_diterima;
    $giftbs->alamat_pemberi = request()->alamat_pemberi;
    $giftbs->hubungan_pemberi = request()->hubungan_pemberi;
    $giftbs->sebab_gift = request()->sebab_hadiah;
    $giftbs->gambar_gift = request()->gambar_hadiah;
    $giftbs->save();
  }

  public function updateHadiah($id){
    $this->validator(request()->all())->validate();
    //dd($request->all());

    $this->update($id);
    return redirect()->route('user.hadiah.senaraihadiahB');
  }
}
