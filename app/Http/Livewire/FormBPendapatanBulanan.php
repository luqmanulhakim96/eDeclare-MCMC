<?php

namespace App\Http\Livewire;

use App\JenisHarta;
use App\DividenB;
use App\FormB as FormBModel;
use Livewire\Component;

class FormBPendapatanBulanan extends Component
{

    public $dividen_1, $dividen_1_pegawai, $DividenB, $dividen_pasangan, $action, $formb_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 0;

    protected $listeners = [
        'pendapatan-process' => 'store',
        'validate-pendapatan' => 'validator',
    ];

    protected $rules = [

        'dividen_1.0' => 'nullable|string',
        'dividen_1_pegawai.0' => 'nullable|numeric',
        'dividen_pasangan.0' => 'nullable|numeric',

        'dividen_1.*' => 'nullable|string',
        'dividen_1_pegawai.*' => 'nullable|numeric',
        'dividen_pasangan.*' => 'nullable|numeric',
        //validate
    ];

    public function validator($action)
    {
        if ($action == 'hantar') {
            $this->validate();
            $this->emit('harta-validator', $action);
        }
    }

    public function updated($propertyName)                   //function called everytime user input
    {
        $this->validateOnly($propertyName);
    }

    public function addform($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
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
        return view('livewire.form-b-pendapatan-bulanan', compact('jenisHarta', 'staffinfo', 'maklumat_pasangan', 'maklumat_anak', 'dividen_user', 'last_data_formb', 'pinjaman_user'));
    }
    public function store($formb)
    {
        if($this->dividen_1)
            $counter = count($this->dividen_1);
        else
            $counter = 0;

       for ($key=0; $key < $counter ; $key++) { 
        DividenB::create([
            'dividen_1' => $this->dividen_1[$key],
            'dividen_1_pegawai' => $this->dividen_1_pegawai[$key],
            'dividen_1_pasangan' => $this->dividen_pasangan[$key],
            'formbs_id' => $formb,
        ]);       }

        $this->inputs = [];
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        // $this->gaji = '';
        // $this->gaji_pasangan = '';
        // $this->jumlah_imbuhan = '';
        // $this->jumlah_imbuhan_pasangan = '';
        // $this->sewa = '';
        // $this->sewa_pasangan = '';
        $this->dividen_1 = null;
        $this->dividen_1_pegawai = null;
        $this->dividen_pasangan = null;
    }
}
