<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Gift;
use DB;
use Auth;
use App\NilaiHadiah;
use App\JenisHadiah;


class GiftController extends Controller
{
    //
    public function giftBaru(){
      $nilaiHadiah = NilaiHadiah::first();
      $jenisHadiah = JenisHadiah::get();
      return view('user.hadiah.gift', compact('nilaiHadiah','jenisHadiah'));
  }
  public function editHadiah($id){
      //$info = SenaraiHarga::find(1);
      $info = Gift::findOrFail($id);
      $nilaiHadiah = NilaiHadiah::first();
      $jenisHadiah = JenisHadiah::get();
      //dd($info);
      return view('user.hadiah.editgift', compact('info','nilaiHadiah','jenisHadiah'));
    }

  public function add(array $data, $uploaded_gambar_hadiah){
      $userid = Auth::user()->id;
      $sedang_proses= "Sedang Diproses";



      return Gift::create([
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
        'gambar_hadiah'=> ['required','max:100000'],
      ]);
  }


    public function submitForm(Request $request){
// dd($request->all());
    $this->validator($request->all())->validate();
    // dd($request->all());
    // dd($request->all());

    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');
    event($gifts = $this->add($request->all(),$uploaded_gambar_hadiah));

    //send notification to hodiv (user declare)
    return redirect()->route('user.hadiah.senaraihadiah');

  }

  public function deleteHadiah($id){
      $gifts = Gift::find($id);
      $gifts-> delete();
      return redirect()->route('user.hadiah.senaraihadiah');
  }

  public function update($id,$uploaded_gambar_hadiah){
    $gifts = Gift::find($id);
    $gifts->jabatan = request()->jabatan;
    $gifts->jenis_gift = request()->jenis_hadiah;
    $gifts->nilai_gift = request()->nilai_hadiah;
    $gifts->tarikh_diterima = request()->tarikh_diterima;
    $gifts->alamat_pemberi = request()->alamat_pemberi;
    $gifts->hubungan_pemberi = request()->hubungan_pemberi;
    $gifts->sebab_gift = request()->sebab_diberi;
    $gifts->gambar_gift = $uploaded_gambar_hadiah;
    $gifts->save();
  }

  public function updateHadiah(Request $request,$id){
    // $this->validator(request()->all())->validate();
    // dd($request->all());
    $uploaded_gambar_hadiah = $request->file('gambar_hadiah')->store('public/uploads/gambar_hadiah');

    $this->update($id,$uploaded_gambar_hadiah);
    return redirect()->route('user.hadiah.senaraihadiah');
  }
}
