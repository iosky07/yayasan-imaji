<?php

namespace App\Http\Livewire;

use App\Models\Subscribe;
use Livewire\Component;

class FormSubscribe extends Component
{
    public $action;
    public $subscribe;
    public $dataId;

    public function mount()
    {
        $this->subscribe['email'] = '';

        if ($this->dataId!=''){
            $b = Subscribe::findOrFail($this->dataId);
            $this->subscribe=[
                'email'=>$b->email,

            ];
        }
    }

    public function create()
    {
        Subscribe::create($this->subscribe);

        $this->emit('redirect');
    }

    public function update() {

        Subscribe::find($this->dataId)->update($this->subscribe);

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
        return view('livewire.form-subscribe');
    }
}
