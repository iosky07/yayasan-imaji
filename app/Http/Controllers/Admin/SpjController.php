<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Spj;

class SpjController extends Controller
{
    public function index()
    {
        return view('pages.spj.index', [
            'espeje' => Spj::class
        ]);
    }

    public function create()
    {
        return view('pages.spj.create');
    }

    public function edit($id)
    {
        return view('pages.spj.edit', compact('id'));
    }
}
