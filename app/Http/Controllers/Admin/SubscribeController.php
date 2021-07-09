<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function index()
    {
        return view('pages.subscribe.index', [
            'subs' => Subscribe::class
        ]);
    }

}
