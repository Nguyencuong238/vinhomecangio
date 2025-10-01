<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Executive;
use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;

class PostCategoryController extends Controller
{
    public function __invoke($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        if ($category->type == 'image') {
            return redirect()->route('front.albums.index');
        } elseif ($category->type == 'video') {
            return redirect()->route('front.videos.index', ['category' => $category->id == 117 ? 0 : $category->id]);
        } elseif ($category->type == 'project') {
            return redirect()->route('front.projects.index', ['category' => $category->id]);
        }

        $query = \DB::table('categories')
                    ->whereSlug($category->slug)
                    ->unionAll(
                        \DB::table('categories')
                            ->select('categories.*')
                            ->join('tree', 'tree.id', '=', 'categories.parent_id')
                    );

        $treeIds = \DB::table('tree')
                    ->withRecursiveExpression('tree', $query)
                    ->pluck('tree.id')
                    ->toArray();

        $posts = Post::query()
            ->latest()
            ->whereHas('categories', function ($q) use ($category, $treeIds) {
                $q->whereIn('id', $treeIds);
            })
            ->with('media', 'author:id,name')
            ->paginate();

        $departmentInfo = Department::all();

        return view('front.posts.index', compact('posts', 'category', 'departmentInfo'));
    }
}
