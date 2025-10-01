<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Executive;
use Illuminate\Http\Request;
use Auth;

class ExecutiveController extends Controller
{
    public function index()
    {
        $executives = Executive::where('user_id', Auth::user()->id)->latest()->get();

        return view('front.executives.index', compact('executives'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'position' => 'required'
        ]);

        $executive = Executive::create([
            'name' => $req->name,
            'position' => $req->position,
            'user_id' => Auth::user()->id
        ]);
        $executive
            ->addFromMediaLibraryRequest($req->media)
            ->toMediaCollection('media');
        
        return redirect()->route('executives.index')->with('success', 'Thêm mới thành công!');
    }

    public function edit($id) {
        $executive = Executive::where('id', $id)->with('media')->first();

        return view('front.executives.edit', compact('executive'));
    }

    public function update(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'position' => 'required'
        ]);
        $executive = Executive::where('id', $req->id)->first();
        if($executive) {
            $executive->update([
                'name' => $req->name,
                'position' => $req->position,
            ]);
        } else {
            $executive = Executive::create([
                'name' => $req->name,
                'position' => $req->position,
                'user_id' => Auth::user()->id
            ]);
        }
        $executive
            ->syncFromMediaLibraryRequest($req->media)
            ->toMediaCollection('media');
        
        return redirect()->route('executives.index')->with('success', 'Cập nhật thành công!');
    }

    public function delete(Request $req, $id)
    {
        $executive = Executive::findOrFail($id);
        $executive->delete();

        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
