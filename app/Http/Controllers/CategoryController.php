<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category, $categories;

    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
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
        Category::updateCategory($request, $id);

        return back()->with('message','Category updated successfully.');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return back()->with('message', 'Category deleted successfully.');
    }
}
