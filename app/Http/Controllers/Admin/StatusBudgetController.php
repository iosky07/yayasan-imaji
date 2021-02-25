<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\StatusBudget;

class StatusBudgetController extends Controller
{
    public function index()
    {
        return view('pages.status-budget.index', [
            'sbud' => StatusBudget::class
        ]);
    }

    public function create()
    {
        return view('pages.status-budget.create');
    }

    public function edit($id)
    {
        return view('pages.status-budget.edit', compact('id'));
    }
}
