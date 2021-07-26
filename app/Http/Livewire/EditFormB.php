<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\FormB;
use App\DividenB;
use App\PinjamanB;
use App\User;
use DB;
use Auth;
use App\JenisHarta;
use App\Email;
use App\HartaB;
use App\UserExistingStaff;
use App\UserExistingStaffInfo;
use App\UserExistingStaffNextofKin;
use App\Jobs\SendEmailNotification;
use App\Jobs\SendNotificationFormB;

class EditFormB extends Component
{
    public $id_formb, $idForm;
    public $harta_id;
    public $draft_exist;
    public $jenis_harta, $pemilik_harta, $hubungan_pemilik, $maklumat_harta, $tarikh_pemilikan_harta, $bilangan, $nilai_perolehan,
        $cara_perolehan, $nama_pemilikan_asal, $cara_belian, $lain_lain, $jumlah_pinjaman, $institusi_pinjaman, $tempoh_bayar_balik,
        $ansuran_bulanan, $tarikh_ansuran_pertama, $jenis_harta_pelupusan, $alamat_asset, $no_pendaftaran, $harga_jualan, $tarikh_lupus,
        $tunai,$sumber_tunai, $keterangan_lain, $nama_pemilik_bersama, $unit_bilangan, $lain_lain_hubungan;
    public $gaji_pasangan,$sewa,$sewa_pasangan,$jumlah_imbuhan,$jumlah_imbuhan_pasangan,$pinjaman_perumahan_pegawai,$bulanan_perumahan_pegawai,
        $pinjaman_perumahan_pasangan,$bulanan_perumahan_pasangan,$pinjaman_kenderaan_pegawai,$bulanan_kenderaan_pegawai,$pinjaman_kenderaan_pasangan,
        $bulanan_kenderaan_pasangan,$jumlah_cukai_pegawai,$jumlah_cukai_pasangan,$bulanan_cukai_pegawai,$bulanan_cukai_pasangan,$jumlah_koperasi_pegawai,$bulanan_koperasi_pegawai,
        $jumlah_koperasi_pasangan,$bulanan_koperasi_pasangan;
    public $dividen_1, $dividen_1_pegawai, $dividen_pasangan,$listDividenB,$listPinjamanB;
    public $lain_lain_pinjaman, $pinjaman_pegawai, $bulanan_pegawai, $pinjaman_pasangan, $bulanan_pasangan;
    public $jenis_pemilikan_bersama,$lain_lain_hubungan_bersama;
    public $pengakuan,$pekerjaan_pasangan;


    public $show = 0;
    public $showharta = 0;
    public $showbelian = 0;
    public $showhubungan = 0;
    public $showjenispemilikan = 0;
    public $inputs = [];
    public $inputsdividen = [];
    public $i = 0;
    public $j = 0;
    public $show2 = true;
    public $totalPinjamanPerumahanSendiri = 0;
    public $totalPinjamanPerumahanPasangan = 0;
    public $totalPinjamanKenderaanSendiri = 0;
    public $totalPinjamanKenderaanPasangan = 0;
    public $totalAnsuranPerumahanSendiri = 0;
    public $totalAnsuranPerumahanPasangan = 0;
    public $totalAnsuranKenderaanSendiri = 0;
    public $totalAnsuranKenderaanPasangan = 0;
    public $updateMode = false;

    // public function updated($propertyName)                   //function called everytime user input
    // {
    //     $this->validateOnly($propertyName);
    // }


    public function mount()
    {
        $this->cara_perolehan = '';               //select disabled hidden
        $this->cara_belian = '';
        $this->hubungan_pemilik = '';
        $this->jenis_pemilikan_bersama = '';
    }

    public function addformdividen($j)
    {
        // $this->validation($i);
        $j = $j + 1;
        $this->j = $j;
        array_push($this->inputsdividen, $j);

        $this->dividen_1[$this->j] = null;
        $this->dividen_pasangan[$this->j] = null;
        $this->dividen_1_pegawai[$this->j] = null;
    }

    public function removedividen($j)
    {
        unset($this->inputsdividen[$j]);
    }

    public function removedividenExist($j, $key)
    {
        DividenB::findOrFail($j)->delete();
        unset($this->inputsdividen[$key]);
        $this->render();
        $this->loadData();
    }

    public function addform($i)
    {
        // $this->validation($i);
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
        // dd($this->i);
        $this->lain_lain_pinjaman[$this->i] = null;
        $this->pinjaman_pegawai[$this->i] = null;
        $this->bulanan_pegawai[$this->i] = null;
        $this->pinjaman_pasangan[$this->i] = null;
        $this->bulanan_pasangan[$this->i] = null;
    }

    public function remove($i)
    {
      unset($this->inputs[$i]);
    }

    public function removePinjamanExist($i, $key)
    {
        // dd($i);
        $pinjaman = PinjamanB::findOrFail($i)->delete();
        unset($this->inputs[$key]);
        $this->render();
        $this->loadData();
    }
    public function validatordividen($i){
      $this->validate([
      'dividen_1.'.$i => 'required_with:dividen_1_pegawai.'.$i.'|| required_with:dividen_pasangan.'.$i.'|string',
      'dividen_1_pegawai.'.$i => 'nullable|numeric',
      'dividen_pasangan.'.$i => 'nullable|numeric',
      ]);

    }
    public function validatorpinjaman($j){
          $this->validate([

          'lain_lain_pinjaman.'.$j => 'required_with:pinjaman_pegawai.'.$j.'||required_with:bulanan_pegawai.'.$j.'||required_with:pinjaman_pasangan.'.$j.'||required_with:bulanan_pasangan.'.$j.'|string',
          'pinjaman_pegawai.'.$j => 'nullable|numeric',
          'bulanan_pegawai.'.$j => 'nullable|numeric',
          'pinjaman_pasangan.'.$j => 'nullable|numeric',
          'bulanan_pasangan.'.$j => 'nullable|numeric',
          ]);
        }
    public function validatordrafform(){
        $this->validate([
          'gaji_pasangan' => 'nullable|numeric',
          'jumlah_imbuhan' => 'nullable|numeric',
          'jumlah_imbuhan_pasangan' => 'nullable|numeric',
          'sewa' => 'nullable|numeric',
          'sewa_pasangan' =>'nullable|numeric',
          'pinjaman_perumahan_pegawai' => 'nullable|numeric',
          'bulanan_perumahan_pegawai' => 'nullable|numeric',
          'pinjaman_perumahan_pasangan' => 'nullable|numeric',
          'bulanan_perumahan_pasangan' => 'nullable|numeric',
          'pinjaman_kenderaan_pegawai' => 'nullable|numeric',
          'bulanan_kenderaan_pegawai' => 'nullable|numeric',
          'pinjaman_kenderaan_pasangan' => 'nullable|numeric',
          'bulanan_kenderaan_pasangan' => 'nullable|numeric',
          'jumlah_cukai_pegawai' => 'nullable|numeric',
          // 'bulanan_cukai_pegawai' => 'nullable|numeric',
          'jumlah_cukai_pasangan' => 'nullable|numeric',
          // 'bulanan_cukai_pasangan' => 'nullable|numeric',
          'jumlah_koperasi_pegawai' => 'nullable|numeric',
          'bulanan_koperasi_pegawai' => 'nullable|numeric',
          'jumlah_koperasi_pasangan' => 'nullable|numeric',
          'bulanan_koperasi_pasangan' => 'nullable|numeric',
        ]);
      }

    public function validatorform(){
      $username =Auth::user()->username;

      // $maklumat_pasangan_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();
      $user_check = UserExistingStaffInfo::where('USERNAME', $username) ->first('STAFFNO');
      $user = UserExistingStaffInfo::where('USERNAME', $username) ->get();

      $maklumat_pasangan_check = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO', $user_check->STAFFNO) ->get();

      if($maklumat_pasangan_check->isEmpty()){
              $maklumat_pasangan = null;
            }
      else{
        foreach ($user as $keluarga) {
          // dd($keluarga);
          if($keluarga->STAFFMARTIALSTATUS != "DIVORCED"){
            $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          }
          else
          $maklumat_pasangan = null;
          }
      }
// dd($maklumat_pasangan);

      if($maklumat_pasangan == null){
        $this->validate([
          'pekerjaan_pasangan' => 'nullable|string',
          'gaji_pasangan' => 'nullable|numeric',
          'jumlah_imbuhan' => 'nullable|numeric',
          'jumlah_imbuhan_pasangan' => 'nullable|numeric',
          'sewa' => 'nullable|numeric',
          'sewa_pasangan' =>'nullable|numeric',
          'pinjaman_perumahan_pegawai' => 'nullable|numeric',
          'bulanan_perumahan_pegawai' => 'nullable|numeric',
          'pinjaman_perumahan_pasangan' => 'nullable|numeric',
          'bulanan_perumahan_pasangan' => 'nullable|numeric',
          'pinjaman_kenderaan_pegawai' => 'nullable|numeric',
          'bulanan_kenderaan_pegawai' => 'nullable|numeric',
          'pinjaman_kenderaan_pasangan' => 'nullable|numeric',
          'bulanan_kenderaan_pasangan' => 'nullable|numeric',
          'jumlah_cukai_pegawai' => 'nullable|numeric',
          // 'bulanan_cukai_pegawai' => 'nullable|numeric',
          'jumlah_cukai_pasangan' => 'nullable|numeric',
          // 'bulanan_cukai_pasangan' => 'nullable|numeric',
          'jumlah_koperasi_pegawai' => 'nullable|numeric',
          'bulanan_koperasi_pegawai' => 'nullable|numeric',
          'jumlah_koperasi_pasangan' => 'nullable|numeric',
          'bulanan_koperasi_pasangan' => 'nullable|numeric',
          'pengakuan' => 'required',
        ]);
      }else{
        $this->validate([
          'pekerjaan_pasangan' => 'required|string',
          'gaji_pasangan' => 'nullable|numeric',
          'jumlah_imbuhan' => 'nullable|numeric',
          'jumlah_imbuhan_pasangan' => 'nullable|numeric',
          'sewa' => 'nullable|numeric',
          'sewa_pasangan' =>'nullable|numeric',
          'pinjaman_perumahan_pegawai' => 'nullable|numeric',
          'bulanan_perumahan_pegawai' => 'nullable|numeric',
          'pinjaman_perumahan_pasangan' => 'nullable|numeric',
          'bulanan_perumahan_pasangan' => 'nullable|numeric',
          'pinjaman_kenderaan_pegawai' => 'nullable|numeric',
          'bulanan_kenderaan_pegawai' => 'nullable|numeric',
          'pinjaman_kenderaan_pasangan' => 'nullable|numeric',
          'bulanan_kenderaan_pasangan' => 'nullable|numeric',
          'jumlah_cukai_pegawai' => 'nullable|numeric',
          // 'bulanan_cukai_pegawai' => 'nullable|numeric',
          'jumlah_cukai_pasangan' => 'nullable|numeric',
          // 'bulanan_cukai_pasangan' => 'nullable|numeric',
          'jumlah_koperasi_pegawai' => 'nullable|numeric',
          'bulanan_koperasi_pegawai' => 'nullable|numeric',
          'jumlah_koperasi_pasangan' => 'nullable|numeric',
          'bulanan_koperasi_pasangan' => 'nullable|numeric',
          'pengakuan' => 'required',
        ]);
      }

    }

    protected $rules = [
      'pekerjaan_pasangan' => 'required|string',
      'pengakuan' => 'required',
    ];

    public function validation()
    {
       $this->validate([
        'jenis_harta' => 'required|string',
        'pemilik_harta' => 'required|string',
        'hubungan_pemilik' => 'required|string',
        'nama_pemilik_bersama' => 'nullable|required_if:pemilik_harta,Milikan Bersama|string',
        'lain_lain_hubungan' => 'nullable|required_if:pemilik_harta,Lain-lain|string',
        'maklumat_harta' => 'required|string',
        'tarikh_pemilikan_harta' => 'required|date',
        'bilangan' => 'required|numeric',
        'nilai_perolehan' => 'required|numeric',
        'cara_perolehan' => 'required|string',
        'nama_pemilikan_asal' => 'nullable|required_if:cara_perolehan,Dipusakai||required_if:cara_perolehan,Dihadiahkan|string',
        'cara_belian' => 'nullable|required_if:cara_perolehan,Dibeli|string',
        'lain_lain' => 'nullable|required_if:cara_perolehan,Lain-lain|string',
        'tunai' => 'nullable|required_if:cara_belian,Tunai|numeric',
        'sumber_tunai' => 'nullable|required_if:cara_belian,Tunai|string',
        'jumlah_pinjaman' => 'nullable|required_if:cara_belian,Pinjaman|numeric',
        'institusi_pinjaman' => 'nullable|required_if:cara_belian,Pinjaman|string',
        'tempoh_bayar_balik' => 'nullable|required_if:cara_belian,Pinjaman|string',
        'ansuran_bulanan' => 'nullable|required_if:cara_belian,Pinjaman|numeric',
        'tarikh_ansuran_pertama' => 'nullable|required_if:cara_belian,Pinjaman|date',
        'jenis_harta_pelupusan' => 'nullable|required_if:cara_belian,Pelupusan|string',
        'alamat_asset' => 'nullable|required_if:cara_belian,Pelupusan|string',
        'no_pendaftaran' => 'nullable|required_if:cara_belian,Pelupusan|string',
        'harga_jualan' => 'nullable|required_if:cara_belian,Pelupusan|numeric',
        'tarikh_lupus' => 'nullable|required_if:cara_belian,Pelupusan|date',
       ]);
    }


    public function render()
    {
        $info = FormB::findOrFail($this->id_formb);
        // dd($this->id_formb);
        $jenisHarta = JenisHarta::get();
        $draft_exist_check = FormB::where('user_id', auth()->user()->id)->where('status', 'Disimpan ke Draf')->first();
        if ($draft_exist_check) {
          $this->draft_exist =true;
        }
        $listDividenBs = DividenB::where('formbs_id', $info->id)->get();
        $listPinjamanBs = PinjamanB::where('formbs_id', $info->id)->get();

        $count_div = DividenB::where('formbs_id', $info->id)->count();
        $count_pinjaman = PinjamanB::where('formbs_id', $info->id)->count();

        $username = auth()->user()->username;
        // $staffinfo = null;
        $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
        // dd($staffinfo);

        //data dari form latest
        $userid = auth()->user()->id;
        $data_user = FormB::where('user_id', $userid)->get();

        $username =Auth::user()->username;
        $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
        // $user = UserExistingStaffInfo::where('USERNAME', $username) ->get('STAFFNO');
        // $maklumat_pasangan_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();
        // $maklumat_anak_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();
        $user_check = UserExistingStaffInfo::where('USERNAME', $username) ->first('STAFFNO');
        $user = UserExistingStaffInfo::where('USERNAME', $username) ->get();

        // dd($user->STAFFNO);
        $maklumat_pasangan_check = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO', $user_check->STAFFNO) ->get();
        // dd($maklumat_pasangan_check);
        // $maklumat_anak_check = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->orwhere('RELATIONSHIP','D')->where('STAFFNO', $user_check->STAFFNO) ->get();
        $anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO', $user_check->STAFFNO) ->get();
        $anak_perempuan = UserExistingStaffNextofKin::where('RELATIONSHIP','D')->where('STAFFNO', $user_check->STAFFNO) ->get();
        $maklumat_anak_check = $anak_lelaki->mergeRecursive($anak_perempuan);

        if($maklumat_pasangan_check->isEmpty()){
          $maklumat_pasangan = null;
        }
        else{
          foreach ($user as $keluarga) {
            // dd($keluarga);
            if($keluarga->STAFFMARTIALSTATUS != "DIVORCED"){
              $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
            }
            else
            $maklumat_pasangan = null;

            }
          }


        if($maklumat_anak_check->isEmpty()){
          $maklumat_anak = null;
        }
        else{
          foreach ($user as $keluarga) {

            // $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
            $maklumat_anak_lelaki = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->where('STAFFNO',$keluarga->STAFFNO)->get();
            $maklumat_anak_perempuan = UserExistingStaffNextofKin::where('STAFFNO',$keluarga->STAFFNO)->where('RELATIONSHIP','D')->get();
            $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan)->sortBy('ICNEW');
            }
        }
        $this->idForm = $info->id;
        $hartaB = HartaB::where('formbs_id', $info->id)->get();
        // dd($hartaB);

        return view('livewire.edit-form-b', compact('info', 'maklumat_pasangan', 'maklumat_anak', 'listDividenBs', 'listPinjamanBs', 'count_div', 'count_pinjaman', 'jenisHarta', 'hartaB', 'staffinfo'));
    }


    public function loadData(){
      // dd($this->id_formb);
        $info = FormB::findOrFail($this->id_formb);
        // dd($info);
        $this->pekerjaan_pasangan = $info->pekerjaan_pasangan;
        $this->gaji_pasangan = number_format((float)$info->gaji_pasangan,2,'.','');
        $this->jumlah_imbuhan= number_format((float)$info->jumlah_imbuhan,2,'.','');
        $this->jumlah_imbuhan_pasangan = number_format((float)$info->jumlah_imbuhan_pasangan,2,'.','');
        $this->sewa = number_format((float)$info->sewa,2,'.','');
        $this->sewa_pasangan = number_format((float)$info->sewa_pasangan,2,'.','');

        $this->pinjaman_perumahan_pegawai = number_format((float)$info->pinjaman_perumahan_pegawai,2,'.','');
        $this->bulanan_perumahan_pegawai = number_format((float)$info->bulanan_perumahan_pegawai,2,'.','');
        $this->pinjaman_perumahan_pasangan = number_format((float)$info->pinjaman_perumahan_pasangan,2,'.','');
        $this->bulanan_perumahan_pasangan = number_format((float)$info->bulanan_perumahan_pasangan,2,'.','');
        $this->pinjaman_kenderaan_pegawai = number_format((float)$info->pinjaman_kenderaan_pegawai,2,'.','');
        $this->bulanan_kenderaan_pegawai = number_format((float)$info->bulanan_kenderaan_pegawai,2,'.','');
        $this->pinjaman_kenderaan_pasangan = number_format((float)$info->pinjaman_kenderaan_pasangan,2,'.','');
        $this->bulanan_kenderaan_pasangan = number_format((float)$info->bulanan_kenderaan_pasangan,2,'.','');

        $this->jumlah_cukai_pegawai = number_format((float)$info->jumlah_cukai_pegawai,2,'.','');
        $this->jumlah_cukai_pasangan = number_format((float)$info->jumlah_cukai_pasangan,2,'.','');
        // $this->bulanan_cukai_pegawai = $info->bulanan_cukai_pegawai;
        // $this->bulanan_cukai_pasangan = $info->bulanan_cukai_pasangan;
        $this->jumlah_koperasi_pegawai = number_format((float)$info->jumlah_koperasi_pegawai,2,'.','');
        $this->bulanan_koperasi_pegawai = number_format((float)$info->bulanan_koperasi_pegawai,2,'.','');
        $this->jumlah_koperasi_pasangan = number_format((float)$info->jumlah_koperasi_pasangan,2,'.','');
        $this->bulanan_koperasi_pasangan = number_format((float)$info->bulanan_koperasi_pasangan,2,'.','');

        $this->listDividenB = DividenB::where('formbs_id', $info->id)->get();
        $this->j = 0;
        // dd($this->listDividenB);
        foreach ($this->listDividenB as $data){
            // dd($this->j);
            $j = $this->j;
            $this->dividen_1[$j] = $data->dividen_1;
            $this->dividen_1_pegawai[$j] = number_format((float)$data->dividen_1_pegawai,2,'.','');
            $this->dividen_pasangan[$j] = number_format((float)$data->dividen_1_pasangan,2,'.','');
            // // dd($data);
            $j = $j + 1;
            $this->j = $j;
        }
        if(count($this->listDividenB)){
            $this->j = count($this->listDividenB) - 1;
        }


        $this->listPinjamanB = PinjamanB::where('formbs_id', $info->id)->get();
        // dd($this->listPinjamanB);
        $this->i = 0;
        foreach ($this->listPinjamanB as $data){
            // dd($this->i);
            $i = $this->i;
            // dd($this->i);

            $this->lain_lain_pinjaman[$i] = $data->lain_lain_pinjaman;
            $this->pinjaman_pegawai[$i] = number_format((float)$data->pinjaman_pegawai,2,'.','');
            $this->bulanan_pegawai[$i] = number_format((float)$data->bulanan_pegawai,2,'.','');
            $this->pinjaman_pasangan[$i] = number_format((float)$data->pinjaman_pasangan,2,'.','');
            $this->bulanan_pasangan[$i] = number_format((float)$data->bulanan_pasangan,2,'.','');
            // dd($data);
            $i = $i + 1;
            $this->i = $i;
        }

        if(count($this->listPinjamanB)){
            $this->i = count($this->listPinjamanB) - 1;
        }
    }


    public function editharta($id)
    {

        // $this->showharta = 1;
        $harta = HartaB::findOrFail($id);
        // dd($harta);
        $this->harta_id = $harta->id;
        $this->jenis_harta = $harta->jenis_harta;
        $this->pemilik_harta = $harta->pemilik_harta;
        $this->hubungan_pemilik = $harta->hubungan_pemilik;
        $this->jenis_pemilikan_bersama = $harta->jenis_pemilikan_bersama;
        $this->nama_pemilik_bersama = $harta->nama_pemilik_bersama;
        $this->lain_lain_hubungan_bersama = $harta->lain_lain_hubungan_bersama;
        $this->lain_lain_hubungan = $harta->lain_lain_hubungan;
        $this->maklumat_harta = $harta->maklumat_harta;
        $this->tarikh_pemilikan_harta = $harta->tarikh_pemilikan_harta;
        $this->bilangan = $harta->bilangan;
        $this->nilai_perolehan = $harta->nilai_perolehan;
        $this->cara_perolehan = $harta->cara_perolehan;
        $this->nama_pemilikan_asal = $harta->nama_pemilikan_asal;
        $this->cara_belian = $harta->cara_belian;
        $this->lain_lain = $harta->lain_lain;
        $this->jumlah_pinjaman = $harta->jumlah_pinjaman;
        $this->institusi_pinjaman = $harta->institusi_pinjaman;
        $this->tempoh_bayar_balik = $harta->tempoh_bayar_balik;
        $this->ansuran_bulanan = $harta->ansuran_bulanan;
        $this->tarikh_ansuran_pertama = $harta->tarikh_ansuran_pertama;
        $this->jenis_harta_pelupusan = $harta->jenis_harta_pelupusan;
        $this->alamat_asset = $harta->alamat_asset;
        $this->no_pendaftaran = $harta->no_pendaftaran;
        $this->harga_jualan = $harta->harga_jualan;
        $this->tarikh_lupus = $harta->tarikh_lupus;
        $this->tunai = $harta->tunai;
        $this->sumber_tunai = $harta->sumber_tunai;
        $this->nama_pemilik_bersama = $harta->nama_pemilik_bersama;
        $this->lain_lain_hubungan = $harta->lain_lain_hubungan;
        $this->keterangan_lain = $harta->keterangan_lain;
        $this->unit_bilangan = $harta->unit_bilangan;
        $this->updateMode = true;
        $this->show = 1;

        if ($this->cara_perolehan == "Dipusakai" || $this->cara_perolehan == "Dihadiahkan") {
            $this->show = 1;
        } else if ($this->cara_perolehan == "Dibeli") {
            $this->show = 2;
        } else if ($this->cara_perolehan == "Lain-lain") {
            $this->show = 3;
        } else {
            $this->show = 0;
        }

        if ($this->cara_belian == "Pinjaman") {
            $this->showbelian = 1;
        } else if ($this->cara_belian == "Pelupusan") {
            $this->showbelian = 2;
        } else if ($this->cara_belian == "Tunai") {
            $this->showbelian = 3;
        }

        if ($this->hubungan_pemilik == "Bersama") {
            $this->showhubungan = 1;
        } else if ($this->hubungan_pemilik == "Lain-lain") {
            $this->showhubungan = 2;
        } else {
            $this->showhubungan = 0;
        }

        if ($this->jenis_pemilikan_bersama == "Isteri/Suami") {
          // dd('masuk');
            $this->showjenispemilikan = 1;
        } else if ($this->jenis_pemilikan_bersama == "Lain-lain") {
            $this->showjenispemilikan = 2;
        } else {
            $this->showjenispemilikan = 0;
        }
    }

    public function update()
    {
        // dd($this);
        $this->validation();
        $harta = HartaB::find($this->harta_id);
        // dd($harta);
        $harta->update([
            'jenis_harta' => $this->jenis_harta ?? null,
            'pemilik_harta' => $this->pemilik_harta ?? null,
            'hubungan_pemilik' => $this->hubungan_pemilik ?? null,
            'jenis_pemilikan_bersama' => $this->jenis_pemilikan_bersama ?? null,
            'nama_pemilik_bersama' => $this->nama_pemilik_bersama ?? null,
            'lain_lain_hubungan_bersama' => $this->lain_lain_hubungan_bersama ?? null,
            'lain_lain_hubungan' => $this->lain_lain_hubungan ?? null,
            'maklumat_harta' => $this->maklumat_harta ?? null,
            'tarikh_pemilikan_harta' => $this->tarikh_pemilikan_harta ?? null,
            'bilangan' => $this->bilangan ?? null,
            'unit_bilangan' => $this->unit_bilangan ?? null,
            'nilai_perolehan' => $this->nilai_perolehan ?? null,
            'cara_perolehan' => $this->cara_perolehan ?? null,
            'nama_pemilikan_asal' => $this->nama_pemilikan_asal ?? null,
            'cara_belian' => $this->cara_belian ?? null,
            'lain_lain' => $this->lain_lain ?? null,
            'tunai' => $this->tunai ?? null,
            'sumber_tunai' => $this->sumber_tunai ?? null,
            'jumlah_pinjaman' => $this->jumlah_pinjaman ?? null,
            'institusi_pinjaman' => $this->institusi_pinjaman ?? null,
            'tempoh_bayar_balik' => $this->tempoh_bayar_balik ?? null,
            'ansuran_bulanan' => $this->ansuran_bulanan ?? null,
            'tarikh_ansuran_pertama' => $this->tarikh_ansuran_pertama ?? null,
            'keterangan_lain' => $this->keterangan_lain ?? null,
            'jenis_harta_pelupusan' => $this->jenis_harta_pelupusan ?? null,
            'alamat_asset' => $this->alamat_asset ?? null,
            'no_pendaftaran' => $this->no_pendaftaran ?? null,
            'harga_jualan' => $this->harga_jualan ?? null,
            'tarikh_lupus' => $this->tarikh_lupus ?? null,
        ]);
        $hartaForPinjaman = HartaB::where('formbs_id', $this->id_formb)->get();
        // dd($hartaForPinjaman);
        $this->pinjaman_perumahan_pegawai = 0;
        $this->bulanan_perumahan_pegawai = 0;
        $this->pinjaman_perumahan_pasangan = 0;
        $this->bulanan_perumahan_pasangan = 0;
        $this->pinjaman_kenderaan_pegawai = 0;
        $this->bulanan_kenderaan_pegawai = 0;
        $this->pinjaman_kenderaan_pasangan = 0;
        $this->bulanan_kenderaan_pasangan = 0;

        foreach ($hartaForPinjaman as $data) {
          if($data->jenis_harta == "Rumah" && $data->hubungan_pemilik == "Sendiri" && $data->cara_belian == "Pinjaman"){
              $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + $data->jumlah_pinjaman;
              // $this->pinjaman_perumahan_pegawai = $this->totalPinjamanPerumahanSendiri;
              $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + $data->ansuran_bulanan;
              // $this->bulanan_perumahan_pegawai = $this->totalAnsuranPerumahanSendiri;


          }
          else if($data->jenis_harta == "Rumah" && $data->hubungan_pemilik == "Isteri/Suami" && $data->cara_belian == "Pinjaman"){
              $this->pinjaman_perumahan_pasangan = $this->pinjaman_perumahan_pasangan + $data->jumlah_pinjaman;
              $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan + $data->ansuran_bulanan;
              // $this->pinjaman_perumahan_pasangan = $this->totalPinjamanPerumahanPasangan;
              // $this->bulanan_perumahan_pasangan = $this->totalAnsuranPerumahanPasangan;

          }

          else if($data->jenis_harta == "Kenderaan" && $data->hubungan_pemilik == "Sendiri" && $data->cara_belian == "Pinjaman"){
              // dd('masuk');
              $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + $data->jumlah_pinjaman;
              $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + $data->ansuran_bulanan;
              // $this->pinjaman_kenderaan_pegawai = $this->totalPinjamanKenderaanSendiri;
              // $this->bulanan_kenderaan_pegawai = $this->totalAnsuranKenderaanSendiri;


          }
          else if($data->jenis_harta == "Kenderaan" && $data->hubungan_pemilik == "Isteri/Suami" && $data->cara_belian == "Pinjaman"){
              $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan + $data->jumlah_pinjaman;
              $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan + $data->ansuran_bulanan;
              // $this->pinjaman_kenderaan_pasangan = $this->totalPinjamanKenderaanPasangan;
              // $this->bulanan_kenderaan_pasangan = $this->totalAnsuranKenderaanPasangan;
          }
          //data pengiraan harta bersama
          else if($data->jenis_harta == "Rumah" && $data->hubungan_pemilik == "Bersama" &&  $data->jenis_pemilikan_bersama == "Isteri/Suami" && $data->cara_belian == "Pinjaman"){

              $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + ($data->jumlah_pinjaman/2);

              $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + ($data->ansuran_bulanan/2);

              $this->pinjaman_perumahan_pasangan = $this->pinjaman_perumahan_pasangan + ($data->jumlah_pinjaman/2);

              $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan + ($data->ansuran_bulanan/2);


          }
          else if($data->jenis_harta == "Rumah" && $data->hubungan_pemilik == "Bersama" &&  $data->jenis_pemilikan_bersama == "Lain-lain" && $data->cara_belian == "Pinjaman"){

            $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + ($data->jumlah_pinjaman/2);

            $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + ($data->ansuran_bulanan/2);


          }

          else if($data->jenis_harta == "Kenderaan" && $data->hubungan_pemilik == "Bersama" &&  $data->jenis_pemilikan_bersama == "Isteri/Suami" && $data->cara_belian == "Pinjaman"){

              $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + ($data->jumlah_pinjaman/2);

              $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + ($data->ansuran_bulanan/2);

              $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan + ($data->jumlah_pinjaman/2);

              $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan + ($data->ansuran_bulanan/2);


          }
          else if($data->jenis_harta == "Kenderaan" && $data->hubungan_pemilik == "Bersama" &&  $data->jenis_pemilikan_bersama == "Lain-lain" && $data->cara_belian == "Pinjaman"){

              $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + ($data->jumlah_pinjaman/2);

              $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + ($data->ansuran_bulanan/2);

          }
        }


        $this->updateMode = false;
        $this->resetInputFields();

    }

    public function showForm()
    {
        // dd($this->cara_perolehan);
        $this->reset('showbelian'); // $this->showbelian = 0;

        if ($this->cara_perolehan == "Dipusakai" || $this->cara_perolehan == "Dihadiahkan") {
            $this->show = 1;
        } else if ($this->cara_perolehan == "Dibeli") {
            $this->show = 2;
        } else if ($this->cara_perolehan == "Lain-lain") {
            $this->show = 3;
        } else {
            $this->show = 0;
        }
    }

    public function showFormBelian()
    {
        if ($this->cara_belian == "Pinjaman") {
            $this->showbelian = 1;
        } else if ($this->cara_belian == "Pelupusan") {
            $this->showbelian = 2;
        } else if ($this->cara_belian == "Tunai") {
            $this->showbelian = 3;
        }
    }

    public function showFormHubungan()
    {
        if ($this->hubungan_pemilik == "Bersama") {
            $this->showhubungan = 1;
        } else if ($this->hubungan_pemilik == "Lain-lain") {
            $this->showhubungan = 2;
        } else {
            $this->showhubungan = 0;
            $this->showjenispemilikan = 0;
            $this->jenis_pemilikan_bersama = '';
            $this->nama_pemilik_bersama = '';
            $this->lain_lain_hubungan_bersama = '';
        }
    }

    public function showFormJenisPemilikan()
    {
        if ($this->jenis_pemilikan_bersama == "Isteri/Suami") {
            $this->showjenispemilikan = 1;
        } else if ($this->jenis_pemilikan_bersama == "Lain-lain") {
            $this->showjenispemilikan = 2;
        } else{
            $this->showjenispemilikan = 0;
        }

    }

    public function store($action)
    {
        $formb = FormB::find($this->id_formb);
        if ($action == 'hantar') {
          $this->validatorform();
          $status = "Sedang Diproses";
        }else {
          $this->validatordrafform();
          $status = "Disimpan ke Draf";
        }
        if (empty($this->gaji_pasangan)) {
          $this->gaji_pasangan = null;
        }
        if (empty($this->jumlah_imbuhan)) {
          $this->jumlah_imbuhan = null;
        }
        if (empty($this->jumlah_imbuhan_pasangan)) {
          $this->jumlah_imbuhan_pasangan = null;
        }
        if (empty($this->sewa)) {
          $this->sewa = null;
        }
        if (empty($this->sewa_pasangan)) {
          $this->sewa_pasangan = null;
        }
        if (empty($this->jumlah_cukai_pegawai)) {
          $this->jumlah_cukai_pegawai = null;
        }
        // if (empty($this->bulanan_cukai_pegawai)) {
        //   $this->bulanan_cukai_pegawai = null;
        // }
        if (empty($this->jumlah_cukai_pasangan)) {
          $this->jumlah_cukai_pasangan = null;
        }
        // if (empty($this->bulanan_cukai_pasangan )) {
        //   $this->bulanan_cukai_pasangan  = null;
        // }
        if (empty($this->jumlah_koperasi_pegawai)) {
          $this->jumlah_koperasi_pegawai = null;
        }
        if (empty($this->bulanan_koperasi_pegawai)) {
          $this->bulanan_koperasi_pegawai = null;
        }
        if (empty($this->jumlah_koperasi_pasangan)) {
          $this->jumlah_koperasi_pasangan = null;
        }
        if (empty($this->bulanan_koperasi_pasangan)) {
          $this->bulanan_koperasi_pasangan = null;
        }

        $formb->update([
            'pekerjaan_pasangan' => $this->pekerjaan_pasangan ?? null,
            'gaji_pasangan' => (float)$this->gaji_pasangan ?? 0,
            'jumlah_imbuhan' => (float)$this->jumlah_imbuhan ?? 0,
            'jumlah_imbuhan_pasangan' => (float)$this->jumlah_imbuhan_pasangan ?? 0,
            'sewa' => (float)$this->sewa ?? 0,
            'sewa_pasangan' => (float)$this->sewa_pasangan ?? 0,
            'pinjaman_perumahan_pegawai' => (float)$this->pinjaman_perumahan_pegawai ?? 0,
            'bulanan_perumahan_pegawai' => (float)$this->bulanan_perumahan_pegawai?? 0,
            'pinjaman_perumahan_pasangan' => (float)$this->pinjaman_perumahan_pasangan?? 0,
            'bulanan_perumahan_pasangan' => (float)$this->bulanan_perumahan_pasangan?? 0,
            'pinjaman_kenderaan_pegawai' => (float)$this->pinjaman_kenderaan_pegawai?? 0,
            'bulanan_kenderaan_pegawai' => (float)$this->bulanan_kenderaan_pegawai?? 0,
            'pinjaman_kenderaan_pasangan' => (float)$this->pinjaman_kenderaan_pasangan?? 0,
            'bulanan_kenderaan_pasangan' => (float)$this->bulanan_kenderaan_pasangan?? 0,
            'jumlah_cukai_pegawai' => (float)$this->jumlah_cukai_pegawai?? 0,
            // 'bulanan_cukai_pegawai' => (float)$this->bulanan_cukai_pegawai?? 0,
            'jumlah_cukai_pasangan' => (float)$this->jumlah_cukai_pasangan?? 0,
            // 'bulanan_cukai_pasangan' => (float)$this->bulanan_cukai_pasangan?? 0,
            'jumlah_koperasi_pegawai' => (float)$this->jumlah_koperasi_pegawai?? 0,
            'bulanan_koperasi_pegawai' => (float)$this->bulanan_koperasi_pegawai?? 0,
            'jumlah_koperasi_pasangan' => (float)$this->jumlah_koperasi_pasangan?? 0,
            'bulanan_koperasi_pasangan' => (float)$this->bulanan_koperasi_pasangan?? 0,
            'status' => $status
        ]);

        //panngil function storeDivivden() & storePinjaman()
        $this->storeDividen();
        $this->reset('inputsdividen');
        $this->storePinjaman();
        // $this->reset('inputspinjaman');



        if ($action == 'hantar') {
          //send notification to admin (noti yang dia dah berjaya declare)
          $email = Email::where('penerima', '=', 'Pentadbir Sistem')->where('jenis', '=', 'Perisytiharan Harta Baharu')->first(); //template email yang diguna
          // dd($email);
          // $email = null; // for testing
          $admin_available = User::where('role','=','1')->get(); //get system admin information
          // if (!$email) {
          foreach ($admin_available as $data) {
            // $formbs->notify(new UserFormAdminB($data, $email));
            dispatch(new SendNotificationFormB($data, $email, $formb));
            // dispatch($email);
          }
          return redirect()->route('user.harta.FormB.senaraihartaB');
        }else {

          return redirect()->route('user.harta.senaraidraft');
        }
    }

    public function storeHarta(){
        // dd('masuk');
        $this->validation();
        // $hartaB = HartaB::where('formbs_id', $this->idForm)->get();
        HartaB::create ([
            'jenis_harta' => $this->jenis_harta,
            'pemilik_harta' => $this->pemilik_harta,
            'hubungan_pemilik' => $this->hubungan_pemilik,
            'jenis_pemilikan_bersama' => $this->jenis_pemilikan_bersama,
            'nama_pemilik_bersama' => $this->nama_pemilik_bersama,
            'lain_lain_hubungan_bersama' => $this->lain_lain_hubungan_bersama,
            'lain_lain_hubungan' => $this->lain_lain_hubungan,
            'maklumat_harta' => $this->maklumat_harta,
            'tarikh_pemilikan_harta' => $this->tarikh_pemilikan_harta,
            'bilangan' => $this->bilangan,
            'unit_bilangan' => $this->unit_bilangan,
            'nilai_perolehan' => $this->nilai_perolehan,
            'cara_perolehan' => $this->cara_perolehan,
            'nama_pemilikan_asal' => $this->nama_pemilikan_asal,
            'cara_belian' => $this->cara_belian,
            'lain_lain' => $this->lain_lain,
            'tunai' => $this->tunai,
            'sumber_tunai' => $this->sumber_tunai,
            'jumlah_pinjaman' => $this->jumlah_pinjaman,
            'institusi_pinjaman' => $this->institusi_pinjaman,
            'tempoh_bayar_balik' => $this->tempoh_bayar_balik,
            'ansuran_bulanan' => $this->ansuran_bulanan,
            'tarikh_ansuran_pertama' => $this->tarikh_ansuran_pertama,
            'keterangan_lain' => $this->keterangan_lain,
            'jenis_harta_pelupusan' => $this->jenis_harta_pelupusan,
            'alamat_asset' => $this->alamat_asset,
            'no_pendaftaran' => $this->no_pendaftaran,
            'harga_jualan' => $this->harga_jualan,
            'tarikh_lupus' => $this->tarikh_lupus,
            'formbs_id' =>$this->id_formb,
        ]);
        // dd($this->hubungan_pemilik);
        if($this->jenis_harta == "Rumah" && $this->hubungan_pemilik == "Sendiri" && $this->cara_belian == "Pinjaman"){
            $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + $this->jumlah_pinjaman;
            // $this->pinjaman_perumahan_pegawai = $this->totalPinjamanPerumahanSendiri;
            $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + $this->ansuran_bulanan;
            // $this->bulanan_perumahan_pegawai = $this->totalAnsuranPerumahanSendiri;


        }
        else if($this->jenis_harta == "Rumah" && $this->hubungan_pemilik == "Isteri/Suami" && $this->cara_belian == "Pinjaman"){
            $this->pinjaman_perumahan_pasangan = $this->pinjaman_perumahan_pasangan + $this->jumlah_pinjaman;
            $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan + $this->ansuran_bulanan;
            // $this->pinjaman_perumahan_pasangan = $this->totalPinjamanPerumahanPasangan;
            // $this->bulanan_perumahan_pasangan = $this->totalAnsuranPerumahanPasangan;

        }

        else if($this->jenis_harta == "Kenderaan" && $this->hubungan_pemilik == "Sendiri" && $this->cara_belian == "Pinjaman"){
            // dd('masuk');
            $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + $this->jumlah_pinjaman;
            $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + $this->ansuran_bulanan;
            // $this->pinjaman_kenderaan_pegawai = $this->totalPinjamanKenderaanSendiri;
            // $this->bulanan_kenderaan_pegawai = $this->totalAnsuranKenderaanSendiri;


        }
        else if($this->jenis_harta == "Kenderaan" && $this->hubungan_pemilik == "Isteri/Suami" && $this->cara_belian == "Pinjaman"){
            $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan + $this->jumlah_pinjaman;
            $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan + $this->ansuran_bulanan;
            // $this->pinjaman_kenderaan_pasangan = $this->totalPinjamanKenderaanPasangan;
            // $this->bulanan_kenderaan_pasangan = $this->totalAnsuranKenderaanPasangan;
        }

        //pengiraan harta bersama
        else if($this->jenis_harta == "Rumah" && $this->hubungan_pemilik == "Bersama" &&  $this->jenis_pemilikan_bersama == "Isteri/Suami" && $this->cara_belian == "Pinjaman"){

            $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + ($this->jumlah_pinjaman/2);

            $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + ($this->ansuran_bulanan/2);

            $this->pinjaman_perumahan_pasangan = $this->pinjaman_perumahan_pasangan + ($this->jumlah_pinjaman/2);

            $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan + ($this->ansuran_bulanan/2);


        }
        else if($this->jenis_harta == "Rumah" && $this->hubungan_pemilik == "Bersama" &&  $this->jenis_pemilikan_bersama == "Lain-lain" && $this->cara_belian == "Pinjaman"){

          $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + ($this->jumlah_pinjaman/2);

          $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + ($this->ansuran_bulanan/2);


        }

        else if($this->jenis_harta == "Kenderaan" && $this->hubungan_pemilik == "Bersama" &&  $this->jenis_pemilikan_bersama == "Isteri/Suami" && $this->cara_belian == "Pinjaman"){

            $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + ($this->jumlah_pinjaman/2);

            $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + ($this->ansuran_bulanan/2);

            $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan + ($this->jumlah_pinjaman/2);

            $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan + ($this->ansuran_bulanan/2);


        }
        else if($this->jenis_harta == "Kenderaan" && $this->hubungan_pemilik == "Bersama" &&  $this->jenis_pemilikan_bersama == "Lain-lain" && $this->cara_belian == "Pinjaman"){

            $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + ($this->jumlah_pinjaman/2);

            $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + ($this->ansuran_bulanan/2);

        }

        $this->resetInputFields();

    }
    private function resetInputFields()
    {
        $this->jenis_harta = null;
        $this->pemilik_harta = null;
        $this->hubungan_pemilik = '';
        $this->nama_pemilik_bersama = null;
        $this->lain_lain_hubungan = null;
        $this->maklumat_harta = null;
        $this->tarikh_pemilikan_harta = null;
        $this->bilangan = null;
        $this->nilai_perolehan = null;
        $this->cara_perolehan = '';
        $this->nama_pemilikan_asal = null;
        $this->cara_belian = '';
        $this->lain_lain = null;
        $this->jumlah_pinjaman = null;
        $this->institusi_pinjaman = null;
        $this->tempoh_bayar_balik = null;
        $this->ansuran_bulanan = null;
        $this->tarikh_ansuran_pertama = null;
        $this->jenis_harta_pelupusan = null;
        $this->alamat_asset = null;
        $this->no_pendaftaran = null;
        $this->harga_jualan = null;
        $this->tarikh_lupus = null;
        $this->nama_pemilik_bersama = null;
        $this->lain_lain_hubungan = null;
        $this->keterangan_lain = null;
        $this->unit_bilangan = null;
        $this->showhubungan = 0;
        $this->showjenispemilikan = 0;
        $this->show = 0;
        $this->showbelian = 0;
    }
    public function deleteharta($id)
    {
        $harta = HartaB::findOrFail($id);
        if ($harta) {
            if($harta->jenis_harta == "Rumah" && $harta->hubungan_pemilik == "Sendiri" && $harta->cara_belian == "Pinjaman"){
                $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai - $harta->jumlah_pinjaman;
                // $this->pinjaman_perumahan_pegawai = $this->totalPinjamanPerumahanSendiri;
                $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai - $harta->ansuran_bulanan;
                // $this->bulanan_perumahan_pegawai = $this->totalAnsuranPerumahanSendiri;


            }
            else if($harta->jenis_harta == "Rumah" && $harta->hubungan_pemilik == "Isteri/Suami" && $harta->cara_belian == "Pinjaman"){
                $this->pinjaman_perumahan_pasangan = $this->pinjaman_perumahan_pasangan - $harta->jumlah_pinjaman;
                $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan - $harta->ansuran_bulanan;
                // $this->pinjaman_perumahan_pasangan = $this->totalPinjamanPerumahanPasangan;
                // $this->bulanan_perumahan_pasangan = $this->totalAnsuranPerumahanPasangan;

            }

            else if($harta->jenis_harta == "Kenderaan" && $harta->hubungan_pemilik == "Sendiri" && $harta->cara_belian == "Pinjaman"){
                // dd('masuk');
                $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai - $harta->jumlah_pinjaman;
                $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai - $harta->ansuran_bulanan;
                // $this->pinjaman_kenderaan_pegawai = $this->totalPinjamanKenderaanSendiri;
                // $this->bulanan_kenderaan_pegawai = $this->totalAnsuranKenderaanSendiri;


            }
            else if($harta->jenis_harta == "Kenderaan" && $harta->hubungan_pemilik == "Isteri/Suami" && $harta->cara_belian == "Pinjaman"){
                $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan - $harta->jumlah_pinjaman;
                $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan - $harta->ansuran_bulanan;
                // $this->pinjaman_kenderaan_pasangan = $this->totalPinjamanKenderaanPasangan;
                // $this->bulanan_kenderaan_pasangan = $this->totalAnsuranKenderaanPasangan;
            }
            $record = HartaB::where('id', $id);
            $record->delete();
        }
    }

    public function storeDividen(){
        // dd($this->dividen_1[0]);
        $dividen = DividenB::where('formbs_id', $this->idForm)->get();
        if ($dividen) {
            foreach($dividen as $data){
                $record = DividenB::where('id', $data->id);
                $record->delete();
            }
        }

        if($this->j){
            $counter = $this->j + 1;
          }
        elseif($this->dividen_1){
          $counter = count($this->dividen_1);
        }
        else{
          $counter = 0;
        }

        // for ($j=0; $j <= $this->j; $j++) {
        //       $this-> validatordividen($j);
        // }
        for ($key=0; $key < $counter ; $key++) {
          // dd($this->dividen_1[$key]);
          if (empty($this->dividen_1[$key])) {
            $this->dividen_1[$key] = null;
          }
          // dd($this->dividen_1_pegawai[3]);
          if (empty($this->dividen_1_pegawai[$key])) {
            $this->dividen_1_pegawai[$key] = 0;
          }
          if (empty($this->dividen_pasangan[$key])) {
            $this->dividen_pasangan[$key] = 0;
          }
          $this->validate([
            'dividen_1.'.$key => 'required_with:dividen_1_pegawai.'.$key.'|| required_with:dividen_pasangan.'.$key.'|string',
            'dividen_1_pegawai.'.$key => 'nullable|numeric',
            'dividen_pasangan.'.$key => 'nullable|numeric',
          ]);
            $b = DividenB::create([
                'dividen_1' => $this->dividen_1[$key] ?? null,
                'dividen_1_pegawai' => (float)$this->dividen_1_pegawai[$key]??0,
                'dividen_1_pasangan' => (float)$this->dividen_pasangan[$key]??0,
                'formbs_id' => $this->idForm,
            ]);
        }
    }

    public function storePinjaman(){
        $pinjaman = PinjamanB::where('formbs_id', $this->idForm)->get();
        if ($pinjaman) {
            foreach($pinjaman as $data){
                $record = PinjamanB::where('id', $data->id);
                $record->delete();
            }
        }

        if($this->i){
            $counter = $this->i + 1;
          }
        elseif ($this->lain_lain_pinjaman) {
            $counter = count($this->lain_lain_pinjaman);
        }
        else{
          $counter = 0;
        }


        // for ($i=0; $i <= $this->i; $i++) {
        //       $this-> validatorpinjaman($i);
        // }

        for ($key=0; $key < $counter; $key++) {
          if (empty($this->lain_lain_pinjaman[$key])) {
            $this->lain_lain_pinjaman[$key] = null;
          }
          if (empty($this->pinjaman_pegawai[$key])) {
            $this->pinjaman_pegawai[$key] = 0;
          }
          if (empty($this->bulanan_pegawai[$key])) {
            $this->bulanan_pegawai[$key] = 0;
          }
          if (empty($this->pinjaman_pasangan[$key])) {
            $this->pinjaman_pasangan[$key] = 0;
          }
          if (empty($this->bulanan_pasangan[$key])) {
            $this->bulanan_pasangan[$key] = 0;
          }

          $this->validate([

          'lain_lain_pinjaman.'.$key => 'required_with:pinjaman_pegawai.'.$key.'||required_with:bulanan_pegawai.'.$key.'||required_with:pinjaman_pasangan.'.$key.'||required_with:bulanan_pasangan.'.$key.'|string',
          'pinjaman_pegawai.'.$key => 'nullable|numeric',
          'bulanan_pegawai.'.$key => 'nullable|numeric',
          'pinjaman_pasangan.'.$key => 'nullable|numeric',
          'bulanan_pasangan.'.$key => 'nullable|numeric',
          ]);

            PinjamanB::create ([
                'lain_lain_pinjaman' => $this->lain_lain_pinjaman[$key],
                'pinjaman_pegawai' => (float)$this->pinjaman_pegawai[$key] ?? 0,
                'bulanan_pegawai' => (float)$this->bulanan_pegawai[$key] ?? 0,
                'pinjaman_pasangan' => (float)$this->pinjaman_pasangan[$key] ?? 0,
                'bulanan_pasangan' => (float)$this->bulanan_pasangan[$key] ?? 0,
                'formbs_id' =>$this->idForm,
            ]);
        }
    }
}
