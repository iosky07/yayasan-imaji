<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\TypeFinance;

class TypeFinanceController extends Controller
{
    public function index()
    {
        return view('pages.type-finance.index', [
            'tfin' => TypeFinance::class
        ]);
    }

    public function create()
    {
        return view('pages.type-finance.create');
    }

    public function edit($id)
    {
        return view('pages.type-finance.edit', compact('id'));
    }
}
