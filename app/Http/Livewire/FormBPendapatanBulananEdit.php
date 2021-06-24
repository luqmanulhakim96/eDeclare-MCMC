<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\JenisHarta;
use App\DividenB;
use App\FormB as FormBModel;

class FormBPendapatanBulananEdit extends Component
{

    public $id_formb, $idForm;
    public $username, $staffinfo, $userid, $data_user, $last_data_formb, $dividen_user, $pinjaman_user, $maklumat_pasangan, $maklumat_anak;
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
        
        return view('livewire.form-b-pendapatan-bulanan-edit');
    }

    public function loadData()
    {
        $this->jenisHarta = JenisHarta::get();

        $this->username = auth()->user()->username;
        $this->staffinfo = null;
        $this->userid = auth()->user()->id;
        $this->data_user = FormBModel::where('user_id', $this->userid)->get();

        $this->last_data_formb = null;
        $this->dividen_user = null;
        $this->pinjaman_user = null;
        $this->maklumat_pasangan = null;
        $this->maklumat_anak = null;    
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
