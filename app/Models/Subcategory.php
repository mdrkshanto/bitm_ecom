<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    private static $subcategory;

    protected static function newSubcategory($request)
    {
        self::$subcategory = new Subcategory();

        if ($request->file('image')) {
            self::$subcategory->image = storeImage($request->file('image'), 'images/category/', 300, 200);
        }
        self::$subcategory->name           = ucwords($request->name);
        self::$subcategory->category_id    = $request->category_id;
        self::$subcategory->description    = $request->description;
        self::$subcategory->slug           = genSulg($request->name);
        self::$subcategory->save();
        $count = Subcategory::where('name', $request->name)->count();
        if ($count > 1) {
            self::$subcategory->slug = genSulg($request->name, $count, self::$subcategory->id);
            self::$subcategory->save();
        }
    }

    protected static function updateSubcategory($request, $id)
    {
        self::$subcategory = Subcategory::find($id);
        $count = Subcategory::where('name', $request->name)->count();
        if ($request->file('image')) {
            if (file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }
            self::$subcategory->image = storeImage($request->file('image'), 'images/category/', 300, 200);
        }
        self::$subcategory->name           = ucwords($request->name);
        self::$subcategory->category_id    = $request->category_id;
        self::$subcategory->description    = $request->description;
        self::$subcategory->slug           = genSulg($request->name, $count, self::$subcategory->id);
        self::$subcategory->status         = $request->status;
        self::$subcategory->save();
    }

    protected static function deleteSubcategory($id)
    {

        self::$subcategory = Subcategory::find($id);

        if (file_exists(self::$subcategory->image)) {
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
