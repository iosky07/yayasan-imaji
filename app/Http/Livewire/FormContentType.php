<?php

namespace App\Http\Livewire;

use App\Models\ContentType;
use Livewire\Component;

class FormContentType extends Component
{
    public $action;
    public $contentType;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = ContentType::findOrFail($this->dataId);
            $this->contentType=[
                'title'=>$m->title,
            ];
        }
    }

    public function create()
    {
        ContentType::create($this->contentType);

        $this->emit('redirect');
    }

    public function update() {

        ContentType::find($this->dataId)->update($this->contentType);

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
        return view('livewire.form-content-type');
    }
}
