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
    public $file;
    public $dataId;
    public $optionTypes;

    public function mount()
    {

        if ($this->dataId!=''){
            $m = Finance::findOrFail($this->dataId);
            $this->financy=[
                'title'=>$m->title,
                'type'=>$m->type,
                'money'=>$m->money,
                'pic_internal'=>$m->pic_internal,
                'pic_external'=>$m->pic_external,
                'publish_date'=>$m->publish_date,
                'note'=>$m->note,
                'file'=>$m->file,
            ];
        }
        $this->optionTypes=[
            ['value'=>'Barang','title'=>'Barang'],
            ['value'=>'Invoice','title'=>'Invoice'],
            ['value'=>'Jasa','title'=>'Jasa'],
        ];
    }

    public function create()
    {
        $this->financy['file'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
        $this->file->storeAs('public/file/finance/', $this->financy['file']);

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

        $this->financy['file'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
        $this->file->storeAs('public/file/finance/', $this->financy['file']);

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
