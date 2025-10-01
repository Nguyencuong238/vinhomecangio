<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Video\Store;
use App\Http\Requests\Backend\Video\Update;
use App\Models\Category;
use App\Models\Video;
use GuzzleHttp\Psr7\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('videos.view')) {
            abort(403);
        }
        
        $videos = Video::query()
        ->latest()
        ->with('author', 'media')
        ->when(request('search'), function ($q) {
            $q->where('title', 'like', '%' . request('search') . '%')
            ->orWhereHas('author', function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
        ->when(request('author'), function ($q) {
            $q->whereHas('author', function ($q) {
                $q->where('email', request('author'));
            });
        })
        ->paginate();

        return view('backend.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('videos.create')) {
            abort(403);
        }
        $categories = Category::where('type', 'video')->tree()->get()->toTree();

        return view('backend.videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if (! auth()->user()->can('videos.create')) {
            abort(403);
        }
        $link = str_replace('watch?v=', 'embed/', request('link'));
        $tach = explode('&', $link)[0];        
        $video = Video::create([
            'title'           => request('title'),
            'link'            => $tach,
            'author_id' => $request->user()->id,
        ]);

        $video
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $video->categories()->sync(request('categories'));

        flash(__('Record ":model" created', ['model' => $video->title]), 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! auth()->user()->can('videos.edit')) {
            abort(403);
        }

        $video = Video::with('media')->findOrFail($id);

        $categories = Category::where('type', 'video')->tree()->get()->toTree();

        return view('backend.videos.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        if (! auth()->user()->can('videos.edit')) {
            abort(403);
        }

        $video = Video::findOrFail($id);
        $link = str_replace('watch?v=', 'embed/', request('link'));
        $tach = explode('&', $link)[0]; 
        $video->fill([
            'title'           => request('title'),
            'link'            => $tach,
        ])->save();

        $video
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $video->categories()->sync(request('categories'));

        flash(__('Record ":model" updated', ['model' => $video->title]), 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! auth()->user()->can('videos.delete')) {
            abort(403);
        }

        $video = Video::findOrFail($id);

        $video->delete();

        flash(__('Record ":model" deleted', ['model' => $video->title]), 'success');

        return redirect()->back();
    }


}
