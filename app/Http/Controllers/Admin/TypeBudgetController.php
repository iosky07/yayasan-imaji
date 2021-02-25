<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\TypeBudget;

class TypeBudgetController extends Controller
{
    public function index()
    {
        return view('pages.type-budget.index', [
            'tbud' => TypeBudget::class
        ]);
    }

    public function create()
    {
        return view('pages.type-budget.create');
    }

    public function edit($id)
    {
        return view('pages.type-budget.edit', compact('id'));
    }
}
