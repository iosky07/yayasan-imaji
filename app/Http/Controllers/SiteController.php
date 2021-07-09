<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Gallery;
use App\Models\Instagram;
use App\Models\Member;
use App\Models\Regulation;
use App\Models\Subscribe;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function beranda() {
        $content = Content::orderBy('id','desc')->get()->take(3);
        $instagram = Instagram::orderBy('id','desc')->get()->take(3);
        $galleries = Gallery::orderBy('id','desc')->get()->take(7);
//        dd($content);
        return view('pages.page-main', compact('content', 'galleries', 'instagram'));
    }

    public function blog() {
        return view('pages.page-beritamenu');
    }

    public function blogShow($id) {
        $content = Content::whereId($id)->get();
//        dd($content);
        return view('pages.page-berita', compact('content'));
    }

    public function gallery() {
        $galleries = Gallery::all();
        return view('pages.page-gallery', compact('galleries'));
    }

    public function about() {
        return view('pages.page-about');
    }

    public function subscribe(Request $request) {
        Subscribe::create(['email'=>$request->email]);

//        return back();
        return redirect(route('main-landing'))->with('success', 'Task Created Successfully');
    }

    public function showsubscriber() {
      $subscribe = Subscribe::class;
      swal("Good job!", "You clicked the button!", "success");
      return view('pages.page-subscribe', compact('subscribe'));
    }

    public function aspiration() {
        return view('pages.page-aspiration');
    }

}
