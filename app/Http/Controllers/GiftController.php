<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Gift;
use DB;
use Auth;
use App\NilaiHadiah;
use App\JenisHadiah;
use App\Email;
use App\User;

use App\UserExistingStaffNextofKin;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;

use App\Jobs\SendNotificationGift;


class GiftController extends Controller
{
    //
    public function giftBaru(){
      $nilaiHadiah = NilaiHadiah::first();
      $jenisHadiah = JenisHadiah::get();

      $bahagian = UserExistingStaffInfo::distinct('OLEVEL3NAME')->ORDERBY('OLEVEL3NAME','asc')->get('OLEVEL3NAME');
      // dd($bahagia);
      $jabatan = UserExistingStaffInfo::distinct('OLEVEL4NAME')->ORDERBY('OLEVEL4NAME','asc')->get('OLEVEL4NAME');
      // dd($jabatan);

      return view('user.hadiah.gift', compact('nilaiHadiah','jenisHadiah','jabatan','bahagian'));
  }

  public function kemaskini($id){
        $status = "Menunggu Kebenaran Kemaskini";
        $form=Gift::find($id);
        // dd($request->all());
        $form->status = $status;
        $form->save();

        return redirect()->route('user.hadiah.senaraihadiah');
      }

  public function editHadiah($id){
      //$info = SenaraiHarga::find(1);
      $info = Gift::findOrFail($id);
      $nilaiHadiah = NilaiHadiah::first();
      $jenisHadiah = JenisHadiah::get();
      // dd($info);
      return view('user.hadiah.editgift', compact('info','nilaiHadiah','jenisHadiah'));
    }
    public function viewHadiah($id){
        //$info = SenaraiHarga::find(1);
        $info = Gift::findOrFail($id);
        $nilaiHadiah = NilaiHadiah::first();
        $jenisHadiah = JenisHadiah::get();
        //dd($info);
        return view('user.hadiah.viewA', compact('info','nilaiHadiah','jenisHadiah'));
      }

  public function add(array $data, $uploaded_gambar_hadiah){
      $userid = Auth::user()->id;
      $sedang_proses= "Sedang Diproses";



      return Gift::create([
        'jawatan' => $data['jawatan'],
        'jabatan' => $data['jabatan'],
        'bahagian' => $data['bahagian'],
        'jenis_gift' => $data['jenis_gift'],
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



        return Gift::create([
          'jawatan' => $data['jawatan'],
          'jabatan' => $data['jabatan'],
          'bahagian' => $data['bahagian'],
          'jenis_gift' => $data['jenis_gift'],
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

      public function adddraft1(array $data){
          $userid = Auth::user()->id;
          $sedang_proses= "Disimpan ke Draf";



          return Gift::create([
            'jawatan' => $data['jawatan'],
            'jabatan' => $data['jabatan'],
            'bahagian' => $data['bahagian'],
            'jenis_gift' => $data['jenis_gift'],
            'nilai_gift' => $data['nilai_hadiah'],
            'tarikh_diterima' => $data['tarikh_diterima'],
            'nama_pemberi' => $data['nama_pemberi'],
            'alamat_pemberi' => $data['alamat_pemberi'],
            'hubungan_pemberi' => $data['hubungan_pemberi'],
            'sebab_gift' => $data['sebab_diberi'],
            'user_id' => $userid,
            'status' => $sedang_proses,

          ]);
        }


    protected function validator(array $data)
  {
      return Validator::make($data, [
        'jawatan' => ['nullable', 'string'],
        'bahagian' =>['required', 'string'],
        'jabatan' => ['required', 'string'],
        'jenis_gift'=> ['required', 'string'],
        'nilai_hadiah'=> ['required', 'numeric'],
        'tarikh_diterima'=> ['required', 'date'],
        'nama_pemberi'=> ['required', 'string'],
        'alamat_pemberi'=> ['required', 'string'],
        'hubungan_pemberi'=> ['required', 'string'],
        'sebab_diberi'=> ['required', 'string'],
        'gambar_hadiah'=> ['required','max:100000'],
      ]);
  }

  protected function validatordraft(array $data)
{
    return Validator::make($data, [
      'jawatan' => ['nullable', 'string'],
      'jabatan' => ['nullable', 'string'],
      'bahagian' =>['nullable', 'string'],
      'jenis_gift'=> ['nullable', 'string'],
      'nilai_hadiah'=> ['nullable', 'numeric'],
      'tarikh_diterima'=> ['nullable', 'date'],
      'nama_pemberi'=> ['nullable', 'string'],
      'alamat_pemberi'=> ['nullable', 'string'],
      'hubungan_pemberi'=> ['nullable', 'string'],
      'sebab_diberi'=> ['nullable', 'string'],
      'gambar_hadiah'=> ['nullable','max:100000'],
    ]);
}

public function submitForm(Request $request){
  // dd($request->all());
  if ($request->has('save'))
  {
    $this->validatordraft($request->all())->validate();
    if($request->file('gambar_hadiah') != NULL){
    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');
    event($gifts = $this->adddraft($request->all(),$uploaded_gambar_hadiah));
  }
  else
  event($gifts = $this->adddraft1($request->all()));

  return redirect()->route('user.hadiah.senaraidraft');
  }
  else if ($request->has('publish'))
  {
    $this->validator($request->all())->validate();

    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');
    event($gifts = $this->add($request->all(),$uploaded_gambar_hadiah));

    //send notification to hodiv (user declare)
    $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Perisytiharan Hadiah Baharu')->first(); //template email yang diguna
    // $email = null; // for testing
    $hodiv_available = User::where('role','=','3')->get(); //get system hodiv information
    // if ($email) {
      foreach ($hodiv_available as $data) {
        // $giftbs->notify(new UserGiftAdminB($data, $email));
        $this->dispatch(new SendNotificationGift($data, $email, $gifts));
      }
  return redirect()->route('user.hadiah.senaraihadiah');
  }
}

  public function deleteHadiah($id){
      $gifts = Gift::find($id);
      $gifts-> delete();
      return redirect()->route('user.hadiah.senaraihadiah');
  }

  public function update($id,$uploaded_gambar_hadiah){
    $sedang_proses= "Sedang Diproses";
    $gifts = Gift::find($id);
    $gifts->jabatan = request()->jabatan;
    $gifts->jenis_gift = request()->jenis_gift;
    $gifts->nilai_gift = request()->nilai_hadiah;
    $gifts->tarikh_diterima = request()->tarikh_diterima;
    $gifts->alamat_pemberi = request()->alamat_pemberi;
    $gifts->hubungan_pemberi = request()->hubungan_pemberi;
    $gifts->sebab_gift = request()->sebab_diberi;
    $gifts->gambar_gift = $uploaded_gambar_hadiah;
    $gifts->status= $sedang_proses;
    $gifts->save();
  }

  public function updateHadiah(Request $request,$id){
   $gifts = Gift::find($id);
    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');

    $this->update($id,$uploaded_gambar_hadiah);
    if($request ->status =='Sedang Diproses'){
      //send notification to hodiv (user declare)
      $email = Email::where('penerima', '=', 'Ketua Bahagian')->where('jenis', '=', 'Perisytiharan Hadiah Baharu')->first(); //template email yang diguna
      // $email = null; // for testing
      $hodiv_available = User::where('role','=','3')->get(); //get system hodiv information
      // if ($email) {
        foreach ($hodiv_available as $data) {
          // $giftbs->notify(new UserGiftAdminB($data, $email));
          $this->dispatch(new SendNotificationGift($data, $email, $gifts));
        }
    }
    else{

    }
    return redirect()->route('user.hadiah.senaraihadiah');
  }
}
