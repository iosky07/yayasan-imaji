<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\ContentTag;
use App\Models\ContentType;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormContent extends Component
{
    use WithFileUploads;
    public $action;
    public $content;
    public $dataId;
    public $contentTags;
    public $contentTypes;
    public $optionTags;
    public $optionTypes;
    public $thumbnail;

    public function mount()
    {
        $this->content['title'] = '';
        $this->content['contents'] = '';
        $this->content['user_id'] = Auth::id();
        $this->contentTags=[];
        $this->content['type_id']='1';
        $this->optionTags = eloquent_to_options(Tag::get(), 'id', 'title');
        $this->optionTypes = eloquent_to_options(ContentType::get(), 'id', 'title');

        if ($this->dataId!=''){
//            dd($this->dataId);
            $this->contentTags = ContentTag::whereContentId($this->dataId)->pluck('tag_id')->toArray();
//            $this->contentTypes = Content::whereId($this->dataId)->get('type_id');
//            dd($this->contentTypes);
            $content = Content::findOrFail($this->dataId);
            $this->content=[
                'title'=>$content->title,
                'contents'=>$content->contents,
                'slug'=>$content->slug,
                'thumbnail'=>$content->thumbnail,
                'type_id'=>$content->type_id
            ];
        }
    }

    public function create()
    {
        $this->content['slug'] = Str::slug($this->content['title']);
//        dd($this->content['slug']);

        $this->content['thumbnail'] = md5(rand()).'.'.$this->thumbnail->getClientOriginalExtension();
        $this->thumbnail->storeAs('public/thumbnail', $this->content['thumbnail']);
//        dd($this->content);
        Content::create($this->content);

        $content = Content::orderBy('id', 'desc')->pluck('id');

        foreach ($this->contentTags as $tag) {
            $this->contentTags['content_id'] = $content[0];
            $this->contentTags['tag_id'] = $tag;
            ContentTag::create($this->contentTags);
        }

        $this->emit('redirect');
    }

    public function update() {

        Content::find($this->dataId)->update($this->content);

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
        return view('livewire.form-content');
    }
}
