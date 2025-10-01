<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(Request $req)
    {
        return view('front.pages.about');
    }

    public function service(Request $req)
    {
        return view('front.pages.service');
    }

    public function partner(Request $req)
    {
        return view('front.pages.partner');
    }
}
