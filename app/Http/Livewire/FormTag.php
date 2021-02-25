<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class FormTag extends Component
{
    public $action;
    public $tag;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = Tag::findOrFail($this->dataId);
            $this->tag=[
                'title'=>$m->title,
            ];
        }
    }

    public function create()
    {
        Tag::create($this->tag);

        $this->emit('redirect');
    }

    public function update() {

        Tag::find($this->dataId)->update($this->tag);

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
        return view('livewire.form-tag');
    }
}
