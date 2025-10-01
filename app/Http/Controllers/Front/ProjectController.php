<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectVote;
use App\Models\Review;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {        
        $projects = Project::query()
        ->with('media', 'categories')
        ->when(request('category'), function ($q) {
            $q->whereHas('categories', function ($q) {
                $q->where('id', request('category'));
            });
        })
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })
        ->when(request('sortby'), function ($q) {
            if(request('sortby') == 'desc') {
                $q->latest();
            }
            if(request('sortby') == 'asc') {
                $q->oldest();
            }
        })
        ->paginate(9);

        $category = Category::where('type', 'project')->where('slug', 'trang-vang')->first();

        $categories = $category->children;

        return view('front.projects.index', compact('projects', 'categories'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with('media')->firstOrFail();

        $categories = $project->categories->pluck('id')->toArray();

        $otherProject = Project::whereHas('categories', function ($q) use ($categories) {
            $q->whereIn('id', $categories);
        })
        ->where('id' , '<>', $project->id)
        ->inRandomOrder()
        ->with('media')
        ->take(5)
        ->get();

        $reviews = Review::where('event_id', $project->id)->where('type', 'project')->get();

        return view('front.projects.show', compact('otherProject', 'project', 'reviews'));
    }
}
