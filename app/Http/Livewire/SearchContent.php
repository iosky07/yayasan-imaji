<?php

namespace App\Http\Livewire;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class SearchContent extends Component
{
    use WithPagination;
    public $search='';
    public $blog;

    public function searching(){

//        dd($this->search);
        $this->blog=Content::class;
        return Content::search($this->search)
        ->paginate(3);
    }

    public function render()
    {
//        dd("asdsdasd");
        $content = $this->searching();
        return view('livewire.search-content',compact('content'));
    }
}
