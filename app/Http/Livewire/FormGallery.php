<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormGallery extends Component
{
    use WithFileUploads;
    public $action;
    public $gallery;
    public $dataId;
    public $thumbnail;

    public function render()
    {
        return view('livewire.form-gallery');
    }

    public function mount()
    {

        $this->gallery['user_id'] = Auth::id();
        if ($this->dataId!=''){
            $m = Gallery::findOrFail($this->dataId);
            $this->gallery=[
                'title'=>$m->title,
                'thumbnail'=>$m->thumbnail
            ];
        }
    }

    public function create()
    {
//        dd($this->gallery);
        $this->gallery['thumbnail'] = md5(rand()).'.'.$this->thumbnail->getClientOriginalExtension();
        $this->thumbnail->storeAs('public/thumbnail/gallery/', $this->gallery['thumbnail']);

        Gallery::create($this->gallery);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

    public function update() {

//        $this->gallery['thumbnail'] = md5(rand()).'.'.$this->thumbnail->getClientOriginalExtension();
//        dd($this->gallery);
        $this->thumbnail->storeAs('public/thumbnail/gallery/', $this->gallery['thumbnail']);
        Gallery::find($this->dataId)->update($this->gallery);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

}
