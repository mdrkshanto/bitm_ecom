<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $brand;

    protected static function newBrand($request)
    {
        self::$brand = new Brand();

        if ($request->file('image')) {
            self::$brand->image = storeImage($request->file('image'), 'images/brand/', 150, 100);
        }
        self::$brand->name           = ucwords($request->name);
        self::$brand->description    = $request->description;
        self::$brand->slug           = genSulg($request->name);
        self::$brand->save();
        $count = Brand::where('name', $request->name)->count();
        if ($count > 1) {
            self::$brand->slug = genSulg($request->name, $count, self::$brand->id);
            self::$brand->save();
        }
    }

    protected static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        $count = Brand::where('name', $request->name)->count();
        if ($request->file('image')) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = storeImage($request->file('image'), 'images/brand/', 300, 200);
        }
        self::$brand->name           = ucwords($request->name);
        self::$brand->description    = $request->description;
        self::$brand->slug           = genSulg($request->name, $count, self::$brand->id);
        self::$brand->status         = $request->status;
        self::$brand->save();
    }

    protected static function deleteBrand($id)
    {

        self::$brand = Brand::find($id);

        if (file_exists(self::$brand->image)) {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
