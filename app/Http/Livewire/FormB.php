<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\FormB;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;
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
use App\FormB as FormBModel;

class FormB extends Component
{

    public $gaji_pasangan, $jumlah_imbuhan, $jumlah_imbuhan_pasangan, $sewa, $sewa_pasangan, $action,
        $pinjaman_perumahan_pegawai, $bulanan_perumahan_pegawai, $pinjaman_perumahan_pasangan, $bulanan_perumahan_pasangan,
        $pinjaman_kenderaan_pegawai, $bulanan_kenderaan_pegawai, $pinjaman_kenderaan_pasangan, $bulanan_kenderaan_pasangan,
        $jumlah_cukai_pegawai, $bulanan_cukai_pegawai, $jumlah_cukai_pasangan, $bulanan_cukai_pasangan, $jumlah_koperasi_pegawai,
        $bulanan_koperasi_pegawai, $jumlah_koperasi_pasangan, $bulanan_koperasi_pasangan,$no_staff,$nama_pegawai,$kad_pengenalan,
        $jawatan,$alamat_tempat_bertugas,$jabatan,$gaji,$pengakuan;
    public $jenis_harta, $pemilik_harta, $hubungan_pemilik, $maklumat_harta, $tarikh_pemilikan_harta, $bilangan, $nilai_perolehan,
        $cara_perolehan, $nama_pemilikan_asal, $cara_belian, $lain_lain, $jumlah_pinjaman, $institusi_pinjaman, $tempoh_bayar_balik,
        $ansuran_bulanan, $tarikh_ansuran_pertama, $jenis_harta_pelupusan, $alamat_asset, $no_pendaftaran, $harga_jualan, $tarikh_lupus,
        $tunai,$sumber_tunai,$keterangan_lain,$nama_pemilik_bersama,$unit_bilangan,$lain_lain_hubungan,$jenis_pemilikan_bersama,$lain_lain_hubungan_bersama;
    public $formbid_created,$pekerjaan_pasangan;
    public $updateMode = false;
    public $dividen_1, $dividen_1_pegawai, $DividenB, $dividen_pasangan;
    public $inputdividen = [];
    public $i = 0;
    public $lain_lain_pinjaman, $pinjaman_pegawai, $bulanan_pegawai, $pinjaman_pasangan, $bulanan_pasangan;
    public $inputpinjaman = [];
    public $j = 0;
    public $show = [];
    public $showbelian = [];
    public $showhubungan = [];
    public $showjenispemilikan = [];
    public $show2 =true;
    public $inputharta = [];
    public $k = 0;
    public $totalPinjamanPerumahanSendiri = 0;
    public $totalPinjamanPerumahanPasangan = 0;
    public $totalPinjamanKenderaanSendiri = 0;
    public $totalPinjamanKenderaanPasangan = 0;
    public $totalAnsuranPerumahanSendiri = 0;
    public $totalAnsuranPerumahanPasangan = 0;
    public $totalAnsuranKenderaanSendiri = 0;
    public $totalAnsuranKenderaanPasangan = 0;

    public function mount()
    {
        $this->cara_perolehan[] = '';               //select disabled hidden
        $this->cara_belian[] = '';
        $this->hubungan_pemilik[] = '';
        $this->jenis_pemilikan_bersama[] = '';
        $this->showhubungan[] = 0;
        $this->showjenispemilikan[] = 0;
        $this->showbelian[] = 0;
        $this->show[] = 0;

        // $this->gaji_pasangan = 0;
        // $this->jumlah_imbuhan = 0;
        // $this->jumlah_imbuhan_pasangan = 0;
        // $this->sewa = 0;
        // $this->sewa_pasangan = 0;
        // $this->jumlah_cukai_pegawai = 0;
        // $this->bulanan_cukai_pegawai = 0;
        // $this->jumlah_cukai_pasangan = 0;
        // $this->bulanan_cukai_pasangan = 0;
        // $this->jumlah_koperasi_pegawai = 0;
        // $this->bulanan_koperasi_pegawai = 0;
        // $this->jumlah_koperasi_pasangan = 0;
        // $this->bulanan_koperasi_pasangan = 0;

    }
    public function validatorform(){
      $username =Auth::user()->username;

      // $maklumat_pasangan_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();
      $user_check = UserExistingStaffInfo::where('USERNAME', $username) ->first('STAFFNO');
      
      $maklumat_pasangan_check = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO', $user_check->STAFFNO) ->get();

      if($maklumat_pasangan_check->isEmpty()){
        $this->validate([
          'pekerjaan_pasangan' => 'nullable|string',
          'gaji_pasangan' => 'nullable|numeric',
          'jumlah_imbuhan' => 'nullable|numeric',
          'jumlah_imbuhan_pasangan' => 'nullable|numeric',
          'sewa' => 'nullable|numeric',
          'sewa_pasangan' => 'nullable|numeric',

          'pinjaman_perumahan_pegawai' => 'nullable|numeric',
          'bulanan_perumahan_pegawai' => 'nullable|numeric',
          'pinjaman_perumahan_pasangan' => 'nullable|numeric',
          'bulanan_perumahan_pasangan' => 'nullable|numeric',
          'pinjaman_kenderaan_pegawai' => 'nullable|numeric',
          'bulanan_kenderaan_pegawai' => 'nullable|numeric',
          'pinjaman_kenderaan_pasangan' => 'nullable|numeric',
          'bulanan_kenderaan_pasangan' => 'nullable|numeric',
          'jumlah_cukai_pegawai' => 'nullable|numeric',
          'bulanan_cukai_pegawai' => 'nullable|numeric',
          'jumlah_cukai_pasangan' => 'nullable|numeric',
          'bulanan_cukai_pasangan' => 'nullable|numeric',
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
          'sewa_pasangan' => 'nullable|numeric',

          'pinjaman_perumahan_pegawai' => 'nullable|numeric',
          'bulanan_perumahan_pegawai' => 'nullable|numeric',
          'pinjaman_perumahan_pasangan' => 'nullable|numeric',
          'bulanan_perumahan_pasangan' => 'nullable|numeric',
          'pinjaman_kenderaan_pegawai' => 'nullable|numeric',
          'bulanan_kenderaan_pegawai' => 'nullable|numeric',
          'pinjaman_kenderaan_pasangan' => 'nullable|numeric',
          'bulanan_kenderaan_pasangan' => 'nullable|numeric',
          'jumlah_cukai_pegawai' => 'nullable|numeric',
          'bulanan_cukai_pegawai' => 'nullable|numeric',
          'jumlah_cukai_pasangan' => 'nullable|numeric',
          'bulanan_cukai_pasangan' => 'nullable|numeric',
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
        'gaji_pasangan' => 'nullable|numeric',
        'jumlah_imbuhan' => 'nullable|numeric',
        'jumlah_imbuhan_pasangan' => 'nullable|numeric',
        'sewa' => 'nullable|numeric',
        'sewa_pasangan' => 'nullable|numeric',

        'pinjaman_perumahan_pegawai' => 'nullable|numeric',
        'bulanan_perumahan_pegawai' => 'nullable|numeric',
        'pinjaman_perumahan_pasangan' => 'nullable|numeric',
        'bulanan_perumahan_pasangan' => 'nullable|numeric',
        'pinjaman_kenderaan_pegawai' => 'nullable|numeric',
        'bulanan_kenderaan_pegawai' => 'nullable|numeric',
        'pinjaman_kenderaan_pasangan' => 'nullable|numeric',
        'bulanan_kenderaan_pasangan' => 'nullable|numeric',
        'jumlah_cukai_pegawai' => 'nullable|numeric',
        'bulanan_cukai_pegawai' => 'nullable|numeric',
        'jumlah_cukai_pasangan' => 'nullable|numeric',
        'bulanan_cukai_pasangan' => 'nullable|numeric',
        'jumlah_koperasi_pegawai' => 'nullable|numeric',
        'bulanan_koperasi_pegawai' => 'nullable|numeric',
        'jumlah_koperasi_pasangan' => 'nullable|numeric',
        'bulanan_koperasi_pasangan' => 'nullable|numeric',
        'pengakuan' => 'required',
    ];

    public function render()
    {
      $jenisHarta = JenisHarta::get();
      //data gaji user (latest)
      $username =Auth::user()->username;
      // $staffinfo= null;
      $staffinfo = UserExistingStaffInfo::where('USERNAME', $username)->get();
      // dd($staffinfo);

      //data dari form latest
      $userid = Auth::user()->id;
      $data_user = FormBModel::where('user_id', $userid) ->get();

      // $status_sedang_diproses = FormB::where('user_id', $userid)->where('status',"Sedang Diproses") ->get();

      $draft_exist = FormBModel::where('user_id', auth()->user()->id)->where('status', 'Disimpan ke Draf')->first();
      $status_form = FormBModel::where('user_id', auth()->user()->id)->latest()->first();

      $this->nama_pegawai = Auth::user()->name;
      $this->alamat_tempat_bertugas = Auth::user()->alamat_tempat_bertugas;
      foreach($staffinfo as $data){
        $this->kad_pengenalan = $data->ICNUMBER;
        $this->jawatan = $data->GRADE;
        $this->jabatan = $data->OLEVEL5NAME;
        $this->gaji = $data->SALARY;
        $this->no_staff = $data->STAFFNO;
      }
      $user_check = UserExistingStaffInfo::where('USERNAME', $username) ->first('STAFFNO');
      $user = UserExistingStaffInfo::where('USERNAME', $username) ->get('STAFFNO');

      // dd($user->STAFFNO);
      $maklumat_pasangan_check = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO', $user_check->STAFFNO) ->get();
      $maklumat_anak_check = UserExistingStaffNextofKin::where('RELATIONSHIP','S')->orwhere('RELATIONSHIP','D')->where('STAFFNO', $user_check->STAFFNO) ->get();

      if($maklumat_pasangan_check->isEmpty()){
        $maklumat_pasangan = null;
      }
      else{
        foreach ($user as $keluarga) {
          $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
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
          $maklumat_anak = $maklumat_anak_lelaki->mergeRecursive($maklumat_anak_perempuan);
          }
      }
        return view('livewire.form-b', compact('jenisHarta', 'staffinfo', 'maklumat_pasangan', 'maklumat_anak'));
    }

    public function loadData()
    {
        #initilize data here

        $userid = auth()->user()->id;
        $data_user = FormBModel::where('user_id', $userid)->latest()->first();
        // dd($data_user);
        if($data_user){

            $this->gaji_pasangan =number_format((float)$data_user->gaji_pasangan,2,'.','') ?? null;
            $this->pekerjaan_pasangan =$data_user->pekerjaan_pasangan ?? null;
            $this->jumlah_imbuhan= number_format((float)$data_user->jumlah_imbuhan,2,'.','') ?? null;
            $this->jumlah_imbuhan_pasangan = number_format((float)$data_user->jumlah_imbuhan_pasangan,2,'.','') ?? null;
            $this->sewa =number_format((float)$data_user->sewa,2,'.','') ?? null;
            $this->sewa_pasangan = number_format((float)$data_user->sewa_pasangan,2,'.','') ?? null;
            $this->pinjaman_perumahan_pegawai = number_format((float)$data_user->pinjaman_perumahan_pegawai,2,'.','') ?? null;
            $this->bulanan_perumahan_pegawai = number_format((float)$data_user->bulanan_perumahan_pegawai,2,'.','') ?? null;
            $this->pinjaman_perumahan_pasangan = number_format((float)$data_user->pinjaman_perumahan_pasangan,2,'.','') ?? null;
            $this->bulanan_perumahan_pasangan = number_format((float)$data_user->bulanan_perumahan_pasangan,2,'.','') ?? null;
            $this->pinjaman_kenderaan_pegawai = number_format((float)$data_user->pinjaman_kenderaan_pegawai,2,'.','') ?? null;
            $this->bulanan_kenderaan_pegawai = number_format((float)$data_user->bulanan_kenderaan_pegawai,2,'.','') ?? null;
            $this->pinjaman_kenderaan_pasangan = number_format((float)$data_user->pinjaman_kenderaan_pasangan,2,'.','') ?? null;
            $this->bulanan_kenderaan_pasangan = number_format((float)$data_user->bulanan_kenderaan_pasangan,2,'.','') ?? null;
            $this->jumlah_cukai_pegawai = number_format((float)$data_user->jumlah_cukai_pegawai,2,'.','') ?? null;
            $this->jumlah_cukai_pasangan = number_format((float)$data_user->jumlah_cukai_pasangan,2,'.','') ?? null;
            // $this->bulanan_cukai_pegawai = $data_user->bulanan_cukai_pegawai ?? null;
            // $this->bulanan_cukai_pasangan = $data_user->bulanan_cukai_pasangan ?? null;
            $this->jumlah_koperasi_pegawai = number_format((float)$data_user->jumlah_koperasi_pegawai,2,'.','') ?? null;
            $this->bulanan_koperasi_pegawai = number_format((float)$data_user->bulanan_koperasi_pegawai,2,'.','') ?? null;
            $this->jumlah_koperasi_pasangan = number_format((float)$data_user->jumlah_koperasi_pasangan,2,'.','') ?? null;
            $this->bulanan_koperasi_pasangan = number_format((float)$data_user->bulanan_koperasi_pasangan,2,'.','') ?? null;
        }

        $username =Auth::user()->username;
        $user = UserExistingStaffInfo::where('USERNAME', $username) ->get('STAFFNO');
        $maklumat_pasangan_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();
        $maklumat_anak_check = UserExistingStaffInfo::where('USERNAME', $username) ->get();

        if($maklumat_pasangan_check->isEmpty()){
          $maklumat_pasangan = null;
        }
        else{
          foreach ($user as $keluarga) {
            $maklumat_pasangan = UserExistingStaffNextofKin::where('RELATIONSHIP','SP')->where('STAFFNO',$keluarga->STAFFNO)->get();
          }
          // dd($maklumat_pasangan);
          foreach ($maklumat_pasangan as $data) {
            $this->pekerjaan_pasangan = $data->NOKEMLOYER;
          }
        }

    }

    public function addformdividen($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputdividen, $i);
    }

    public function removedividen($i)
    {
        unset($this->inputdividen[$i]);
    }

    public function validatordividen($i){
      $this->validate([

      'dividen_1.'.$i => 'nullable|string',
      'dividen_1_pegawai.'.$i => 'nullable|numeric',
      'dividen_pasangan.'.$i => 'nullable|numeric',
      ]);
    }

    public function storedividen()
    {
        if($this->dividen_1)
            $counter = count($this->dividen_1);
        else
            $counter = 0;

       for ($key=0; $key < $counter ; $key++) {
        DividenB::create([
            'dividen_1' => $this->dividen_1[$key],
            'dividen_1_pegawai' => $this->dividen_1_pegawai[$key] ?? 0,
            'dividen_1_pasangan' => $this->dividen_pasangan[$key] ?? 0,
            'formbs_id' => $this->formbid_created,
        ]);
      }
    }

    public function addformpinjaman($j)
    {
        $j = $j + 1;
        $this->j = $j;
        array_push($this->inputpinjaman ,$j);
    }

    public function removepinjaman($j)
    {
        // dd($i);
        unset($this->inputpinjaman[$j]);
    }

    public function validatorpinjaman($j){
      $this->validate([

      'lain_lain_pinjaman.'.$j => 'nullable|string',
      'pinjaman_pegawai.'.$j => 'nullable|numeric',
      'bulanan_pegawai.'.$j => 'nullable|numeric',
      'pinjaman_pasangan.'.$j => 'nullable|numeric',
      'bulanan_pasangan.'.$j => 'nullable|numeric',
      ]);
    }

    public function storepinjaman()
    {
        if($this->lain_lain_pinjaman)
            $counter = count($this->lain_lain_pinjaman);
        else
            $counter = 0;

        for ($key=0; $key < $counter; $key++) {
            PinjamanB::create ([
                'lain_lain_pinjaman' => $this->lain_lain_pinjaman[$key],
                'pinjaman_pegawai' => $this->pinjaman_pegawai[$key]?? 0,
                'bulanan_pegawai' => $this->bulanan_pegawai[$key]?? 0,
                'pinjaman_pasangan' => $this->pinjaman_pasangan[$key]?? 0,
                'bulanan_pasangan' => $this->bulanan_pasangan[$key]?? 0,
                'formbs_id' =>$this->formbid_created,
            ]);
        }
    }

    public function addformharta($k)
    {
        $k = $k + 1;
        $this->k = $k;

        $this->hubungan_pemilik[$k] = '';
        $this->cara_belian[$k] = '';
        $this->cara_perolehan[$k] = '';
        $this->jenis_pemilikan_bersama[$k] = '';

        array_push($this->inputharta, $k);
        array_push($this->showhubungan, 0);
        array_push($this->showjenispemilikan, 0);
        array_push($this->showbelian, 0);
        array_push($this->show, 0);
    }

    public function removeharta($k)
    {
        $k = $k + 1;
        $k = $k - 1;
        $this->k = $k;
        // dd($this->k);
        $this->hubungan_pemilik[$k+1] = '';
        $this->cara_belian[$k+1] = '';
        $this->cara_perolehan[$k+1] = '';
        $this->jenis_pemilikan_bersama[$k+1] = '';


        unset($this->inputharta[$k]);
        unset($this->showhubungan[$k+1]);
        unset($this->showjenispemilikan[$k+1]);
        unset($this->showbelian[$k+1]);
        unset($this->show[$k+1]);

        $this->calculatePinjaman();
    }

    public function showForm($k)
    {
        $this->showbelian[$k] = 0; // $this->showbelian = 0;

        if ($this->cara_perolehan[$k] == "Dipusakai" || $this->cara_perolehan[$k] == "Dihadiahkan") {
            $this->show[$k] = 1;
            $this->cara_belian[$k]= '';
        } else if ($this->cara_perolehan[$k] == "Dibeli") {
            $this->show[$k] = 2;
        } else if ($this->cara_perolehan[$k] == "Lain-lain") {
            $this->show[$k] = 3;
            $this->cara_belian[$k]= '';
        } else {
            $this->show[$k] = 0;
            $this->cara_belian[$k]= '';
        }

    }

    public function showFormBelian($k)
    {
            if ($this->cara_belian[$k] == "Pinjaman") {
                $this->showbelian[$k] = 1;
            } else if ($this->cara_belian[$k] == "Pelupusan") {
                $this->showbelian[$k] = 2;
            } else if ($this->cara_belian[$k] == "Tunai") {
              $this->showbelian[$k] = 3;
            }
    }

    public function showFormHubungan($k)
    {
        if ($this->hubungan_pemilik[$k] == "Bersama") {
            $this->showhubungan[$k] = 1;
        } else if ($this->hubungan_pemilik[$k] == "Lain-lain") {
            $this->showhubungan[$k] = 2;
              $this->showjenispemilikan[$k] = 0;
        } else{
            $this->showhubungan[$k] = 0;
            $this->showjenispemilikan[$k] = 0;
            $this->jenis_pemilikan_bersama[$k] = '';
            $this->nama_pemilik_bersama[$k] = '';
            $this->lain_lain_hubungan_bersama[$k] = '';


            // $this->showjenispemilikan[$k] = 0;
        }

    }

    public function showFormJenisPemilikan($k)
    {
        if ($this->jenis_pemilikan_bersama[$k] == "Isteri/Suami") {
            $this->showjenispemilikan[$k] = 1;
        } else if ($this->jenis_pemilikan_bersama[$k] == "Lain-lain") {
            $this->showjenispemilikan[$k] = 2;
        } else{
            $this->showjenispemilikan[$k] = 0;
        }

    }
    public function validatordrafharta($k){
        $this->validate([
            'jenis_harta.'.$k => 'nullable|string',
            'pemilik_harta.'.$k=> 'nullable|string',
            'hubungan_pemilik.'.$k => 'nullable|string',
            'jenis_pemilikan_bersama.'.$k => 'nullable|string',
            'nama_pemilik_bersama.'.$k => 'nullable|string',
            'lain_lain_hubungan.'.$k => 'nullable|string',
            'lain_lain_hubungan_bersama.'.$k => 'nullable|string',
            'maklumat_harta.'.$k => 'nullable|string',
            'tarikh_pemilikan_harta.'.$k => 'nullable|date',
            'bilangan.'.$k => 'nullable|numeric',
            'nilai_perolehan.'.$k => 'nullable|numeric',
            'cara_perolehan.'.$k => 'nullable|string',
            'nama_pemilikan_asal.'.$k => 'nullable|string',
            'cara_belian.'.$k => 'nullable|string',
            'lain_lain.'.$k => 'nullable|string',
            'jumlah_pinjaman.'.$k => 'nullable|numeric',
            'institusi_pinjaman.'.$k => 'nullable|string',
            'tempoh_bayar_balik.'.$k => 'nullable|string',
            'ansuran_bulanan.'.$k => 'nullable|numeric',
            'tarikh_ansuran_pertama.'.$k => 'nullable|date',
            'jenis_harta_pelupusan.'.$k => 'nullable|string',
            'alamat_asset.'.$k => 'nullable|string',
            'no_pendaftaran.'.$k => 'nullable|string',
            'harga_jualan.'.$k => 'nullable|numeric',
            'tarikh_lupus.'.$k => 'nullable|date',
        ]);
    }

    public function validatorharta($k){
        $this->validate([
            'jenis_harta.'.$k => 'required|string',
            'pemilik_harta.'.$k=> 'required|string',
            'hubungan_pemilik.'.$k => 'required|string',
            'jenis_pemilikan_bersama.'.$k => 'required_if:hubungan_pemilik.'.$k.',Bersama|string',
            'nama_pemilik_bersama.'.$k => 'required_if:jenis_pemilikan_bersama.'.$k.',Isteri/Suami|string',
            'lain_lain_hubungan.'.$k => 'required_if:hubungan_pemilik.'.$k.',Lain-lain|string',
            'lain_lain_hubungan_bersama.'.$k => 'required_if:jenis_pemilikan_bersama.'.$k.',Lain-lain|string',
            'maklumat_harta.'.$k => 'required|string',
            'tarikh_pemilikan_harta.'.$k => 'required|date',
            'bilangan.'.$k => 'required|numeric',
            'nilai_perolehan.'.$k => 'required|numeric',
            'cara_perolehan.'.$k => 'required|string',
            'nama_pemilikan_asal.'.$k => 'required_if:cara_perolehan.'.$k.',Dipusakai||required_if:cara_perolehan.'.$k.',Dihadiahkan|string',
            'cara_belian.'.$k => 'required_if:cara_perolehan.'.$k.',Dibeli|string',
            'lain_lain.'.$k => 'required_if:cara_perolehan.'.$k.',Lain-lain|string',
            'jumlah_pinjaman.'.$k => 'required_if:cara_belian.'.$k.',Pinjaman|numeric',
            'institusi_pinjaman.'.$k => 'required_if:cara_belian.'.$k.',Pinjaman|string',
            'tempoh_bayar_balik.'.$k => 'required_if:cara_belian.'.$k.',Pinjaman|string',
            'ansuran_bulanan.'.$k => 'required_if:cara_belian.'.$k.',Pinjaman|numeric',
            'tarikh_ansuran_pertama.'.$k => 'required_if:cara_belian.'.$k.',Pinjaman|date',
            'jenis_harta_pelupusan.'.$k => 'required_if:cara_belian.'.$k.',Pelupusan|string',
            'alamat_asset.'.$k => 'required_if:cara_belian.'.$k.',Pelupusan|string',
            'no_pendaftaran.'.$k => 'required_if:cara_belian.'.$k.',Pelupusan|string',
            'harga_jualan.'.$k => 'required_if:cara_belian.'.$k.',Pelupusan|numeric',
            'tarikh_lupus.'.$k => 'required_if:cara_belian.'.$k.',Pelupusan|date',
        ]);
    }

    public function storeharta($action)
    {
        if($this->jenis_harta)
            $counter = count($this->jenis_harta);
        else
            $counter = 0;

        for ($key=0; $key < $counter; $key++) {
            HartaB::create ([
                'jenis_harta' => $this->jenis_harta[$key] ?? null,
                'pemilik_harta' => $this->pemilik_harta[$key] ?? null,
                'hubungan_pemilik' => $this->hubungan_pemilik[$key] ?? null,
                'jenis_pemilikan_bersama' => $this->jenis_pemilikan_bersama[$key] ?? null,
                'nama_pemilik_bersama' => $this->nama_pemilik_bersama[$key] ?? null,
                'lain_lain_hubungan_bersama' => $this->lain_lain_hubungan_bersama[$key] ?? null,
                'lain_lain_hubungan' => $this->lain_lain_hubungan[$key] ?? null,
                'maklumat_harta' => $this->maklumat_harta[$key] ?? null,
                'tarikh_pemilikan_harta' => $this->tarikh_pemilikan_harta[$key] ?? null,
                'bilangan' => $this->bilangan[$key] ?? null,
                'unit_bilangan' => $this->unit_bilangan[$key] ?? null,
                'nilai_perolehan' => $this->nilai_perolehan[$key] ?? null,
                'cara_perolehan' => $this->cara_perolehan[$key] ?? null,
                'nama_pemilikan_asal' => $this->nama_pemilikan_asal[$key] ?? null,
                'cara_belian' => $this->cara_belian[$key] ?? null,
                'lain_lain' => $this->lain_lain[$key] ?? null,
                'tunai' => $this->tunai[$key] ?? null,
                'sumber_tunai' => $this->sumber_tunai[$key] ?? null,
                'jumlah_pinjaman' => $this->jumlah_pinjaman[$key] ?? null,
                'institusi_pinjaman' => $this->institusi_pinjaman[$key] ?? null,
                'tempoh_bayar_balik' => $this->tempoh_bayar_balik[$key] ?? null,
                'ansuran_bulanan' => $this->ansuran_bulanan[$key] ?? null,
                'tarikh_ansuran_pertama' => $this->tarikh_ansuran_pertama[$key] ?? null,
                'keterangan_lain' => $this->keterangan_lain[$key] ?? null,
                'jenis_harta_pelupusan' => $this->jenis_harta_pelupusan[$key] ?? null,
                'alamat_asset' => $this->alamat_asset[$key] ?? null,
                'no_pendaftaran' => $this->no_pendaftaran[$key] ?? null,
                'harga_jualan' => $this->harga_jualan[$key] ?? null,
                'tarikh_lupus' => $this->tarikh_lupus[$key] ?? null,
                'formbs_id' =>$this->formbid_created,
            ]);
        }
        for ($key=0; $key < $counter; $key++) {
            if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Sendiri" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanPerumahanSendiri = $this->totalPinjamanPerumahanSendiri + $this->jumlah_pinjaman[$key];
                $this->totalAnsuranPerumahanSendiri = $this->totalAnsuranPerumahanSendiri + $this->ansuran_bulanan[$key];

            }
            else if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanPerumahanPasangan = $this->totalPinjamanPerumahanPasangan + $this->jumlah_pinjaman[$key];
                $this->totalAnsuranPerumahanPasangan = $this->totalAnsuranPerumahanPasangan + $this->ansuran_bulanan[$key];

            }

            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Sendiri" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanKenderaanSendiri = $this->totalPinjamanKenderaanSendiri + $this->jumlah_pinjaman[$key];
                $this->totalAnsuranKenderaanSendiri = $this->totalAnsuranKenderaanSendiri + $this->ansuran_bulanan[$key];


            }
            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanKenderaanPasangan = $this->totalPinjamanKenderaanPasangan + $this->jumlah_pinjaman[$key];
                $this->totalAnsuranKenderaanPasangan = $this->totalAnsuranKenderaanPasangan + $this->ansuran_bulanan[$key];
            }
            //pengiraan jumlah untuk milikan bersama
            if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanPerumahanSendiri = $this->totalPinjamanPerumahanSendiri + ($this->jumlah_pinjaman[$key]/2);
                $this->totalAnsuranPerumahanSendiri = $this->totalAnsuranPerumahanSendiri + ($this->ansuran_bulanan[$key]/2);
                $this->totalPinjamanPerumahanPasangan = $this->totalPinjamanPerumahanPasangan + ($this->jumlah_pinjaman[$key]/2);
                $this->totalAnsuranPerumahanPasangan = $this->totalAnsuranPerumahanPasangan + ($this->ansuran_bulanan[$key]/2);

            }
            else if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Lain-lain" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanPerumahanSendiri = $this->totalPinjamanPerumahanSendiri + ($this->jumlah_pinjaman[$key]/2);
                $this->totalAnsuranPerumahanSendiri = $this->totalAnsuranPerumahanSendiri + ($this->ansuran_bulanan[$key]/2);

            }

            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanKenderaanSendiri = $this->totalPinjamanKenderaanSendiri + ($this->jumlah_pinjaman[$key]/2);
                $this->totalAnsuranKenderaanSendiri = $this->totalAnsuranKenderaanSendiri + ($this->ansuran_bulanan[$key]/2);
                $this->totalPinjamanKenderaanPasangan = $this->totalPinjamanKenderaanPasangan + ($this->jumlah_pinjaman[$key]/2);
                $this->totalAnsuranKenderaanPasangan = $this->totalAnsuranKenderaanPasangan + ($this->ansuran_bulanan[$key]/2);


            }
            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Lain-lain" && $this->cara_belian[$key] == "Pinjaman"){
                $this->totalPinjamanKenderaanSendiri = $this->totalPinjamanKenderaanSendiri + ($this->jumlah_pinjaman[$key]/2);
                $this->totalAnsuranKenderaanSendiri = $this->totalAnsuranKenderaanSendiri + ($this->ansuran_bulanan[$key]/2);
            }

        }


        $this->updatePinjaman($this->totalPinjamanPerumahanSendiri,$this->totalAnsuranPerumahanSendiri,$this->totalPinjamanPerumahanPasangan,$this->totalAnsuranPerumahanPasangan,
        $this->totalPinjamanKenderaanSendiri,$this->totalAnsuranKenderaanSendiri,  $this->totalPinjamanKenderaanPasangan,$this->totalAnsuranKenderaanPasangan,$action);

    }

    public function store($action)
    {

        if ($action == 'hantar') {
            //masuk semua validation
            // $this->validate();
            for ($i=0; $i <= $this->i; $i++) {
                  $this-> validatordividen($i);
            }
            for ($i=0; $i <= $this->j; $i++) {
                  $this-> validatorpinjaman($i);
            }
            for ($i=0; $i <= $this->k; $i++) {
                  $this-> validatorharta($i);
            }

            $this->validatorform();

            $this->simpan($action);
        }
        else{
            for ($i=0; $i <= $this->i; $i++) {
                  $this-> validatordividen($i);
            }
            for ($i=0; $i <= $this->j; $i++) {
                  $this-> validatorpinjaman($i);
            }
            for ($i=0; $i <= $this->k; $i++) {
                  $this-> validatordrafharta($i);
            }
            $this->simpan($action); // FormB.php -> simpan()
        }

    }

    public function simpan($action)
    {
      // dd($this->pekerjaan_pasangan);
        if ($action == 'hantar') {
          // $this->validatorform();
            $status ="Sedang Diproses";
        }else{
            $status ="Disimpan ke Draf";
        }
        $id_user = auth()->user()->id;
// dd($this);
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
        if (empty($this->bulanan_cukai_pegawai)) {
          $this->bulanan_cukai_pegawai = null;
        }
        if (empty($this->jumlah_cukai_pasangan)) {
          $this->jumlah_cukai_pasangan = null;
        }
        if (empty($this->bulanan_cukai_pasangan )) {
          $this->bulanan_cukai_pasangan  = null;
        }
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


        $formbs = FormBModel::create([
            'no_staff' => $this->no_staff ?? null,
            'nama_pegawai' => $this->nama_pegawai ?? null,
            'kad_pengenalan' => $this->kad_pengenalan ?? null,
            'jawatan' => $this->jawatan ?? null,
            'pekerjaan_pasangan' => $this->pekerjaan_pasangan ?? null,
            'alamat_tempat_bertugas' => $this->alamat_tempat_bertugas ?? null,
            'jabatan' => $this->jabatan ?? null,
            'gaji' => $this->gaji ?? 0,
            'gaji_pasangan' => $this->gaji_pasangan ?? 0,
            'jumlah_imbuhan' => $this->jumlah_imbuhan ?? 0,
            'jumlah_imbuhan_pasangan' => $this->jumlah_imbuhan_pasangan ?? 0,
            'sewa' => $this->sewa ?? 0,
            'sewa_pasangan' => $this->sewa_pasangan ?? 0,
            'pinjaman_perumahan_pegawai' => $this->pinjaman_perumahan_pegawai ?? 0,
            'bulanan_perumahan_pegawai' => $this->bulanan_perumahan_pegawai ?? 0,
            'pinjaman_perumahan_pasangan' => $this->pinjaman_perumahan_pasangan ?? 0,
            'bulanan_perumahan_pasangan' => $this->bulanan_perumahan_pasangan ?? 0,
            'pinjaman_kenderaan_pegawai' => $this->pinjaman_kenderaan_pegawai ?? 0,
            'bulanan_kenderaan_pegawai' => $this->bulanan_kenderaan_pegawai ?? 0,
            'pinjaman_kenderaan_pasangan' => $this->pinjaman_kenderaan_pasangan ?? 0,
            'bulanan_kenderaan_pasangan' => $this->bulanan_kenderaan_pasangan ?? 0,
            'jumlah_cukai_pegawai' => $this->jumlah_cukai_pegawai ?? 0,
            // 'bulanan_cukai_pegawai' => $this->bulanan_cukai_pegawai ?? 0,
            'jumlah_cukai_pasangan' => $this->jumlah_cukai_pasangan ?? 0,
            // 'bulanan_cukai_pasangan' => $this->bulanan_cukai_pasangan ?? 0,
            'jumlah_koperasi_pegawai' => $this->jumlah_koperasi_pegawai ?? 0,
            'bulanan_koperasi_pegawai' => $this->bulanan_koperasi_pegawai ?? 0,
            'jumlah_koperasi_pasangan' => $this->jumlah_koperasi_pasangan ?? 0,
            'bulanan_koperasi_pasangan' => $this->bulanan_koperasi_pasangan ?? 0,
            'status' => $status,
            'user_id'=>$id_user

        ]);
        $this->formbid_created = $formbs->id;
        // dd($this->formbid_created);
        $this->storedividen();
        $this->storepinjaman();
        $this->storeharta($action);

        $this->resetInputFields();

    }

    private function resetInputFields()
    {
        $this->lain_lain_pinjaman = null;
        $this->gaji_pasangan = null;
        $this->jumlah_imbuhan = null;
        $this->jumlah_imbuhan_pasangan = null;
        $this->sewa = null;
        $this->sewa_pasangan = null;
        $this->pinjaman_perumahan_pegawai = null;
        $this->bulanan_perumahan_pegawai = null;
        $this->pinjaman_perumahan_pasangan = null;
        $this->bulanan_perumahan_pasangan = null;
        $this->pinjaman_kenderaan_pegawai = null;
        $this->bulanan_kenderaan_pegawai = null;
        $this->pinjaman_kenderaan_pasangan = null;
        $this->bulanan_kenderaan_pasangan = null;
        $this->jumlah_cukai_pegawai = null;
        $this->bulanan_cukai_pegawai = null;
        $this->jumlah_cukai_pasangan = null;
        $this->bulanan_cukai_pasangan = null;
        $this->jumlah_koperasi_pegawai = null;
        $this->bulanan_koperasi_pegawai = null;
        $this->jumlah_koperasi_pasangan = null;
        $this->bulanan_koperasi_pasangan = null;
    }

    public function updatePinjaman($totalPinjamanPerumahanSendiri,$totalAnsuranPerumahanSendiri,$totalPinjamanPerumahanPasangan,$totalAnsuranPerumahanPasangan,
    $totalPinjamanKenderaanSendiri,$totalAnsuranKenderaanSendiri,  $totalPinjamanKenderaanPasangan,$totalAnsuranKenderaanPasangan,$action)
    {
        $this->pinjaman_perumahan_pegawai = $totalPinjamanPerumahanSendiri;
        $this->bulanan_perumahan_pegawai = $totalAnsuranPerumahanSendiri;
        $this->pinjaman_perumahan_pasangan = $totalPinjamanPerumahanPasangan;
        $this->bulanan_perumahan_pasangan = $totalAnsuranPerumahanPasangan;
        $this->pinjaman_kenderaan_pegawai = $totalPinjamanKenderaanSendiri;
        $this->bulanan_kenderaan_pegawai = $totalAnsuranKenderaanSendiri;
        $this->pinjaman_kenderaan_pasangan = $totalPinjamanKenderaanPasangan;
        $this->bulanan_kenderaan_pasangan = $totalAnsuranKenderaanPasangan;

        $formb = FormBModel::find($this->formbid_created);
        // dd($room);
            $formb->update([
                'pinjaman_perumahan_pegawai' => $totalPinjamanPerumahanSendiri,
                'bulanan_perumahan_pegawai' => $totalAnsuranPerumahanSendiri,
                'pinjaman_perumahan_pasangan' => $totalPinjamanPerumahanPasangan,
                'bulanan_perumahan_pasangan' =>  $totalAnsuranPerumahanPasangan,
                'pinjaman_kenderaan_pegawai' => $totalPinjamanKenderaanSendiri,
                'bulanan_kenderaan_pegawai' => $totalAnsuranKenderaanSendiri,
                'pinjaman_kenderaan_pasangan' => $totalPinjamanKenderaanPasangan,
                'bulanan_kenderaan_pasangan' => $totalAnsuranKenderaanPasangan,
            ]);

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
    public function calculatePinjaman()
    {      //Calculate Harta
        $data_user = FormBModel::where('user_id', auth()->user()->id)->latest()->first();
        if($data_user){
            $this->pinjaman_perumahan_pegawai = $data_user->pinjaman_perumahan_pegawai ?? null;
            $this->bulanan_perumahan_pegawai = $data_user->bulanan_perumahan_pegawai ?? null;
            $this->pinjaman_perumahan_pasangan = $data_user->pinjaman_perumahan_pasangan ?? null;
            $this->bulanan_perumahan_pasangan = $data_user->bulanan_perumahan_pasangan ?? null;
            $this->pinjaman_kenderaan_pegawai = $data_user->pinjaman_kenderaan_pegawai ?? null;
            $this->bulanan_kenderaan_pegawai = $data_user->bulanan_kenderaan_pegawai ?? null;
            $this->pinjaman_kenderaan_pasangan = $data_user->pinjaman_kenderaan_pasangan ?? null;
            $this->bulanan_kenderaan_pasangan = $data_user->bulanan_kenderaan_pasangan ?? null;
        }else {
          $this->pinjaman_perumahan_pegawai = 0;
          $this->bulanan_perumahan_pegawai = 0;
          $this->pinjaman_perumahan_pasangan = 0;
          $this->bulanan_perumahan_pasangan = 0;
          $this->pinjaman_kenderaan_pegawai = 0;
          $this->bulanan_kenderaan_pegawai = 0;
          $this->pinjaman_kenderaan_pasangan = 0;
          $this->bulanan_kenderaan_pasangan = 0;
          // dd('here');
        }

        if($this->jenis_harta)
            $counter = count($this->jenis_harta);
        else
            $counter = 0;

        for ($key=0; $key < $counter; $key++) {
            if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Sendiri" && $this->cara_belian[$key] == "Pinjaman"){
              if($this->jumlah_pinjaman){
                $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + $pinjaman;
              }
              if($this->ansuran_bulanan){
                $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + $pinjaman;
              }

            }
            else if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){

              if($this->jumlah_pinjaman){
                $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->pinjaman_perumahan_pasangan= $this->pinjaman_perumahan_pasangan + $pinjaman;
              }
              if($this->ansuran_bulanan){
                $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan + $pinjaman;
              }
            }

            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Sendiri" && $this->cara_belian[$key] == "Pinjaman"){
                if($this->jumlah_pinjaman){
                  $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                  if(is_numeric($pinjaman))
                    $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + $pinjaman;
                }
                if($this->ansuran_bulanan){
                  $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                  if(is_numeric($pinjaman))
                    $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + $pinjaman;
                }
            }
            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
              if($this->jumlah_pinjaman){
                $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                if(is_numeric($pinjaman))
                  $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan + $pinjaman;
                }
                if($this->ansuran_bulanan){
                  $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                  if(is_numeric($pinjaman))
                  $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan + $pinjaman;
                }
            }

            //untuk pengiraan hubungan bersama
            else if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
              if($this->jumlah_pinjaman){
                $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + ($pinjaman/2);
                $this->pinjaman_perumahan_pasangan= $this->pinjaman_perumahan_pasangan + ($pinjaman/2);
              }
              if($this->ansuran_bulanan){
                $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + ($pinjaman/2);
                $this->bulanan_perumahan_pasangan = $this->bulanan_perumahan_pasangan + ($pinjaman/2);
              }

            }
            else if($this->jenis_harta[$key] == "Rumah" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Lain-lain" && $this->cara_belian[$key] == "Pinjaman"){

              if($this->jumlah_pinjaman){
                $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->pinjaman_perumahan_pegawai = $this->pinjaman_perumahan_pegawai + ($pinjaman/2);
              }
              if($this->ansuran_bulanan){
                $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->bulanan_perumahan_pegawai = $this->bulanan_perumahan_pegawai + ($pinjaman/2);
              }
            }

            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Isteri/Suami" && $this->cara_belian[$key] == "Pinjaman"){
                if($this->jumlah_pinjaman){
                  $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                  if(is_numeric($pinjaman))
                  $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + ($pinjaman/2);
                  $this->pinjaman_kenderaan_pasangan = $this->pinjaman_kenderaan_pasangan + ($pinjaman/2);
                }
                if($this->ansuran_bulanan){
                  $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                  if(is_numeric($pinjaman))
                  $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + ($pinjaman/2);
                  $this->bulanan_kenderaan_pasangan = $this->bulanan_kenderaan_pasangan + ($pinjaman/2);
                }
            }
            else if($this->jenis_harta[$key] == "Kenderaan" && $this->hubungan_pemilik[$key] == "Bersama" && $this->jenis_pemilikan_bersama[$key] == "Lain-lain" && $this->cara_belian[$key] == "Pinjaman"){
              if($this->jumlah_pinjaman){
                $pinjaman = $this->jumlah_pinjaman[$key] ?? 0;
                if(is_numeric($pinjaman))
                $this->pinjaman_kenderaan_pegawai = $this->pinjaman_kenderaan_pegawai + ($pinjaman/2);
                }
                if($this->ansuran_bulanan){
                  $pinjaman = $this->ansuran_bulanan[$key] ?? 0;
                  if(is_numeric($pinjaman))
                  $this->bulanan_kenderaan_pegawai = $this->bulanan_kenderaan_pegawai + ($pinjaman/2);
                }
            }

        }
    }
}
