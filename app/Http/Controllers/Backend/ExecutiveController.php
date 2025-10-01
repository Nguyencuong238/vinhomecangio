<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Executive;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function index()
    {
        // if (! auth()->user()->can('executive.view')) {
        //     abort(403);
        // }
        $executives = Executive::query()
        ->latest()
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })
        ->paginate();
        return view('backend.executive.index', compact('executives'));
    }

    public function create()
    {
        // if (! auth()->user()->can('executive.create')) {
        //     abort(403);
        // }

        return view('backend.executive.create');
    }

    public function store(Request $request)
    {
        // if (! auth()->user()->can('executive.create')) {
        //     abort(403);
        // }

        $request->validate([
            'name' => 'required',
        ]);

        $executive = Executive::create([
            'name'           => request('name'),
            'position'     => request('position'),
        ]);

        flash(__('Record ":model" created', ['model' => $executive->name]), 'success');
        return redirect()->back();
    }

    public function edit($id)
    {
        // if (! auth()->user()->can('executive.edit')) {
        //     abort(403);
        // }

        $executive = Executive::findOrFail($id);

        return view('backend.executive.edit', compact('executive'));
    }

    public function update(Request $request, $id)
    {
        // if (! auth()->user()->can('executive.edit')) {
        //     abort(403);
        // }

        $executive = Executive::findOrFail($id);

        $executive->fill([
            'name'           => request('name'),
            'position'     => request('position'),
        ])->save();

        flash(__('Record ":model" updated', ['model' => $executive->name]), 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        // if (! auth()->user()->can('executive.delete')) {
        //     abort(403);
        // }

        $executive = Executive::findOrFail($id);
        $executive->delete();

        flash(__('Record ":model" deleted', ['model' => $executive->name]), 'success');

        return redirect()->back();
    }
}
