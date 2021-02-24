<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function index()
    {
        return view('pages.gallery.index', [
            'mem' => Gallery::class
        ]);
    }

    public function create()
    {
        return view('pages.gallery.create');
    }

    public function edit($id)
    {
        return view('pages.gallery.edit', compact('id'));
    }

}

