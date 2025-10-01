<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Post\Store;
use App\Http\Requests\Backend\Post\Update;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class ActionNewsController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->latest()
            ->with('author', 'categories', 'tags')
            ->where('author_id', Auth::user()->id)
            ->whereHas('categories', function ($q) {
                $q->where('slug', 'tin-hoat-dong');
            })
            ->when(request('search'), function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%');
            })
            ->paginate();

        return view('front.action_news.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::whereType('post')->get();
        $category = Category::whereSlug('tin-hoat-dong')->first();

        return view('front.action_news.create', compact('tags', 'category'));
    }

    public function store(Store $request)
    {
        $post = Post::create([
            'title'       => request('title'),
            'excerpt'     => request('excerpt'),
            'is_featured' => request('is_featured'),
            'is_new' => request('is_new'),
            'order' => request('order'),
            'body'        => request('body'),
            'meta'        => [
                'meta_title'       => request('meta_tilte'),
                'meta_description' => request('meta_description'),
            ],
            'author_id' => $request->user()->id,
        ]);

        $post
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        if ($request->filled('projects')) {
            $post->projects()->attach(request('projects'));
        }

        $post->categories()->sync(request('categories'));
        


        $post->attachTags(request('tags'), 'post');

        return redirect()->back()->with('success', 'Thêm bài viết thành công!');
    }

    public function edit($id)
    {
        $post = Post::with('media')->where('id', $id)->where('author_id', Auth::user()->id)->first();

        $tags = Tag::whereType('post')->get();

        $category = Category::whereSlug('tin-hoat-dong')->first();

        return view('front.action_news.edit', compact( 'tags', 'post', 'category'));
    }

    public function update(Update $request, $id)
    {
        $post = Post::where('id', $id)->where('author_id', Auth::user()->id)->first();

        $post->fill([
            'title'       => request('title'),
            'excerpt'     => request('excerpt'),
            'is_featured' => request('is_featured'),
            'is_new' => request('is_new'),
            'order' => request('order'),
            'body'        => request('body'),
            'meta'        => [
                'meta_title'       => request('meta_tilte'),
                'meta_description' => request('meta_description'),
            ],
        ])->save();

        $post
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        if ($request->filled('projects')) {
            $post->projects()->sync(request('projects'));
        }

        $post->categories()->sync(request('categories'));

        $post->syncTagsWithType(request('tags'), 'post');

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->where('author_id', Auth::user()->id)->first();

        $post->delete();

        $post->categories()->sync([]);

        $post->tags()->sync([]);

        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
