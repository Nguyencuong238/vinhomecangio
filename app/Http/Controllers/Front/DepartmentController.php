<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Department;
use App\Models\Executive;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::where('user_id', Auth::user()->id)->with('media')->firstOrNew();
        
        return view('front.user.department', compact('department'));
    }

    public function save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'amount' => 'numeric',
            'contact' => 'required',
        ]);
        $department = Department::where('user_id', Auth::user()->id)->first();
        if($department) {
            $department->update([
                'name' => $req->name,
                'address' => $req->address,
                'amount' => $req->amount,
                'introduction' => $req->introduction,
                'activity' => $req->activity,
                'contact' => $req->contact,
                'type' => $req->type,
            ]);
        } else {
            $department = Department::create([
                'name' => $req->name,
                'address' => $req->address,
                'amount' => $req->amount,
                'introduction' => $req->introduction,
                'activity' => $req->activity,
                'contact' => $req->contact,
                'type' => $req->type,
                'user_id' => Auth::user()->id
            ]);
        }
        $department
            ->syncFromMediaLibraryRequest($req->media)
            ->toMediaCollection('media');
        
        return redirect()->back()->with('success', '');
    }

    public function listAll(){
        $departments = Department::query()
        ->with('media')
        ->when(request('type'), function ($q) {
            $q->where('type', request('type'));
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

        $categories = Category::where('type', 'project')->with(['ancestors' => function ($q) {
            $q->breadthFirst();
        }])->get();
        
        return view('front.departments.index', compact('departments'));
    }

    public function show($slug, $id){
        $department = Department::findOrFail($id);
        $executive = Executive::where('user_id', $department->user_id)->get();
        $posts = Post::where('author_id', $department->user_id)->get();
        $albums = Album::where('author_id', $department->user_id)->get();
        return view('front.departments.show', compact('department', 'executive', 'posts', 'albums'));
    }

}
