<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class SearchContent extends Component
{
    use WithPagination;
    public $search='';
    public $blog;

    public function searching(){

//        dd($this->search);
        $this->blog=Blog::class;
        return Blog::search($this->search)
        ->paginate(3);
    }

    public function render()
    {
        $content = $this->searching();
        return view('livewire.search-content',compact('content'));
    }
}
