<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use App\Models\Status;
use App\Models\TypeFinance;
use Illuminate\Support\Str;
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
    public $optionStatus;


    public function mount()
    {
        $this->financy = [
            'user_id' => auth()->id(),
            'title' => '',
            'type' => 'Barang',
            'money' => '',
            'pic_internal' => '',
            'pic_external' => '',
            'publish_date' => '',
            'note' => '',
            'file' => '',
            'status' => '1'
        ];
        $this->optionStatus = eloquent_to_options(Status::get(), 'id', 'title');
        if ($this->dataId != '') {
            $m = Finance::findOrFail($this->dataId);
            $this->financy = [
                'title' => $m->title,
                'type' => $m->type,
                'money' => $m->money,
                'pic_internal' => $m->pic_internal,
                'pic_external' => $m->pic_external,
                'publish_date' => $m->publish_date,
                'note' => $m->note,
                'file' => $m->file,
            ];
        }

        $this->optionTypes = [
            ['value' => 'Barang', 'title' => 'Barang'],
            ['value' => 'Invoice', 'title' => 'Invoice'],
            ['value' => 'Jasa', 'title' => 'Jasa'],
        ];
//        dd($this->optionTypes);
//        dd($this->financy);
    }

    public function create()
    {
        if ($this->file != null) {
            $filename = Str::slug($this->financy['title']) . '-' . rand(0, 1000) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/finance', $filename);
            $this->financy['file'] = 'finance/' . $filename;
        }
        Finance::create($this->financy);

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
            $filename = Str::slug($this->financy['title']) . '-' . rand(0, 1000) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('public/finance', $filename);
            $this->financy['file'] = 'finance/' . $filename;
        }
        if (auth()->user()->role!=1){
            $this->financy['status']=1;
        }
        Finance::find($this->dataId)->update($this->financy);

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
        return view('livewire.form-finance');
    }

}
