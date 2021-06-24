<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\DividenB;
// use App\FormB;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;
use App\JenisHarta;
use App\FormB as FormBModel;

class FormB extends Component
{

    public $gaji, $gaji_pasangan, $jumlah_imbuhan, $jumlah_imbuhan_pasangan, $sewa, $sewa_pasangan, $action,
        $pinjaman_perumahan_pegawai, $bulanan_perumahan_pegawai, $pinjaman_perumahan_pasangan, $bulanan_perumahan_pasangan,
        $pinjaman_kenderaan_pegawai, $bulanan_kenderaan_pegawai, $pinjaman_kenderaan_pasangan, $bulanan_kenderaan_pasangan,
        $jumlah_cukai_pegawai, $bulanan_cukai_pegawai, $jumlah_cukai_pasangan, $bulanan_cukai_pasangan, $jumlah_koperasi_pegawai,
        $bulanan_koperasi_pegawai, $jumlah_koperasi_pasangan, $bulanan_koperasi_pasangan;

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
        $jenisHarta = JenisHarta::get();

        $username = auth()->user()->username;
        $staffinfo = null;
        // $userid = auth()->user()->id;
        // $data_user = FormBModel::where('user_id', $userid)->get();

        // if($data_user->isEmpty()){
        // }

        $last_data_formb = null;
        $dividen_user = null;
        $pinjaman_user = null;
        $maklumat_pasangan = null;
        $maklumat_anak = null;

        return view('livewire.form-b', compact('jenisHarta', 'staffinfo', 'maklumat_pasangan', 'maklumat_anak', 'dividen_user', 'last_data_formb', 'pinjaman_user'));
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
