<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{

    public function index()
    {
        return view('pages.faq.index', [
            'faqq' => Faq::class
        ]);
    }

    public function create()
    {
        return view('pages.faq.create');
    }

    public function edit($id)
    {
        return view('pages.faq.edit', compact('id'));
    }

}
