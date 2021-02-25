<?php

namespace App\Http\Livewire;

use App\Models\TypeBudget;
use Livewire\Component;

class FormTypeBudget extends Component
{
    public $action;
    public $typeBudgets;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = TypeBudget::findOrFail($this->dataId);
            $this->typeBudgets=[
                'title'=>$m->title,
            ];
        }
    }

    public function create()
    {
        TypeBudget::create($this->typeBudgets);

        $this->emit('redirect');
    }

    public function update() {

        TypeBudget::find($this->dataId)->update($this->typeBudgets);

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
        return view('livewire.form-type-budget');
    }
}
