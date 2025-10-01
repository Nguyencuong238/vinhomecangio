<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Post;
use App\Models\Tag;

class PostTagController extends Controller
{
    public function __invoke($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = Post::query()
            ->latest()
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->with('media', 'author:id,name')
            ->paginate();

        return view('front.posts.index', compact('posts', 'tag'));
    }
}
