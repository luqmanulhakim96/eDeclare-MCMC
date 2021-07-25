<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\JenisHarta;
use App\HartaB;
use App\FormB as FormBModel;

class FormBKeteranganMengenaiHarta extends Component
{

    public $jenis_harta, $pemilik_harta, $hubungan_pemilik, $maklumat_harta, $tarikh_pemilikan_harta, $bilangan, $nilai_perolehan,
    $cara_perolehan, $nama_pemilikan_asal, $cara_belian, $lain_lain, $jumlah_pinjaman, $institusi_pinjaman, $tempoh_bayar_balik,
    $ansuran_bulanan, $tarikh_ansuran_pertama, $jenis_harta_pelupusan, $alamat_asset, $no_pendaftaran, $harga_jualan, $tarikh_lupus,
    $tunai,$sumber_tunai,$keterangan_lain,$nama_pemilik_bersama,$unit_bilangan,$lain_lain_hubungan;
    public $show = [];
    public $showbelian = [];
    public $showhubungan = [];
    public $show2 =true;

    public $inputs = [];
    public $i = 0;
    public $totalPinjamanPerumahanSendiri = 0;
    public $totalPinjamanPerumahanPasangan = 0;
    public $totalPinjamanKenderaanSendiri = 0;
    public $totalPinjamanKenderaanPasangan = 0;
    public $totalAnsuranPerumahanSendiri = 0;
    public $totalAnsuranPerumahanPasangan = 0;
    public $totalAnsuranKenderaanSendiri = 0;
    public $totalAnsuranKenderaanPasangan = 0;




    protected $listeners = [
        'harta-process' => 'store',
        'harta-validator' => 'validator',
    ];

    // public function updated($propertyName)                   //function called everytime user input
    // {
    //     $this->validateOnly($propertyName);
    // }


    protected $rules = [

        // 'jenis_harta.0' => 'required|string',
        // 'pemilik_harta.0' => 'required|string',
        // 'hubungan_pemilik.0' => 'required|string',
        // 'maklumat_harta.0' => 'required|string',
        // 'tarikh_pemilikan_harta.0' => 'required|date',
        // 'bilangan.0' => 'required|numeric',
        // 'nilai_perolehan.0' => 'required|numeric',
        // 'cara_perolehan.0' => 'required|string',
        // 'nama_pemilikan_asal.0' => 'required_if:cara_perolehan.0,Dipusakai||required_if:cara_perolehan.0,Dihadiahkan|string',
        // 'cara_belian.0' => 'required_if:cara_perolehan.0,Dibeli|string',
        // 'lain_lain.0' => 'required_if:cara_perolehan.0,Lain-lain|string',
        // 'jumlah_pinjaman.0' => 'required_if:cara_belian.0,Pinjaman|numeric',
        // 'institusi_pinjaman.0' => 'required_if:cara_belian.0,Pinjaman|string',
        // 'tempoh_bayar_balik.0' => 'required_if:cara_belian.0,Pinjaman|string',
        // 'ansuran_bulanan.0' => 'required_if:cara_belian.0,Pinjaman|numeric',
        // 'tarikh_ansuran_pertama.0' => 'required_if:cara_belian.0,Pinjaman|date',
        // 'jenis_harta_pelupusan.0' => 'required_if:cara_belian.0,Pelupusan|string',
        // 'alamat_asset.0' => 'required_if:cara_belian.0,Pelupusan|string',
        // 'no_pendaftaran.0' => 'required_if:cara_belian.0,Pelupusan|string',
        // 'harga_jualan.0' => 'required_if:cara_belian.0,Pelupusan|numeric',
        // 'tarikh_lupus.0' => 'required_if:cara_belian.0,Pelupusan|date',
        'jenis_harta' => 'required|array',
        'jenis_harta.*' => 'required|string',
        'pemilik_harta.*' => 'required|string',
        'hubungan_pemilik.*' => 'required|string',
        'maklumat_harta.*' => 'required|string',
        'tarikh_pemilikan_harta.*' => 'required|date',
        'bilangan.*' => 'required|numeric',
        'nilai_perolehan.*' => 'required|numeric',
        'cara_perolehan.*' => 'required|string',
        'nama_pemilikan_asal.*' => 'required_if:cara_perolehan.*,Dipusakai||required_if:cara_perolehan.*,Dihadiahkan|string',
        'cara_belian.*' => 'required_if:cara_perolehan.*,Dibeli|string',
        'lain_lain.*' => 'required_if:cara_perolehan.*,Lain-lain|string',
        'jumlah_pinjaman.*' => 'required_if:cara_belian.*,Pinjaman|numeric',
        'institusi_pinjaman.*' => 'required_if:cara_belian.*,Pinjaman|string',
        'tempoh_bayar_balik.*' => 'required_if:cara_belian.*,Pinjaman|string',
        'ansuran_bulanan.*' => 'required_if:cara_belian.*,Pinjaman|numeric',
        'tarikh_ansuran_pertama.*' => 'required_if:cara_belian.*,Pinjaman|date',
        'jenis_harta_pelupusan.*' => 'required_if:cara_belian.*,Pelupusan|string',
        'alamat_asset.*' => 'required_if:cara_belian.*,Pelupusan|string',
        'no_pendaftaran.*' => 'required_if:cara_belian.*,Pelupusan|string',
        'harga_jualan.*' => 'required_if:cara_belian.*,Pelupusan|numeric',
        'tarikh_lupus.*' => 'required_if:cara_belian.*,Pelupusan|date',
    ];

    public function mount()
    {
        $this->cara_perolehan[] = '';               //select disabled hidden
        $this->cara_belian[] = '';
        $this->hubungan_pemilik[] = '';
        $this->showhubungan[] = 0;
        $this->showbelian[] = 0;
        $this->show[] = 0;

    }

    public function render()
    {
        $jenisHarta = JenisHarta::get();
        $username = auth()->user()->username;
        $staffinfo = null;
        $userid = auth()->user()->id;
        $data_user = FormBModel::where('user_id', $userid)->get();

        $last_data_formb = null;
        $dividen_user = null;
        $pinjaman_user = null;
        $maklumat_pasangan = null;
        $maklumat_anak = null;

        return view('livewire.form-b-keterangan-mengenai-harta', compact('jenisHarta', 'staffinfo', 'maklumat_pasangan', 'maklumat_anak', 'dividen_user', 'last_data_formb', 'pinjaman_user'));
    }

    public function validation($i){
        $this->validate([
            'jenis_harta.'.$i => 'required|string',
            'pemilik_harta.'.$i=> 'required|string',
            'hubungan_pemilik.'.$i => 'required|string',
            'nama_pemilik_bersama.'.$i => 'required_if:hubungan_pemilik.'.$i.',Bersama|string',
            'lain_lain_hubungan.'.$i => 'required_if:hubungan_pemilik.'.$i.',Lain-lain|string',
            'maklumat_harta.'.$i => 'required|string',
            'tarikh_pemilikan_harta.'.$i => 'required|date',
            'bilangan.'.$i => 'required|numeric',
            'nilai_perolehan.'.$i => 'required|numeric',
            'cara_perolehan.'.$i => 'required|string',
            'nama_pemilikan_asal.'.$i => 'required_if:cara_perolehan.'.$i.',Dipusakai||required_if:cara_perolehan.'.$i.',Dihadiahkan|string',
            'cara_belian.'.$i => 'required_if:cara_perolehan.'.$i.',Dibeli|string',
            'lain_lain.'.$i => 'required_if:cara_perolehan.'.$i.',Lain-lain|string',
            'jumlah_pinjaman.'.$i => 'required_if:cara_belian.'.$i.',Pinjaman|numeric',
            'institusi_pinjaman.'.$i => 'required_if:cara_belian.'.$i.',Pinjaman|string',
            'tempoh_bayar_balik.'.$i => 'required_if:cara_belian.'.$i.',Pinjaman|string',
            'ansuran_bulanan.'.$i => 'required_if:cara_belian.'.$i.',Pinjaman|numeric',
            'tarikh_ansuran_pertama.'.$i => 'required_if:cara_belian.'.$i.',Pinjaman|date',
            'jenis_harta_pelupusan.'.$i => 'required_if:cara_belian.'.$i.',Pelupusan|string',
            'alamat_asset.'.$i => 'required_if:cara_belian.'.$i.',Pelupusan|string',
            'no_pendaftaran.'.$i => 'required_if:cara_belian.'.$i.',Pelupusan|string',
            'harga_jualan.'.$i => 'required_if:cara_belian.'.$i.',Pelupusan|numeric',
            'tarikh_lupus.'.$i => 'required_if:cara_belian.'.$i.',Pelupusan|date',
        ]);
    }

    public function validator($action)
    {
        if ($action == 'hantar') {
            // dd($this->i);
            for ($i=0; $i <= $this->i; $i++) {
                $this->validation($i);
            }
            $this->emit('validate-tangungan',$action);
        }
    }

    public function updated($propertyName)                   //function called everytime user input
    {
        $this->validateOnly($propertyName);
    }


    public function addform($i)
    {
        // $this->validation($i);
        $i = $i + 1;
        $this->i = $i;
        $this->hubungan_pemilik[$i] = '';
        $this->cara_belian[$i] = '';
        $this->cara_perolehan[$i] = '';

        array_push($this->inputs, $i);
        array_push($this->showhubungan, 0);
        array_push($this->showbelian, 0);
        array_push($this->show, 0);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        unset($this->showhubungan[$i]);
        unset($this->showbelian[$i]);
        unset($this->show[$i]);

    }

    public function showForm($i)
    {
        // dd($this->cara_perolehan);
        // $this->reset('showbelian'); // $this->showbelian = 0;
        $this->showbelian[$i] = 0; // $this->showbelian = 0;

        // foreach ($this->cara_perolehan as $data) {
        //     if ($data == "Dipusakai" || $data == "Dihadiahkan") {
        //         $this->show = 1;
        //     } else if ($data == "Dibeli") {
        //         $this->show = 2;
        //     } else if ($data == "Lain-lain") {
        //         $this->show = 3;
        //     } else {
        //         $this->show = 0;
        //     }
        // }

        if ($this->cara_perolehan[$i] == "Dipusakai" || $this->cara_perolehan[$i] == "Dihadiahkan") {
            $this->show[$i] = 1;
        } else if ($this->cara_perolehan[$i] == "Dibeli") {
            $this->show[$i] = 2;
        } else if ($this->cara_perolehan[$i] == "Lain-lain") {
            $this->show[$i] = 3;
        } else {
            $this->show[$i] = 0;
        }

    }

    public function showFormBelian($i)
    {
        // foreach ($this->cara_belian as $data) {
        // if ($data == "Pinjaman") {
        //     $this->showbelian = 1;
        // } else if ($data == "Pelupusan") {
        //     $this->showbelian = 2;
        // } else if ($data == "Tunai") {
        // $this->showbelian = 3;
        // }
        // dd($this->showbelian[$i]);
            if ($this->cara_belian[$i] == "Pinjaman") {
                $this->showbelian[$i] = 1;
            } else if ($this->cara_belian[$i] == "Pelupusan") {
                $this->showbelian[$i] = 2;
            } else if ($this->cara_belian[$i] == "Tunai") {
              $this->showbelian[$i] = 3;
            }
    }

    public function showFormHubungan($i)
    {
        // dd($i);
        // $this->reset('showhubungan');
        // foreach ($this->hubungan_pemilik as $data) {
        //     // dd($data);
        // if ($data == "Bersama") {
        //     $this->showhubungan = 1;
        // } else if ($data == "Lain-lain") {
        //     $this->showhubungan = 2;
        // } else{
        //     $this->showhubungan = 0;
        // }
            // dd($data);

        if ($this->hubungan_pemilik[$i] == "Bersama") {
            $this->showhubungan[$i] = 1;
        } else if ($this->hubungan_pemilik[$i] == "Lain-lain") {
            $this->showhubungan[$i] = 2;
        } else{
            $this->showhubungan[$i] = 0;
        }


    }

    public function store($formb,$action)
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
                'nama_pemilik_bersama' => $this->nama_pemilik_bersama[$key] ?? null,
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
                'formbs_id' =>$formb,
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

        }
        // dd($this->totalPinjamanKenderaanPasangan);


        $this->emit('updatePinjaman',$this->totalPinjamanPerumahanSendiri,$this->totalAnsuranPerumahanSendiri,$this->totalPinjamanPerumahanPasangan,$this->totalAnsuranPerumahanPasangan,
        $this->totalPinjamanKenderaanSendiri,$this->totalAnsuranKenderaanSendiri,  $this->totalPinjamanKenderaanPasangan,$this->totalAnsuranKenderaanPasangan,$action);
        // $this->inputs = [];
        // $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->jenis_harta = null;
        $this->pemilik_harta = null;
        $this->hubungan_pemilik = null;
        $this->nama_pemilik_bersama = null;
        $this->lain_lain_hubungan = null;
        $this->maklumat_harta = null;
        $this->tarikh_pemilikan_harta = null;
        $this->bilangan = null;
        $this->nilai_perolehan = null;
        $this->cara_perolehan = null;
        $this->nama_pemilikan_asal = null;
        $this->cara_belian = null;
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
        $this->showhubungan[] = 0;
        $this->show[] = 0;
        $this->showbelian[] = 0;
    }
}
