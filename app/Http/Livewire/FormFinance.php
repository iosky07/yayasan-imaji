<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\TypeFinance;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormFinance extends Component
{
    use WithFileUploads;
    public $action;
    public $financy;
    public $dataId;
    public $optionTypes;

    public function mount()
    {
        $this->financy['type_id']='1';
        $this->optionTypes = eloquent_to_options(TypeFinance::get(), 'id', 'title');

        if ($this->dataId!=''){
            $m = Finance::findOrFail($this->dataId);
            $this->financy=[
                'title'=>$m->title,
                'type_id'=>$m->type_id,
                'money'=>$m->money,
                'pic_internal'=>$m->pic_internal,
                'pic_external'=>$m->pic_external,
                'publish_date'=>$m->publish_date,
                'note'=>$m->note,
                'file'=>$m->file,
            ];
        }
    }

    public function create()
    {
        Finance::create($this->financy);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);

        $this->emit('redirect');
    }

    public function update() {

        Finance::find($this->dataId)->update($this->financy);

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
        return view('livewire.form-finance');
    }

}
