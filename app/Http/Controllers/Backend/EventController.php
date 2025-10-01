<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Event\Store;
use App\Http\Requests\Backend\Event\Update;
use App\Models\Category;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('events.view')) {
            abort(403);
        }

        $events = Event::query()
            ->latest()
            ->with('author', 'categories', 'tags')
            ->when(request('search'), function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%')
                ->orWhereHas('author', function ($q) {
                    $q->where('name', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('category'), function ($q) {
                $q->whereHas('categories', function ($q) {
                    $q->where('slug', request('category'));
                });
            })
            ->when(request('author'), function ($q) {
                $q->whereHas('author', function ($q) {
                    $q->where('email', request('author'));
                });
            })
            ->when(request('tag'), function ($q) {
                $q->whereHas('tags', function ($q) {
                    $q->where('slug', request('tag'));
                });
            })
            ->paginate();

        return view('backend.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('events.create')) {
            abort(403);
        }

        $categories = Category::where('type', 'event')->tree()->get()->toTree();

        $tags = Tag::whereType('event')->get();

        return view('backend.events.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if (! auth()->user()->can('events.create')) {
            abort(403);
        }

        $event = Event::create([
            'title'       => request('title'),
            'status'      => request('status'),
            'body'        => request('body'),
            'phone'       => request('phone'),
            'address'     => request('address'),
            'email'       => request('email'),
            'website'     => request('website'),
            'map'         => request('map'),
            'feature'     => request('feature'),
            'meta'        => [
                'meta_title'       => request('meta_tilte'),
                'meta_description' => request('meta_description'),
            ],
            'author_id' => $request->user()->id,
        ]);

        $event
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $event
            ->addFromMediaLibraryRequest($request->album)
            ->toMediaCollection('eventMulti');

        $event->categories()->sync(request('categories'));

        $event->attachTags(request('tags'), 'event');

        flash(__('Record ":model" created', ['model' => $event->title]), 'success');

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
        if (! auth()->user()->can('events.edit')) {
            abort(403);
        }

        $event = Event::with('media')->findOrFail($id);

        $categories = Category::where('type', 'event')->tree()->get()->toTree();

        $tags = Tag::whereType('event')->get();

        return view('backend.events.edit', compact('categories', 'tags', 'event'));
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
        if (! auth()->user()->can('events.edit')) {
            abort(403);
        }

        $event = Event::findOrFail($id);

        $event->fill([
            'title'       => request('title'),
            'status'      => request('status'),
            'body'        => request('body'),
            'phone'       => request('phone'),
            'address'     => request('address'),
            'email'       => request('email'),
            'website'     => request('website'),
            'map'         => request('map'),
            'feature'     => request('feature'),
            'meta'        => [
                'meta_title'       => request('meta_tilte'),
                'meta_description' => request('meta_description'),
            ],
            'author_id' => $request->user()->id,
        ])->save();

        $event
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $event
            ->syncFromMediaLibraryRequest($request->eventMulti)
            ->toMediaCollection('eventMulti');

        $event->categories()->sync(request('categories'));

        $event->syncTagsWithType(request('tags'), 'event');

        flash(__('Record ":model" updated', ['model' => $event->title]), 'success');

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
        if (! auth()->user()->can('events.delete')) {
            abort(403);
        }

        $event = Event::findOrFail($id);

        $event->delete();

        $event->categories()->sync([]);

        $event->tags()->sync([]);

        flash(__('Record ":model" deleted', ['model' => $event->name]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return Event::whereIn('id', $ids)
                ->select('id', 'title as text')
                ->get();
        }
        return Event::where('title', 'like', '%'.$request->query('q').'%')
            ->select('id', 'title as text')
            ->paginate();
    }
}
