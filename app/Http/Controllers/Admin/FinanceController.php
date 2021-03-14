<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Finance;

class FinanceController extends Controller
{
    public function index()
    {
        return view('pages.finance.index', [
            'finn' => Finance::class
        ]);
    }

    public function create()
    {
        return view('pages.finance.create');
    }

    public function edit($id)
    {
        return view('pages.finance.edit', compact('id'));
    }

}
