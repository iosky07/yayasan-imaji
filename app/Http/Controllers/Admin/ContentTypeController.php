<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ContentType;

class ContentTypeController extends Controller
{
    public function index()
    {
        return view('pages.content-type.index', [
            'contype' => ContentType::class
        ]);
    }

    public function create()
    {
        return view('pages.content-type.create');
    }

    public function edit($id)
    {
        return view('pages.content-type.edit', compact('id'));
    }

}
