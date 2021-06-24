<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\JenisHarta;
use App\FormB as FormBModel;
use App\DividenB;
use App\PinjamanB;
use App\User;
use DB;
use Auth;
use App\Email;
use App\HartaB;

class FormBEdit extends Component
{
    public $id_formb, $idForm;

    public $gaji, $gaji_pasangan, $jumlah_imbuhan, $jumlah_imbuhan_pasangan, $sewa, $sewa_pasangan, $action,
        $pinjaman_perumahan_pegawai, $bulanan_perumahan_pegawai, $pinjaman_perumahan_pasangan, $bulanan_perumahan_pasangan,
        $pinjaman_kenderaan_pegawai, $bulanan_kenderaan_pegawai, $pinjaman_kenderaan_pasangan, $bulanan_kenderaan_pasangan,
        $jumlah_cukai_pegawai, $bulanan_cukai_pegawai, $jumlah_cukai_pasangan, $bulanan_cukai_pasangan, $jumlah_koperasi_pegawai,
        $bulanan_koperasi_pegawai, $jumlah_koperasi_pasangan, $bulanan_koperasi_pasangan;

    public $staffinfo, $last_data_formb , $dividen_user, $pinjaman_user, $maklumat_pasangan ,$maklumat_anak;

    public $show = 0;
    public $showharta = 0;
    public $showbelian = 0;
    public $showhubungan = 0;
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

        //validate
    ];

    public function render()
    {
        return view('livewire.form-b-edit');
    }

    public function loadData(){

        $info = FormBModel::findOrFail($this->id_formb);

        $this->gaji_pasangan = $info->gaji_pasangan;
        $this->jumlah_imbuhan= $info->jumlah_imbuhan;
        $this->jumlah_imbuhan_pasangan = $info->jumlah_imbuhan_pasangan;
        $this->sewa = $info->sewa;
        $this->sewa_pasangan = $info->sewa_pasangan;


        $this->pinjaman_perumahan_pegawai = $info->pinjaman_perumahan_pegawai;
        $this->bulanan_perumahan_pegawai = $info->bulanan_perumahan_pegawai;
        $this->pinjaman_perumahan_pasangan = $info->pinjaman_perumahan_pasangan;
        $this->bulanan_perumahan_pasangan = $info->bulanan_perumahan_pasangan;
        $this->pinjaman_kenderaan_pegawai = $info->pinjaman_kenderaan_pegawai;
        $this->bulanan_kenderaan_pegawai = $info->bulanan_kenderaan_pegawai;
        $this->pinjaman_kenderaan_pasangan = $info->pinjaman_kenderaan_pasangan;
        $this->bulanan_kenderaan_pasangan = $info->bulanan_kenderaan_pasangan;
        $this->jumlah_cukai_pegawai = $info->jumlah_cukai_pegawai;
        $this->jumlah_cukai_pasangan = $info->jumlah_cukai_pasangan;
        $this->bulanan_cukai_pegawai = $info->bulanan_cukai_pegawai;
        $this->bulanan_cukai_pasangan = $info->bulanan_cukai_pasangan;
        $this->jumlah_koperasi_pegawai = $info->jumlah_koperasi_pegawai;
        $this->bulanan_koperasi_pegawai = $info->bulanan_koperasi_pegawai;
        $this->jumlah_koperasi_pasangan = $info->jumlah_koperasi_pasangan;
        $this->bulanan_koperasi_pasangan = $info->bulanan_koperasi_pasangan;

        $listDividenB = DividenB::where('formbs_id', $info->id)->get();

        $listPinjamanB = PinjamanB::where('formbs_id', $info->id)->get();
    }

    public function updated($propertyName)                   //function called everytime user input
    {
        $this->validateOnly($propertyName);
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
    public function updatePinjaman($totalPinjamanPerumahanSendiri,$totalAnsuranPerumahanSendiri,$totalPinjamanPerumahanPasangan,$totalAnsuranPerumahanPasangan,
    $totalPinjamanKenderaanSendiri,$totalAnsuranKenderaanSendiri,  $totalPinjamanKenderaanPasangan,$totalAnsuranKenderaanPasangan,$id)
    {
        $this->pinjaman_perumahan_pegawai = $totalPinjamanPerumahanSendiri;
        $this->bulanan_perumahan_pegawai = $totalAnsuranPerumahanSendiri;
        $this->pinjaman_perumahan_pasangan = $totalPinjamanPerumahanPasangan;
        $this->bulanan_perumahan_pasangan = $totalAnsuranPerumahanPasangan;
        $this->pinjaman_kenderaan_pegawai = $totalPinjamanKenderaanSendiri;
        $this->bulanan_kenderaan_pegawai = $totalAnsuranKenderaanSendiri;
        $this->pinjaman_kenderaan_pasangan = $totalPinjamanKenderaanPasangan;
        $this->bulanan_kenderaan_pasangan = $totalAnsuranKenderaanPasangan;

        $room = FormBModel::find($id);
            $room->update([
                'pinjaman_perumahan_pegawai' => $totalPinjamanPerumahanSendiri,
                'bulanan_perumahan_pegawai' => $totalAnsuranPerumahanSendiri,
                'pinjaman_perumahan_pasangan' => $totalPinjamanPerumahanPasangan,
                'bulanan_perumahan_pasangan' =>  $totalAnsuranPerumahanPasangan,
                'pinjaman_kenderaan_pegawai' => $totalPinjamanKenderaanSendiri,
                'bulanan_kenderaan_pegawai' => $totalAnsuranKenderaanSendiri,
                'pinjaman_kenderaan_pasangan' => $totalPinjamanKenderaanPasangan,
                'bulanan_kenderaan_pasangan' => $totalAnsuranKenderaanPasangan,
            ]);
    
    }
    

    public function simpan($action)
    {
        // dd($this->gaji_pasangan);
        if ($action == 'hantar') {
            $status ="Sedang Diproses";
        }else{
            $status ="Disimpan ke Draf";
        }
        $id_user = auth()->user()->id;


        $formbs = FormBModel::create([
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
            'bulanan_cukai_pasangan' => $this->bulanan_cukai_pasangan,
            'jumlah_koperasi_pegawai' => $this->jumlah_koperasi_pegawai,
            'bulanan_koperasi_pegawai' => $this->bulanan_koperasi_pegawai,
            'jumlah_koperasi_pasangan' => $this->jumlah_koperasi_pasangan,
            'bulanan_koperasi_pasangan' => $this->bulanan_koperasi_pasangan,
            'status' => $status,
            'user_id'=>$id_user

        ]);

        $this->emit('pendapatan-process', $formbs->id);

        $this->emit('tanggungan-process', $formbs->id);

        $this->emit('harta-process', $formbs->id);



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
}
