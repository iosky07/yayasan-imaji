<?php

namespace App\Http\Livewire;

use App\Models\Budget;
use App\Models\ProjectBudget;
use App\Models\StatusBudget;
use App\Models\TypeBudget;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormBudget extends Component
{
    use WithFileUploads;
    public $action;
    public $file;
    public $budgy;
    public $dataId;
    public $optionProjects;
    public $optionTypes;
    public $optionStatuses;

    public function mount()
    {
        $this->budgy=[
            'project_id'=>'1',
            'type_id'=>'1',
            'status_id'=>'1',
            'title'=>'',
            'money'=>'',
            'file'=>''
        ];
        $this->optionProjects = eloquent_to_options(ProjectBudget::get(), 'id', 'title');
        $this->optionTypes = eloquent_to_options(TypeBudget::get(), 'id', 'title');
        $this->optionStatuses = eloquent_to_options(StatusBudget::get(), 'id', 'title');

        if ($this->dataId!=''){
            $m = Budget::findOrFail($this->dataId);
            $this->budgy=[
                'project_id'=>$m->project_id,
                'type_id'=>$m->type_id,
                'status_id'=>$m->status_id,
                'title'=>$m->title,
                'money'=>$m->money,
                'file'=>$m->file
            ];
        }
    }

    public function create()
    {
        if ($this->file != null) {
            $filename = Str::slug($this->budgy['title']) . '-' . rand(0, 1000).'.'.$this->file->getClientOriginalExtension();
            $this->file->storeAs('public/budget',$filename);
            $this->budgy['file'] = 'budget/' . $filename;
        }
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

        if ($this->file != null) {
            $filename = Str::slug($this->budgy['title']) . '-' . rand(0, 1000).'.'.$this->file->getClientOriginalExtension();
            $this->file->storeAs('public/budget',$filename);
            $this->budgy['file'] = 'budget/' . $filename;
        }
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
