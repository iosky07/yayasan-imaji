<?php

namespace App\Http\Livewire;

use App\Models\Instagram;
use Livewire\Component;

class FormInstagram extends Component
{
    public $action;
    public $ig;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = Instagram::findOrFail($this->dataId);
            $this->ig=[
                'title'=>$m->title,
                'link'=>$m->link,
            ];
        }
    }

    public function create()
    {
        Instagram::create($this->ig);
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

    public function update() {

        Instagram::find($this->dataId)->update($this->ig);

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
        return view('livewire.form-instagram');
    }
}
