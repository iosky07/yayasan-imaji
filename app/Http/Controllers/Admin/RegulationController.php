<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Regulation;

class RegulationController extends Controller
{
    public function index()
    {
        return view('pages.regulation.index', [
            'reg' => Regulation::class
        ]);
    }

    public function create()
    {
        return view('pages.regulation.create');
    }

    public function edit($id)
    {
        return view('pages.regulation.edit', compact('id'));
    }
}
