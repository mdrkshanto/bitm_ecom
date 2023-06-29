<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    private $brand, $brands;

    public function index()
    {
        return view('admin.brand.index');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|unique:brands,name',
            'description'   =>'nullable',
            'image'         =>'nullable|image',
            'status'        =>'nullable|in:0,1',
        ],[
            'status.in'     =>'Status can only "Active" or "Inactive".'
        ]);

        Brand::newBrand($request);
        return back()->with('message', 'Brand created successfully.');
    }

    public function manage()
    {
        $this->brands = Brand::orderBy('name','asc')->get();
        return view('admin.brand.manage',[
            'brands'=>$this->brands
        ]);
    }

    public function edit($id)
    {
        $this->brand = Brand::find($id);
        return view('admin.brand.edit',[
            'brand'=>$this->brand
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'          => 'required|unique:brands,name,'.$id,
            'description'   =>'nullable',
            'image'         =>'nullable|image',
            'status'        =>'required|in:0,1',
        ],[
            'status.in'     =>'Status can only "Active" or "Inactive".'
        ]);

        Brand::updateBrand($request, $id);

        return back()->with('message','Brand updated successfully.');
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message', 'Brand deleted successfully.');
    }
}
