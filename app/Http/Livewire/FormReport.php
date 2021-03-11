<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormReport extends Component
{
    use WithFileUploads;
    public $action;
    public $report;
    public $dataId;
    public $thumbnail;

    public function mount()
    {

        if ($this->dataId!=''){
            $m = Report::findOrFail($this->dataId);
            $this->report=[
                'title'=>$m->title,
                'content'=>$m->content,
                'file'=>$m->file,
            ];
        }
    }

    public function create()
    {
        $this->report['thumbnail'] = md5(rand()).'.'.$this->thumbnail->getClientOriginalExtension();
        $this->thumbnail->storeAs('public/thumbnail/report/', $this->report['thumbnail']);

        Report::create($this->report);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);

        $this->emit('redirect');
    }

    public function update() {

        $this->thumbnail->storeAs('public/thumbnail/report/', $this->report['thumbnail']);
        Report::find($this->dataId)->update($this->report);

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
        return view('livewire.form-report');
    }
}
