<?php

namespace App\Http\Controllers\Front;

use App\Events\BlogView;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Session\Store;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()
        ->with('media', 'author:id,name')
        ->latest()
        ->when(request('search'), function ($q) {
            $q->where('title', 'like', '%' . request('search') . '%');
        })->paginate();
        return view('front.blogs.index', compact('blogs'));
    }

    public function show($slug, $id, Store $session)
    {
        $blog = Blog::where('slug', $slug)->with('media')->firstOrFail();
        $categories = $blog->categories()->get()->pluck('id')->toArray();
        $otherBlog = Blog::whereHas('categories', function ($q) use ($categories) {
            $q->whereIn('id', $categories);
        })->inRandomOrder()->take(4)->get();
        BlogView::dispatch($blog);
        
        $recentBlogs = $session->get('recent_blogs', []);
        if(isset($recentBlogs['blog_' . $blog->id])) {
            unset($recentBlogs['blog_' . $blog->id]);
        }
        $recentBlogs['blog_' . $blog->id] = $blog;
        if(count($recentBlogs) > 5) {
            array_shift($recentBlogs);
        }

        $session->put('recent_blogs', $recentBlogs);

        return view('front.blogs.show', compact('blog', 'otherBlog'));
    }
}
