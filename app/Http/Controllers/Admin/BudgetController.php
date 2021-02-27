<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Budget;

class BudgetController extends Controller
{
    public function index()
    {
        return view('pages.budget.index', [
            'budg' => Budget::class
        ]);
    }

    public function create()
    {
        return view('pages.budget.create');
    }

    public function edit($id)
    {
        return view('pages.budget.edit', compact('id'));
    }

}
