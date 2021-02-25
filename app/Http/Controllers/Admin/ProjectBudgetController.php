<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ProjectBudget;

class ProjectBudgetController extends Controller
{
    public function index()
    {
        return view('pages.project-budget.index', [
            'pbud' => ProjectBudget::class
        ]);
    }

    public function create()
    {
        return view('pages.project-budget.create');
    }

    public function edit($id)
    {
        return view('pages.project-budget.edit', compact('id'));
    }
}
