<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('projects.view')) {
            abort(403);
        }

        $projects = Project::with('author:id,name', 'media')
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })
        ->latest()
        ->paginate();

        return view('backend.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('projects.create')) {
            abort(403);
        }

        $categories = Category::where('type', 'project')->tree()->get()->toTree();
        $tags = Tag::whereType('project')->get();

        return view('backend.projects.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! auth()->user()->can('projects.create')) {
            abort(403);
        }

        $request->validate([
            'name' => ['required'],
            'body' => ['required'],
        ]);

        $project = Project::create([
            'name'          => request('name'),
            'excerpt'       => request('excerpt'),
            'body'          => request('body'),
            'address'       => request('address'),
            'phone'         => request('phone'),
            'email'         => request('email'),
            'map'           => request('map'),
            'features'      => request('features'),
            'website'       => request('website'),
            'twitter'       => request('twitter'),
            'telegram'      => request('telegram'),
            'author_id'     => request()->user()->id,
            'is_featured'   => request('is_featured'),
            'status'        => request('status'),
        ]);

        $project
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $project
            ->addFromMediaLibraryRequest($request->projectMulti)
            ->toMediaCollection('projectMulti');

        $project->attachTags(request('tags'), 'project');

        if ($request->filled('posts')) {
            $project->posts()->attach(request('posts'));
        }

        $project->categories()->sync(request('categories'));

        flash(__('Record ":model" created', ['model' => $project->name]), 'success');

        return redirect()->route('projects.index');
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
        if (! auth()->user()->can('projects.edit')) {
            abort(403);
        }

        $project = Project::with('posts', 'media')->findOrFail($id);

        $categories = Category::where('type', 'project')->tree()->get()->toTree();

        $tags = Tag::whereType('project')->get();

        return view('backend.projects.edit', compact('project', 'categories', 'tags'));
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
        if (! auth()->user()->can('projects.edit')) {
            abort(403);
        }

        $project = Project::findOrFail($id);

        $request->validate([
            'name' => ['required'],
            'body' => ['required'],
        ]);

        $project->fill([
            'name'          => request('name'),
            'excerpt'       => request('excerpt'),
            'body'          => request('body'),
            'address'       => request('address'),
            'phone'         => request('phone'),
            'email'         => request('email'),
            'map'           => request('map'),
            'features'      => request('features'),
            'website'       => request('website'),
            'twitter'       => request('twitter'),
            'telegram'      => request('telegram'),
            'author_id'     => request()->user()->id,
            'is_featured'   => request('is_featured'),
            'status'        => request('status'),
        ])->save();

        if ($request->filled('posts')) {
            $project->posts()->sync(request('posts'));
        }

        $project
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $project
            ->syncFromMediaLibraryRequest($request->projectMulti)
            ->toMediaCollection('projectMulti');

        $project->categories()->sync(request('categories'));

        $project->syncTagsWithType(request('tags'), 'project');

        flash(__('Record ":model" updated', ['model' => $project->name]), 'success');

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
        if (! auth()->user()->can('projects.delete')) {
            abort(403);
        }

        $project = Project::findOrFail($id);

        $project->delete();

        flash(__('Record ":model" deleted', ['model' => $project->name]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return Project::whereIn('id', $ids)
                ->select('id', 'name as text')
                ->get();
        }
        return Project::where('name', 'like', '%'.$request->query('q').'%')
            ->select('id', 'name as text')
            ->paginate();
    }
}
