<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormBlog extends Component
{

    use WithFileUploads;
    public $action;
    public $blog;
    public $dataId;
    public $blogTags;
    public $optionTags;
    public $optionStatus;
    public $thumbnail;

    public function mount()
    {
        $this->blog['title'] = '';
        $this->blog['contents'] = '';
        $this->blog['user_id'] = Auth::id();
        $this->blogTags=[];
//        $this->blog['time'] = '21:00';
//        $this->blog['timeaaa'] = date('Y-m-d').' - '.date('Y-m-d');
        $this->blog['status'] = 'waiting';

//        $this->blog['thumbnail'] = $this->blogTags;
        $this->optionTags = eloquent_to_options(Tag::get(), 'id', 'title');
        if ($this->dataId!=''){
            $this->blogTags = BlogTag::whereBlogId($this->dataId)->pluck('tag_id')->toArray();
            $blog = Blog::findOrFail($this->dataId);
            $this->blog=[
                'title'=>$blog->title,
                'contents'=>$blog->contents,
                'status'=>$blog->status,
                'thumbnail'=>$blog->thumbnail,

            ];
        }
        $this->optionStatus=[
            ['value'=>'waiting','title'=>'waiting'],
            ['value'=>'accepted','title'=>'accepted'],
            ['value'=>'decline','title'=>'decline'],
        ];
    }

    public function render()
    {
        return view('livewire.form-blog');
    }

    public function create()
    {
        $this->blog['thumbnail'] = md5(rand()).'.'.$this->thumbnail->getClientOriginalExtension();
        $this->thumbnail->storeAs('public/thumbnail', $this->blog['thumbnail']);
//        dd($this->blog);
        Blog::create($this->blog);

        $blog = Blog::orderBy('id', 'desc')->pluck('id');

        foreach ($this->blogTags as $tag) {
            $this->blogTags['blog_id'] = $blog[0];
            $this->blogTags['tag_id'] = $tag;
            BlogTag::create($this->blogTags);
        }

        $this->emit('redirect');
    }

    public function update() {

        Blog::find($this->dataId)->update($this->blog);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

}
