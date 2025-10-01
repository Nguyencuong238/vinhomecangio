<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Event;
use App\Models\Video;
use Illuminate\Session\Store;
use Illuminate\Http\Request;
use Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::query()
        ->with('media', 'categories')
        ->latest()
        ->when(request('category'), function($q) {
            $q->whereHas('categories', function ($sub) {
                $sub->where('id', request('category'));
            });
        })
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })->paginate(10);
        
        $categories = Category::where('type', 'image')->get();

        return view('front.albums.index', compact('albums', 'categories'));
    }

    public function show($name)
    {
        $album = Album::where('name', $name)->where('id', request('id'))->with('media')->firstOrFail();
        return view('front.albums.show', compact('album'));
    }

    public function userAlbum() {
        $albums = Album::where('author_id', Auth::user()->id)->with('author')->latest()->get();

        return view('front.user_media.album', compact('albums'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required'
        ]);

        $album = Album::create([
            'name' => $req->name,
            'status' => $req->status=='on' ? 1 : 0,
            'author_id' => Auth::user()->id
        ]);

        $album
            ->addFromMediaLibraryRequest($req->media)
            ->toMediaCollection('media');

        $album
            ->addFromMediaLibraryRequest($req->album)
            ->toMediaCollection('album');
        
        return redirect()->back()->with('success', 'Thêm mới thành công!');
    }

    public function edit($id) {
        $album = Album::where('author_id', Auth::user()->id)->where('id', $id)->with('author')->firstOrFail();

        return view('front.user_media.album_edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        $request->validate([
            'name'   => ['required'],
        ]);

        $album->fill([
            'name'      => request('name'),
            'status'    => request('status')=='on' ? 1 : 0,
        ])->save();

        $album
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $album
            ->syncFromMediaLibraryRequest($request->album)
            ->toMediaCollection('album');

        $album->categories()->sync(request('categories'));

        return redirect()->back()->with('success', 'Chỉnh sửa thành công!');
    }

    public function delete($id)
    {
        $album = Album::where('author_id', Auth::user()->id)->where('id', $id)->firstOrFail();

        $album->delete();

        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
