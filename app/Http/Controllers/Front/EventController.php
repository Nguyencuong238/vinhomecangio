<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->with('media', 'author:id,name')
            ->latest()
            ->published()
            ->when(request('search'), function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%');
            })->paginate();

        return view('front.events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->published()->with('media')->firstOrFail();
        $reviews = Review::where('event_id', $event->id)->get();
        return view('front.events.show', compact('event', 'reviews'));
    }

    public function postReview(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        Review::create([
           'name' => $request->name,
           'email' => $request->email,
           'comment' => $request->comment,
           'event_id' => $request->event_id,
           'type' => $request->type,
           'rating' => $request->rating,
        ]);

        return back()->with('success','Đánh giá thành công!');
    }
}
