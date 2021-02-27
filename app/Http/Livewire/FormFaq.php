<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FormFaq extends Component
{
    public $action;
    public $faq;
    public $dataId;

    public function mount()
    {
        if ($this->dataId!=''){
            $m = Faq::findOrFail($this->dataId);
            $this->faq=[
                'question'=>$m->question,
                'answer'=>$m->answer,
            ];
        }
    }

    public function create()
    {
        Faq::create($this->faq);

        $this->emit('redirect');
    }

    public function update() {

        Faq::find($this->dataId)->update($this->faq);

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
        return view('livewire.form-faq');
    }
}
