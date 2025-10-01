<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostArchiveController extends Controller
{
    public function __invoke($year, $month)
    {
        $posts = Post::query()
            ->with('media', 'author:id,name')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->paginate();

        return view('front.posts.index', compact('posts'));
    }
}
