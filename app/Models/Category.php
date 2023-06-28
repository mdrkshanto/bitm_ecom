<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $category;

    protected static function newCategory($request)
    {
        self::$category = new Category();

        if ($request->file('image')) {
            self::$category->image = storeImage($request->file('image'), 'images/category/', 300, 200);
        }
        self::$category->name           = ucwords($request->name);
        self::$category->description    = $request->description;
        self::$category->slug           = genSulg($request->name);
        self::$category->save();
        $count = Category::where('name', $request->name)->count();
        if ($count > 1) {
            self::$category->slug = genSulg($request->name, $count, self::$category->id);
            self::$category->save();
        }
    }

    protected static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        $count = Category::where('name', $request->name)->count();
        if ($request->file('image')) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
            self::$category->image = storeImage($request->file('image'), 'images/category/', 300, 200);
        }
        self::$category->name           = ucwords($request->name);
        self::$category->description    = $request->description;
        self::$category->slug           = genSulg($request->name, $count, self::$category->id);
        self::$category->status         = $request->status;
        self::$category->save();
    }

    protected static function deleteCategory($id)
    {

        self::$category = Category::find($id);

        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
