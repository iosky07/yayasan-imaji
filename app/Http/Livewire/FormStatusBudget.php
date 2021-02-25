<?php

namespace App\Http\Livewire;

use App\Models\StatusBudget;
use Livewire\Component;

class FormStatusBudget extends Component
{
    public $action;
    public $statusBudget;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = StatusBudget::findOrFail($this->dataId);
            $this->statusBudget=[
                'title'=>$m->title,
            ];
        }
    }

    public function create()
    {
        StatusBudget::create($this->statusBudget);

        $this->emit('redirect');
    }

    public function update() {

        StatusBudget::find($this->dataId)->update($this->statusBudget);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

    public function render()
    {
        return view('livewire.form-status-budget');
    }
}
