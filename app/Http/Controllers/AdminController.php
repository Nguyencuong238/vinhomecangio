<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){

        return view('admin.dashboard');
    }

    public function company(){

        $company = Company::orderBy('id', 'desc')
			->when(request('search'), function ($q) {
				$q->where('name', 'like', '%' . request('search') . '%');
			})->paginate(20);

        return view('admin.company.index',compact('company'));
    }

    public function CreateCompany()
    {

        return view('admin.company.add');
    }

    public function storeCompany(Request $request)
	{
		$input = $request->all();
        if($request->has('image')){
            $file = $request->image;
            $file_name = $file->getClientoriginalName();
            $name_image = current(explode('.', $file_name));
            $new_image = $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $new_image);
            // dd($file->move(public_path('uploads', $new_image)));
        }
		$validator = Validator::make($input, [
			// 'image'      	=> 'required|mimes:jpg,gif,png,jpe,jpeg,webp,jfif',
			'name'         	=> 'required|min: 2|max: 255',
			'link'          => 'required',
			'description'  	=> 'required|min: 10',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		}

		$company              	= new Company();
        $company->image        	= $new_image;
		$company->name        	= $request->name;
		$company->description 	= $request->description;
        $company->link        	= $request->link;
		
		$company->save();


		\Session::flash('success_update', __('admin.success_add'));

		return redirect()->route('company');
	}

    public function editCompany($id)
    {   
        $company = Company::where('id', $id)->firstOrFail();;

        return view('admin.company.edit', compact('company'));
    }

    public function updateCompany(Request $request)
	{

        $company = Company::whereId($request->id)->firstOrFail();
        

		$input = $request->all();
        if($request->has('image')){
            $file = $request->image;
            $file_name = $file->getClientoriginalName();
            $name_image = current(explode('.', $file_name));
            $new_image = $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $new_image);

        }
		$validator = Validator::make($input, [
			// 'image'      	=> 'required|mimes:jpg,gif,png,jpe,jpeg,webp,jfif',
			'name'         	=> 'required|min: 2|max: 255',
			'link'          => 'required',
			'description'  	=> 'required|min: 10',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withInput()->withErrors($validator);
		}

        $company->image        	= $new_image;
		$company->name        	= $request->name;
		$company->description 	= $request->description;
        $company->link        	= $request->link;
		
		$company->save();


		\Session::flash('success_update', __('admin.success_add'));

		return redirect()->route('company');
	}

    public function deleteCompany($id)
	{
		$item = Company::findOrFail($id);

		$item->delete();

        return redirect()->back()->with('success', 'Xóa thành công!');
	}

}
