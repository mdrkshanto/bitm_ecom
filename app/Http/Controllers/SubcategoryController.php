<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    private $subcategory, $subcategories, $categories;

    public function index()
    {
        $this->categories = Category::orderBy('name','asc')->get();
        return view('admin.subcategory.index',[
            'categories' => $this->categories
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|unique:subcategories,name',
            'category_id'   => 'required|exists:categories,id',
            'description'   => 'nullable',
            'image'         => 'nullable|image',
            'status'        => 'nullable|in:0,1'
        ],[
            'category_id.required'  => 'Must select a category.',
            'category_id.exists'    => 'The selected category is not exist.',
            'status.in'             => 'Status can only "Active" or "Inactive".'
        ]);

        Subcategory::newSubcategory($request);
        return back()->with('message', 'Subcategory created successfully.');
    }

    public function manage()
    {
        $this->subcategories = Subcategory::orderBy('name','asc')->get();
        return view('admin.subcategory.manage',[
            'subcategories' => $this->subcategories
        ]);
    }

    public function edit($id)
    {
        $this->subcategory = Subcategory::find($id);
        $this->categories = Category::orderBy('name','asc')->get();
        return view('admin.subcategory.edit',[
            'subcategory'   => $this->subcategory,
            'categories'    => $this->categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'          =>'required|unique:subcategories,name,'.$id,
            'category_id'   => 'required|exists:categories,id',
            'description'   =>'nullable',
            'image'         =>'nullable|image',
            'status'        =>'required|in:0,1'
        ],[
            'category_id.required'  => 'Must select a category.',
            'category_id.exists'    => 'The selected category is not exist.',
            'status.in'             =>'Status can only "Active" or "Inactive".'
        ]);

        Subcategory::updateSubcategory($request, $id);
        return back()->with('message','Subcategory updated successfully.');
    }

    public function delete($id)
    {
        Subcategory::deleteSubcategory($id);
        return back()->with('message', 'Subcategory deleted successfully.');
    }
}
