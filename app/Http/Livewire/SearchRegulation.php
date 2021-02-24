<?php

namespace App\Http\Livewire;

use App\Models\Regulation;
use Livewire\Component;

class SearchRegulation extends Component
{
    public $regulations;
    public $search='';

    public function searching(){

        $this->regulations=Regulation::class;
        return Regulation::search($this->search)
            ->paginate(1);
    }

    public function render()
    {
        $rules = $this->searching();
        return view('livewire.search-regulation', compact('rules'));
    }
}
