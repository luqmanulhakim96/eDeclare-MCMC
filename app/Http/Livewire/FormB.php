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
    public $formbid_created;
    public $updateMode = false;

    protected $listeners = [
        'simpan-data' => 'simpan',
        'updatePinjaman' => 'updatePinjaman'
    ];

    protected $rules = [

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
        // 'pengakuan' => 'required',
        //validate
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
        if($data_user){

            $this->gaji_pasangan =$data_user->gaji_pasangan ?? null;
            $this->jumlah_imbuhan= $data_user->jumlah_imbuhan ?? null;
            $this->jumlah_imbuhan_pasangan = $data_user->jumlah_imbuhan_pasangan ?? null;
            $this->sewa = $data_user->sewa ?? null;
            $this->sewa_pasangan = $data_user->sewa_pasangan ?? null;
            $this->pinjaman_perumahan_pegawai = $data_user->pinjaman_perumahan_pegawai ?? null;
            $this->bulanan_perumahan_pegawai = $data_user->bulanan_perumahan_pegawai ?? null;
            $this->pinjaman_perumahan_pasangan = $data_user->pinjaman_perumahan_pasangan ?? null;
            $this->bulanan_perumahan_pasangan = $data_user->bulanan_perumahan_pasangan ?? null;
            $this->pinjaman_kenderaan_pegawai = $data_user->pinjaman_kenderaan_pegawai ?? null;
            $this->bulanan_kenderaan_pegawai = $data_user->bulanan_kenderaan_pegawai ?? null;
            $this->pinjaman_kenderaan_pasangan = $data_user->pinjaman_kenderaan_pasangan ?? null;
            $this->bulanan_kenderaan_pasangan = $data_user->bulanan_kenderaan_pasangan ?? null;
            $this->jumlah_cukai_pegawai = $data_user->jumlah_cukai_pegawai ?? null;
            $this->jumlah_cukai_pasangan = $data_user->jumlah_cukai_pasangan ?? null;
            $this->bulanan_cukai_pegawai = $data_user->bulanan_cukai_pegawai ?? null;
            $this->bulanan_cukai_pasangan = $data_user->bulanan_cukai_pasangan ?? null;
            $this->jumlah_koperasi_pegawai = $data_user->jumlah_koperasi_pegawai ?? null;
            $this->bulanan_koperasi_pegawai = $data_user->bulanan_koperasi_pegawai ?? null;
            $this->jumlah_koperasi_pasangan = $data_user->jumlah_koperasi_pasangan ?? null;
            $this->bulanan_koperasi_pasangan = $data_user->bulanan_koperasi_pasangan ?? null;
        }

    }


    public function store($action)
    {

        if ($action == 'hantar') {
            $this->emit('validate-pendapatan', $action);

            $this->validate();
            // needed to validate, if dont want to validate, dont call.
        }
        else{
            $this->simpan($action); // FormB.php -> simpan()
        }
        // session()->flash('message', 'Permohonan disimpan');
    }

    public function simpan($action)
    {
        // dd($this->gaji_pasangan);
        if ($action == 'hantar') {
          $this->validate();
            $status ="Sedang Diproses";
        }else{
            $status ="Disimpan ke Draf";
        }
        $id_user = auth()->user()->id;


        $formbs = FormBModel::create([
            'no_staff' => $this->no_staff,
            'nama_pegawai' => $this->nama_pegawai,
            'kad_pengenalan' => $this->kad_pengenalan,
            'jawatan' => $this->jawatan,
            'alamat_tempat_bertugas' => $this->alamat_tempat_bertugas,
            'jabatan' => $this->jabatan,
            'gaji' => $this->gaji,
            'gaji_pasangan' => $this->gaji_pasangan,
            'jumlah_imbuhan' => $this->jumlah_imbuhan,
            'jumlah_imbuhan_pasangan' => $this->jumlah_imbuhan_pasangan,
            'sewa' => $this->sewa,
            'sewa_pasangan' => $this->sewa_pasangan,
            'pinjaman_perumahan_pegawai' => $this->pinjaman_perumahan_pegawai,
            'bulanan_perumahan_pegawai' => $this->bulanan_perumahan_pegawai,
            'pinjaman_perumahan_pasangan' => $this->pinjaman_perumahan_pasangan,
            'bulanan_perumahan_pasangan' => $this->bulanan_perumahan_pasangan,
            'pinjaman_kenderaan_pegawai' => $this->pinjaman_kenderaan_pegawai,
            'bulanan_kenderaan_pegawai' => $this->bulanan_kenderaan_pegawai,
            'pinjaman_kenderaan_pasangan' => $this->pinjaman_kenderaan_pasangan,
            'bulanan_kenderaan_pasangan' => $this->bulanan_kenderaan_pasangan,
            'jumlah_cukai_pegawai' => $this->jumlah_cukai_pegawai,
            'bulanan_cukai_pegawai' => $this->bulanan_cukai_pegawai,
            'jumlah_cukai_pasangan' => $this->jumlah_cukai_pasangan,
            'bulanan_cukai_pasangan' => $this->bulanan_cukai_pasangan,
            'jumlah_koperasi_pegawai' => $this->jumlah_koperasi_pegawai,
            'bulanan_koperasi_pegawai' => $this->bulanan_koperasi_pegawai,
            'jumlah_koperasi_pasangan' => $this->jumlah_koperasi_pasangan,
            'bulanan_koperasi_pasangan' => $this->bulanan_koperasi_pasangan,
            'status' => $status,
            'user_id'=>$id_user

        ]);
        $this->formbid_created = $formbs->id;
        // dd($this->formbid_created);
        $this->emit('pendapatan-process', $formbs->id);

        $this->emit('tanggungan-process', $formbs->id);

        $this->emit('harta-process', $formbs->id,$action);

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
}
