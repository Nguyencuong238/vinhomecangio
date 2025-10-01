<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('albums.view')) {
            abort(403);
        }
        $albums = Album::with('media')
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })
        ->paginate();

        return view('backend.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('albums.create')) {
            abort(403);
        }

        $categories = Category::where('type', 'image')->tree()->get()->toTree();

        return view('backend.albums.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! auth()->user()->can('albums.create')) {
            abort(403);
        }

        $request->validate([
            // 'name' => ['required'],
        ]);

        $album = Album::create([
            'name'      => request('name'),
            'status'    => request('status'),
            'is_featured'    => request('is_featured'),
        ]);

        $album
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        // $album
        //     ->addFromMediaLibraryRequest($request->album)
        //     ->toMediaCollection('album');

        $album->categories()->sync(request('categories'));

        flash(__('Record ":model" created', ['model' => $album->name]), 'success');

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
        if (! auth()->user()->can('albums.edit')) {
            abort(403);
        }

        $album = Album::findOrFail($id);
        $categories = Category::where('type', 'image')->tree()->get()->toTree();

        return view('backend.albums.edit', compact('album', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! auth()->user()->can('albums.edit')) {
            abort(403);
        }

        $album = Album::findOrFail($id);

        $request->validate([
            // 'name'   => ['required'],
        ]);

        $album->fill([
            'name'      => request('name'),
            'status'    => request('status'),
            'is_featured'    => request('is_featured'),
        ])->save();

        $album
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        // $album
        //     ->syncFromMediaLibraryRequest($request->albums)
        //     ->toMediaCollection('album');

        $album->categories()->sync(request('categories'));

        flash(__('Record ":model" updated', ['model' => $album->name]), 'success');

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
        if (! auth()->user()->can('albums.delete')) {
            abort(403);
        }

        $album = Album::findOrFail($id);

        $album->delete();

        flash(__('Record ":model" deleted', ['model' => $album->name]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return Album::whereIn('id', $ids)
                ->select('id', 'name as text')
                ->get();
        }
        return Album::where('name', 'like', '%'.$request->query('q').'%')
            ->select('id', 'name as text')
            ->paginate();
    }
}
