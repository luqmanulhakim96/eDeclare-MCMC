<?php

namespace App\Http\Livewire;
use App\PinjamanB;
use App\FormB as FormBModel;

use Livewire\Component;

class FormBTanggungan extends Component
{

    public $pinjaman_perumahan_pegawai, $bulanan_perumahan_pegawai, $pinjaman_perumahan_pasangan,$bulanan_perumahan_pasangan,
    $pinjaman_kenderaan_pegawai,$bulanan_kenderaan_pegawai,$pinjaman_kenderaan_pasangan,$bulanan_kenderaan_pasangan,
    $jumlah_cukai_pegawai,$bulanan_cukai_pegawai,$jumlah_cukai_pasangan,$bulanan_cukai_pasangan,
    $jumlah_koperasi_pegawai,$bulanan_koperasi_pegawai,$jumlah_koperasi_pasangan,$bulanan_koperasi_pasangan,
    $lain_lain_pinjaman, $pinjaman_pegawai, $bulanan_pegawai, $pinjaman_pasangan, $bulanan_pasangan,$action;
    public $updateMode = false;
    public $inputs = [];
    public $i = 0;

    protected $listeners = [
        'tanggungan-process' => 'store',
        'validate-tangungan' => 'validator',
        
    ];

    protected $rules = [
        
        'lain_lain_pinjaman.0' => 'nullable|string',
        'pinjaman_pegawai.0' => 'nullable|numeric',
        'bulanan_pegawai.0' => 'nullable|numeric',
        'pinjaman_pasangan.0' => 'nullable|numeric',
        'bulanan_pasangan.0' => 'nullable|numeric',

        'lain_lain_pinjaman.*' => 'nullable|string',
        'pinjaman_pegawai.*' => 'nullable|numeric',
        'bulanan_pegawai.*' => 'nullable|numeric',
        'pinjaman_pasangan.*' => 'nullable|numeric',
        'bulanan_pasangan.*' => 'nullable|numeric',
        
                //validate
    ];

    public function updated($propertyName)                   //function called everytime user input
    {
        $this->validateOnly($propertyName);
    }

    public function validator($action)
    {
        if ($action == 'hantar') {
            $this->validate();
            // $this->emit('harta-validator', $action);
            $this->emit('simpan-data');
        }
        $this->emit('simpan-data',$action); // FormB.php -> simpan()
    }

    public function addform2($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        // dd($i);
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.form-b-tanggungan');
    }

    public function store($formb)
    {
        if($this->lain_lain_pinjaman)
            $counter = count($this->lain_lain_pinjaman);
        else
            $counter = 0;

        for ($key=0; $key < $counter; $key++) { 
            PinjamanB::create ([
                'lain_lain_pinjaman' => $this->lain_lain_pinjaman[$key],
                'pinjaman_pegawai' => $this->pinjaman_pegawai[$key],
                'bulanan_pegawai' => $this->bulanan_pegawai[$key],
                'pinjaman_pasangan' => $this->pinjaman_pasangan[$key],
                'bulanan_pasangan' => $this->bulanan_pasangan[$key],                
                'formbs_id' =>$formb,
            ]);        
        }
    
        $this->inputs = [];
        $this->resetInputFields();

    }

    private function resetInputFields(){
        $this->lain_lain_pinjaman = null;
        $this->pinjaman_pegawai = null;
        $this->bulanan_pegawai = null;
        $this->pinjaman_pasangan = null;
        $this->bulanan_pasangan = null;
        // $this->sewa_pasangan = '';
        // $this->dividen_1 = '';
        // $this->dividen_1_pegawai = '';
        // $this->dividen_pasangan = '';

    }

    
}
