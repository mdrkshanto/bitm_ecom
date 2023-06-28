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
}
