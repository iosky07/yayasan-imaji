<?php

namespace App\Http\Livewire;

use App\Models\TypeFinance;
use Livewire\Component;

class FormTypeFinance extends Component
{
    public $action;
    public $typeFinances;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = TypeFinance::findOrFail($this->dataId);
            $this->typeFinances=[
                'title'=>$m->title,
            ];
        }
    }

    public function create()
    {
        TypeFinance::create($this->typeFinances);

        $this->emit('redirect');
    }

    public function update() {

        TypeFinance::find($this->dataId)->update($this->typeFinances);

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
        return view('livewire.form-type-finance');
    }
}
