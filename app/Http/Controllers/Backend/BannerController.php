<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Banner\Store;
use App\Http\Requests\Backend\Banner\Update;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('banners.view')) {
            abort(403);
        }

        $banners = Banner::query()
            ->latest()
            ->with('media')
            ->when(request('search'), function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%');
            })
            ->paginate();

        return view('backend.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('banners.create')) {
            abort(403);
        }

        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if (! auth()->user()->can('banners.create')) {
            abort(403);
        }

        $banner = Banner::create([
            'title'           => request('title'),
            'description'     => request('description'),
            'link'            => request('link'),
        ]);

        $banner
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        flash(__('Record ":model" created', ['model' => $banner->title]), 'success');

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
        if (! auth()->user()->can('banners.edit')) {
            abort(403);
        }

        $banner = Banner::with('media')->findOrFail($id);

        return view('backend.banners.edit', compact('banner'));
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
        if (! auth()->user()->can('banners.edit')) {
            abort(403);
        }

        $banner = Banner::findOrFail($id);

        $banner->fill([
            'title'           => request('title'),
            'description'     => request('description'),
            'link'            => request('link'),
        ])->save();

        $banner
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        flash(__('Record ":model" updated', ['model' => $banner->title]), 'success');

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
        if (! auth()->user()->can('banners.delete')) {
            abort(403);
        }

        $banner = Banner::findOrFail($id);
        $banner->delete();

        flash(__('Record ":model" deleted', ['model' => $banner->title]), 'success');

        return redirect()->back();
    }
}
