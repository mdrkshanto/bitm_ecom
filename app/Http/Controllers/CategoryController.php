<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category, $categories;

    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|unique:categories,name',
            'description'   =>'nullable',
            'image'         =>'nullable|image',
            'status'        =>'nullable|in:0,1',
        ],[
            'status.in'     =>'Status can only "Active" or "Inactive".'
        ]);

        Category::newCategory($request);
        return back()->with('message', 'Category created successfully.');
    }

    public function manage()
    {
        $this->categories = Category::all();
        return view('admin.category.manage',[
            'categories'=>$this->categories
        ]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.edit',[
            'category'=>$this->category
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'          => 'required|unique:categories,name,'.$id,
            'description'   =>'nullable',
            'image'         =>'nullable|image',
            'status'        =>'required|in:0,1',
        ],[
            'status.in'     =>'Status can only "Active" or "Inactive".'
        ]);

        Category::updateCategory($request, $id);

        return back()->with('message','Category updated successfully.');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return back()->with('message', 'Category deleted successfully.');
    }
}
