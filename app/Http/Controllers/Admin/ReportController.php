<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index', [
            'repo' => Report::class
        ]);
    }

    public function create()
    {
        return view('pages.report.create');
    }

    public function edit($id)
    {
        return view('pages.report.edit', compact('id'));
    }

}
