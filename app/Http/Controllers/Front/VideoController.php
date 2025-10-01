<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Video;
use Illuminate\Session\Store;
use Illuminate\Http\Request;
use Auth;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::query()
        ->with('media', 'categories')
        ->latest()
        ->when(request('category'), function($query) {
            $query->whereHas('categories', function ($sub_query) {
                $sub_query->where('id', request('category'));
            });
        })
        ->when(request('search'), function ($q) {
            $q->where('title', 'like', '%' . request('search') . '%');

        })->paginate(10);
        $categories = Category::where('type', 'video')->get();

        return view('front.videos.index', compact('videos', 'categories'));
    }

    public function show($title)
    {
        $video = Video::where('id', request('id'))->with('media')->firstOrFail();
        return view('front.videos.show', compact('video'));
    }

    public function userVideo() {
        $videos = Video::where('author_id', Auth::user()->id)->with('author')->latest()->get();

        return view('front.user_media.video', compact('videos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $video = Video::create([
            'title' => request('title'),
            'author_id' => Auth::user()->id,
            'link' => str_replace('watch?v=', 'embed/', request('link')),
        ]);

        $video
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');
        
        return redirect()->back()->with('success', 'Thêm mới thành công!');
    }

    public function edit($id) {
        $video = Video::where('author_id', Auth::user()->id)->where('id', $id)->with('author')->firstOrFail();

        return view('front.user_media.video_edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title'   => ['required'],
        ]);

        $video = Video::findOrFail($id);

        $video->fill([
            'title'           => request('title'),
            'author_id' => Auth::user()->id,
            'link'            => str_replace('watch?v=', 'embed/', request('link')),
        ])->save();

        $video
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        return redirect()->back()->with('success', 'Chỉnh sửa thành công!');
    }

    public function delete($id)
    {
        $video = Video::where('author_id', Auth::user()->id)->where('id', $id)->firstOrFail();

        $video->delete();

        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
