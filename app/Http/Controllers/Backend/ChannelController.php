<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Channel\Store;
use App\Http\Requests\Backend\Channel\Update;
use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    //
    public function index()
    {
        $channels = Channel::when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })->paginate();

        return view('backend.channels.index', compact('channels'));
    }

    public function create(){

        return view('backend.channels.create');
    }

    public function store(Store $request)
    {

        $channel = Channel::create([
            'name'          => request('name'),
            'excerpt'       => request('excerpt'),
            'description'   => request('description'),
            'link'          => request('link'),
            'type'          => request('type')
        ]);

        $channel
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $channel
            ->addFromMediaLibraryRequest($request->channelCover)
            ->toMediaCollection('channelCover');


        flash(__('Record ":model" created', ['model' => $channel->name]), 'success');

        return redirect()->back();
    }

    public function edit($id){

        $channel = Channel::find($id);

        return view('backend.channels.edit', compact('channel'));
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
        if (! auth()->user()->can('channels.edit')) {
            abort(403);
        }

        $channel = channel::findOrFail($id);

        $channel->fill([
            'name'          => request('name'),
            'excerpt'       => request('excerpt'),
            'description'   => request('description'),
            'link'          => request('link'),
            'type'          => request('type'),
            'created_at'    => request('date'),
        ])->save();

        $channel
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $channel
            ->syncFromMediaLibraryRequest($request->channelCover)
            ->toMediaCollection('channelCover');

        flash(__('Record ":model" updated', ['model' => $channel->name]), 'success');

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
        if (! auth()->user()->can('channels.delete')) {
            abort(403);
        }

        $channel = channel::findOrFail($id);

        $channel->delete();

        flash(__('Record ":model" deleted', ['model' => $channel->name]), 'success');

        return redirect()->back();
    }

    public function changeDate(Request $request) {
        $channel = channel::findOrFail($request->id);

        $channel->created_at = $request->date;
        $channel->save();
    }
}
