<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::query()
        ->latest()
        ->when(request('search'), function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        })
        ->paginate();
        return view('backend.department.index', compact('departments'));
    }

    public function create()
    {
        return view('backend.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'numeric',
            'introduction' => 'required',
            'activity' => 'required',
        ]);

        $department = Department::create([
            'name'           => request('name'),
            'address'     => request('address'),
            'contact'            => request('contact'),
            'amount'            => request('amount'),
            'introduction'            => request('introduction'),
            'activity'            => request('activity'),
        ]);

        flash(__('Record ":model" created', ['model' => $department->name]), 'success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('backend.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $department->fill([
            'name'           => request('name'),
            'address'     => request('address'),
            'contact'            => request('contact'),
            'amount'            => request('amount'),
            'introduction'            => request('introduction'),
            'activity'            => request('activity'),
        ])->save();

        flash(__('Record ":model" updated', ['model' => $department->name]), 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        flash(__('Record ":model" deleted', ['model' => $department->name]), 'success');

        return redirect()->back();
    }
}
