<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Instagram;

class InstagramController extends Controller
{

    public function index()
    {
        return view('pages.instagram.index', [
            'ig' => Instagram::class
        ]);
    }

    public function create()
    {
        return view('pages.instagram.create');
    }

    public function edit($id)
    {
        return view('pages.instagram.edit', compact('id'));
    }

}
