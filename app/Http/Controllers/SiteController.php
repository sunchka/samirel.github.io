<?php

namespace App\Http\Controllers;

use App\Models\News;

class SiteController extends Controller
{
    public function home()
    {
        $news = News::orderBy('created_at', 'desc')->take(10)->get();

        return view('home', compact('news'));
    }

    public function about()
    {
        return view('about');
    }

    public function partners()
    {
        return view('partners');
    }
}
