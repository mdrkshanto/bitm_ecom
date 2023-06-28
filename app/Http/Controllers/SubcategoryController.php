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
        $this->categories = Category::all();
        return view('admin.subcategory.index',[
            'categories'=>$this->categories
        ]);
    }

    public function create(Request $request)
    {
        Subcategory::newSubcategory($request);
        return back()->with('message', 'Subcategory created successfully.');
    }

    public function manage()
    {
        $this->subcategories = Subcategory::all();
        return view('admin.subcategory.manage',[
            'subcategories'=>$this->subcategories
        ]);
    }

    public function edit($id)
    {
        $this->subcategory = Subcategory::find($id);
        $this->categories = Category::all();
        return view('admin.subcategory.edit',[
            'subcategory'=>$this->subcategory,
            'categories'=>$this->categories
        ]);
    }

    public function update(Request $request, $id)
    {
        Subcategory::updateSubcategory($request, $id);
        return back()->with('message','Subcategory updated successfully.');
    }

    public function delete($id)
    {
        Subcategory::deleteSubcategory($id);
        return back()->with('message', 'Subcategory deleted successfully.');
    }
}
