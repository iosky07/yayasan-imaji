<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Regulation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormRegulation extends Component
{
    use WithFileUploads;
    public $action;
    public $regulation;
    public $dataId;
    public $category;
    public $optionTags;
    public $optionStatus;

    public function mount()
    {
        $this->regulation['code'] = '';
        $this->regulation['title'] = '';
        $this->regulation['number'] = '';
        $this->regulation['year'] = '';
        $this->regulation['clickbait'] = '';
        $this->regulation['determination_place'] = '';
        $this->regulation['determination_date'] = '';
        $this->regulation['invitation_date'] = '';
        $this->regulation['effective_date'] = '';
        $this->regulation['location'] = '';
        $this->regulation['source'] = '';
        $this->regulation['language'] = '';
        $this->regulation['law_field'] = '';

        $this->regulation['user_id'] = Auth::id();
        $this->regulation['status'] = 'waiting';
        $this->optionTags = eloquent_to_options(Category::get(), 'id', 'title');

        if ($this->dataId!=''){
            $b = Regulation::findOrFail($this->dataId);
            $this->regulation=[
                'code'=>$b->code,
                'title'=>$b->title,
                'number'=>$b->number,
                'year'=>$b->year,
                'clickbait'=>$b->clickbait,
                'determination_place'=>$b->determination_place,
                'determination_date'=>$b->determination_date,
                'invitation_date'=>$b->invitation_date,
                'effective_date'=>$b->effective_date,
                'location'=>$b->location,
                'source'=>$b->source,
                'language'=>$b->language,
                'law_field'=>$b->law_field,
                'status'=>$b->status,

            ];
        }
        $this->optionStatus=[
            ['value'=>'waiting','title'=>'waiting'],
            ['value'=>'accepted','title'=>'accepted'],
            ['value'=>'decline','title'=>'decline'],
        ];
    }

    public function create()
    {
        Regulation::create($this->regulation);

        $this->emit('redirect');
    }

    public function update() {

        Regulation::find($this->dataId)->update($this->regulation);

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
        return view('livewire.form-regulation');
    }

}
