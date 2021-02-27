<?php

namespace App\Http\Livewire;

use App\Models\Budget;
use App\Models\ProjectBudget;
use App\Models\StatusBudget;
use App\Models\TypeBudget;
use Livewire\Component;

class FormBudget extends Component
{
    public $action;
    public $budgy;
    public $dataId;
    public $optionProjects;
    public $optionTypes;
    public $optionStatuses;

    public function mount()
    {
        $this->budgy['project_id']='1';
        $this->budgy['type_id']='1';
        $this->budgy['status_id']='1';
        $this->optionProjects = eloquent_to_options(ProjectBudget::get(), 'id', 'title');
        $this->optionTypes = eloquent_to_options(TypeBudget::get(), 'id', 'title');
        $this->optionStatuses = eloquent_to_options(StatusBudget::get(), 'id', 'title');

        if ($this->dataId!=''){
            $m = Budget::findOrFail($this->dataId);
            $this->budgy=[
                'project_id'=>$m->project_id,
                'type_id'=>$m->type_id,
                'status_id'=>$m->status_id,
                'question'=>$m->question,
                'answer'=>$m->answer,
            ];
        }
    }

    public function create()
    {
        Budget::create($this->budgy);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);

        $this->emit('redirect');
    }

    public function update() {

        Budget::find($this->dataId)->update($this->budgy);

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
        return view('livewire.form-budget');
    }
}
