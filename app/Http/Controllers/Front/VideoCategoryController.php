<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Video;
use COM;

class VideoCategoryController extends Controller
{
    public function __invoke($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

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

        $videos = Video::query()
            ->latest()
            ->whereHas('categories', function ($q) use ($category, $treeIds) {
                $q->whereIn('id', $treeIds);
            })
            ->with('media', 'author:id,name')
            ->paginate();

            return view('front.videos.index', compact('videos', 'category'));
    }
}
