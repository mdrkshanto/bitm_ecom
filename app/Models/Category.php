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
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->slug = genSulg($request->name);
        self::$category->save();
        $count = Category::where('name', $request->name)->count();
        if ($count > 1) {
            self::$category->slug = genSulg($request->name, $count, self::$category->id);
            self::$category->save();
        }
    }
}
