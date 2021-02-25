<?php

namespace App\Http\Livewire;

use App\Models\ProjectBudget;
use Livewire\Component;

class FormProjectBudget extends Component
{
    public $action;
    public $projectBudget;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = ProjectBudget::findOrFail($this->dataId);
            $this->projectBudget=[
                'title'=>$m->title,
            ];
        }
    }

    public function create()
    {
        ProjectBudget::create($this->projectBudget);

        $this->emit('redirect');
    }

    public function update() {

        ProjectBudget::find($this->dataId)->update($this->projectBudget);

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
        return view('livewire.form-project-budget');
    }
}
