<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('pages.tag.index', [
            'tagg' => Tag::class
        ]);
    }

    public function create()
    {
        return view('pages.tag.create');
    }

    public function edit($id)
    {
        return view('pages.tag.edit', compact('id'));
    }
}
