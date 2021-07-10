<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormReport extends Component
{
    use WithFileUploads;
    public $action;
    public $report;
    public $dataId;
    public $file;

    public function mount()
    {
        $this->report=[
            'title'=>'',
            'content'=>'',
            'file'=>'',
            'user_id'=>auth()->id()
        ];
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
        if ($this->file != null) {
            $filename = Str::slug($this->report['title']) . '-' . rand(0, 1000) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/report', $filename);
            $this->report['file'] = 'report/' . $filename;
        }
//        dd($this->report);
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

        if ($this->file != null) {
            $filename = Str::slug($this->report['title']) . '-' . rand(0, 1000) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/report', $filename);
            $this->report['file'] = 'report/' . $filename;
        }
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
