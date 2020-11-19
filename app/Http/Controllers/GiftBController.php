<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\GiftB;
use DB;
use Auth;
use App\NilaiHadiah;
use App\JenisHadiah;
use App\User;
use App\Email;

// use App\Notifications\Gift\UserGiftAdminB;
use App\Jobs\SendNotificationGiftB;

class GiftBController extends Controller
{
    //
    public function giftBaru(){
      $nilaiHadiah = NilaiHadiah::first();
      $jenisHadiah = JenisHadiah::get();
      return view('user.hadiah.giftB', compact('nilaiHadiah','jenisHadiah'));
  }
  public function editHadiah($id){
      //$info = SenaraiHarga::find(1);
      $info = GiftB::findOrFail($id);
      $nilaiHadiah = NilaiHadiah::first();
      $jenisHadiah = JenisHadiah::get();
      //dd($info);
      return view('user.hadiah.editgiftB', compact('info','nilaiHadiah','jenisHadiah'));
    }
    public function viewHadiahB($id){
        //$info = SenaraiHarga::find(1);
        $info = GiftB::findOrFail($id);
        $nilaiHadiah = NilaiHadiah::first();
        $jenisHadiah = JenisHadiah::get();
        //dd($info);
        return view('user.hadiah.viewB', compact('info','nilaiHadiah','jenisHadiah'));
      }


  public function add(array $data, $uploaded_gambar_hadiah){
      $userid = Auth::user()->id;
      $sedang_proses= "Sedang Diproses";

      return GiftB::create([
        'jawatan' => $data['jawatan'],
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

    public function adddraft(array $data, $uploaded_gambar_hadiah){
        $userid = Auth::user()->id;
        $sedang_proses= "Disimpan ke Draf";

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
        'jawatan' => ['nullable', 'string'],
        'jabatan' => ['required', 'string'],
        'jenis_hadiah'=> ['required', 'string'],
        'nilai_hadiah'=> ['required', 'string'],
        'tarikh_diterima'=> ['required', 'date'],
        'nama_pemberi'=> ['required', 'string'],
        'alamat_pemberi'=> ['required', 'string'],
        'hubungan_pemberi'=> ['required', 'string'],
        'sebab_diberi'=> ['required', 'string'],
        'gambar_hadiah'=> ['required','max:100000'],
      ]);
  }

    public function submitForm(Request $request){
      if ($request->has('save'))
      {
        $this->validator($request->all())->validate();
        $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');
        event($giftbs = $this->adddraft($request->all(),$uploaded_gambar_hadiah));

      return redirect()->route('user.hadiah.senaraidraft');
      }
      else if ($request->has('publish'))
      {
        $this->validator($request->all())->validate();
        $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');
        event($giftbs = $this->adddraft($request->all(),$uploaded_gambar_hadiah));

        //send notification to hodiv (user declare)
        $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Hadiah Baharu')->first(); //template email yang diguna
        // $email = null; // for testing
        $admin_available = User::where('role','=','1')->get(); //get system hodiv information
        // if ($email) {
          foreach ($admin_available as $data) {
            // $giftbs->notify(new UserGiftAdminB($data, $email));
            $this->dispatch(new SendNotificationGiftB($data, $email, $giftbs));
          }
        }

        return redirect()->route('user.hadiah.senaraihadiahB');
  }

  public function deleteHadiah($id){
      $giftbs = GiftB::find($id);
      $giftbs-> delete();
      return redirect()->route('user.hadiah.senaraihadiahB');
  }

  public function update($id,$uploaded_gambar_hadiah){
    $sedang_proses= "Sedang Diproses";
    $giftbs = GiftB::find($id);
    $giftbs->jabatan = request()->jabatan;
    $giftbs->jenis_gift = request()->jenis_hadiah;
    $giftbs->nilai_gift = request()->nilai_hadiah;
    $giftbs->tarikh_diterima = request()->tarikh_diterima;
    $giftbs->alamat_pemberi = request()->alamat_pemberi;
    $giftbs->hubungan_pemberi = request()->hubungan_pemberi;
    $giftbs->sebab_gift = request()->sebab_diberi;
    $giftbs->gambar_gift = $uploaded_gambar_hadiah;
    $giftbs->status= $sedang_proses;
    $giftbs->save();
  }

  public function updateHadiah(Request $request,$id){
    $giftbs = GiftB::find($id);
    $this->validator(request()->all())->validate();
    if($request ->status =='Disimpan ke Draf'){
      //send notification to hodiv (user declare)
      $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Hadiah Baharu')->first(); //template email yang diguna
      // $email = null; // for testing
      $admin_available = User::where('role','=','1')->get(); //get system hodiv information
      // if ($email) {
        foreach ($admin_available as $data) {
          // $giftbs->notify(new UserGiftAdminB($data, $email));
          $this->dispatch(new SendNotificationGiftB($data, $email, $giftbs));
        }
    }
    else{

    }
    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');

    $this->update($id,$uploaded_gambar_hadiah);
    return redirect()->route('user.hadiah.senaraihadiahB');
  }
}
