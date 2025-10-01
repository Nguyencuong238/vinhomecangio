<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $req)
    {
        $posts = Post::where('status', 1)->orderByDesc('is_featured')->orderByDesc('id')->paginate(9);

        return view('front.home', compact('posts'));
    }

    public function about(Request $req)
    {
        return view('front.about', compact([]));
    }

    public function news(Request $req)
    {
        $posts = Post::where('status', 1)
            ->when(request()->search, function ($q) {
                $q->where('title', 'like', '%' . request()->search . '%');
            })
            ->when(request()->tag, function ($q) {
                $q->whereHas('tags', function ($q) {
                    $q->where('slug', request()->tag);
                });
            })
            ->when(request()->category, function ($q) {
                $q->whereHas('categories', function ($q) {
                    $q->where('slug', request()->category);
                });
            })
            ->orderByDesc('is_featured')
            ->orderByDesc('id')
            ->paginate(6);

        $newPosts = Post::where('status', 1)
            ->when(request()->search, function ($q) {
                $q->where('title', 'like', '%' . request()->search . '%');
            })
            ->orderByDesc('id')
            ->limit(3)
            ->get();

        $categories = Category::where('type', 'post')->has('posts')->get();
        $tags = Tag::where('type', 'post')->get();

        return view('front.news', compact('posts', 'categories', 'newPosts', 'tags'));
    }

    public function newsDetail(Request $req, Post $post)
    {
        $post->increment('view', 1);
        $category = $post->categories()->first();

        $relatedPosts = Post::when($category, function ($q) use ($category) {
            $q->whereHas('categories', function ($q) use ($category) {
                $q->where('id', $category->id);
            });
        })
            ->where('status', 1)
            ->orderByDesc('id')->limit(3)->get();

        $otherPosts = Post::query()->where('status', 1)->where('id', '<>', $post->id)->inRandomOrder()->limit(3)->get();
        $categories = Category::where('type', 'post')->get();

        return view('front.news_detail', compact('relatedPosts', 'otherPosts', 'post'));
    }

    public function contact(Request $req)
    {
        return view('front.contact');
    }

    public function location(Request $req)
    {
        return view('front.location');
    }

    public function gallery(Request $req)
    {
        $galleries = Album::where('status', 1)->orderByDesc('id')->get();
        $categories = Category::where('type', 'image')->get();

        return view('front.gallery', compact('galleries', 'categories'));
    }

    public function utility(Request $req)
    {
        return view('front.utility', compact([]));
    }

    public function progress(Request $req)
    {
        $galleries = Album::where('status', 1)->orderByDesc('id')->get();
        $categories = Category::where('type', 'image')->get();

        return view('front.progress', compact('galleries', 'categories'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
