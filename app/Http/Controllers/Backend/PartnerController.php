<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Partner\Store;
use App\Http\Requests\Backend\Partner\Update;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })->paginate();

        return view('backend.partners.index', compact('partners'));
    }

    public function create(){

        return view('backend.partners.create');
    }

    public function store(Store $request)
    {

        $partner = Partner::create([
            'name'          => request('name'),
            'twitter_url'   => request('twitter_url'),
            'facebook_url'  => request('facebook_url'),
            'telegram_url'  => request('telegram_url'),
            'website_url'   => request('website_url'),
        ]);

        $partner
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        flash(__('Record ":model" created', ['model' => $partner->name]), 'success');

        return redirect()->back();
    }

    public function edit($id){

        $partner = Partner::find($id);

        return view('backend.partners.edit', compact('partner'));
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
        if (! auth()->user()->can('partners.edit')) {
            abort(403);
        }

        $partner = partner::findOrFail($id);

        $partner->fill([
            'name'          => request('name'),
            'twitter_url'   => request('twitter_url'),
            'facebook_url'  => request('facebook_url'),
            'telegram_url'  => request('telegram_url'),
            'website_url'   => request('website_url'),
        ])->save();

        $partner
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        flash(__('Record ":model" updated', ['model' => $partner->name]), 'success');

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
        if (! auth()->user()->can('partners.delete')) {
            abort(403);
        }

        $partner = partner::findOrFail($id);

        $partner->delete();

        flash(__('Record ":model" deleted', ['model' => $partner->name]), 'success');

        return redirect()->back();
    }
}
