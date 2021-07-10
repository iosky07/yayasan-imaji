<?php

namespace App\Http\Livewire;

use App\Models\Spj;
use App\Models\Status;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormSpj extends Component
{
    use WithFileUploads;

    public $action;
    public $spj;
    public $file;
    public $dataId;

    public $optionStatus;

    public function mount()
    {
        $this->spj = [
            'status' => '1',
            'title' => '',
            'money' => '',
            'file' => '',
            'user_id'=>auth()->id()
        ];
        $this->optionStatus = eloquent_to_options(Status::get(), 'id', 'title');
        if ($this->dataId != '') {
            $m = Spj::findOrFail($this->dataId);
            $this->spj = [
                'title' => $m->title,
                'money' => $m->money,
                'file' => $m->file,
            ];
        }
    }

    public function create()
    {
//
        if ($this->file != null) {
            $filename = Str::slug($this->spj['title']) . '-' . rand(0, 1000) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/spj', $filename);
            $this->spj['file'] = 'spj/' . $filename;
        }
        Spj::create($this->spj);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect');
    }

    public function update()
    {

        if ($this->file != null) {
            $filename = Str::slug($this->spj['title']) . '-' . rand(0, 1000) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/spj', $filename);
            $this->spj['file'] = 'spj/' . $filename;
        }
        Spj::find($this->dataId)->update($this->spj);

        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil update',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect');
    }

    public function render()
    {
        return view('livewire.form-spj');
    }
}
