<?php

namespace App\Http\Livewire;

use App\Models\Spj;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormSpj extends Component
{
    use WithFileUploads;
    public $action;
    public $spj;
    public $file;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = Spj::findOrFail($this->dataId);
            $this->spj=[
                'title'=>$m->title,
                'money'=>$m->money,
                'file'=>$m->file,
            ];
        }
    }

    public function create()
    {
//        dd($this->spj);
        $this->spj['file'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
//        dd($this->spj['file']);
        $this->file->storeAs('public/file/spj/', $this->spj['file']);

        Spj::create($this->spj);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);

        $this->emit('redirect');
    }

    public function update() {

        $this->spj['file'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
        $this->file->storeAs('public/file/spj/', $this->file['file']);

        Spj::find($this->dataId)->update($this->spj);

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
        return view('livewire.form-spj');
    }
}
