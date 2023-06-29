<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    private static $unit;

    protected static function newUnit($request)
    {
        self::$unit = new Unit();

        self::$unit->name           = ucwords($request->name);
        self::$unit->description    = $request->description;
        self::$unit->slug           = genSulg($request->name);
        self::$unit->save();
        $count = Unit::where('name', $request->name)->count();
        if ($count > 1) {
            self::$unit->slug = genSulg($request->name, $count, self::$unit->id);
            self::$unit->save();
        }
    }

    protected static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        $count = Unit::where('name', $request->name)->count();

        self::$unit->name           = ucwords($request->name);
        self::$unit->description    = $request->description;
        self::$unit->slug           = genSulg($request->name, $count, self::$unit->id);
        self::$unit->status         = $request->status;
        self::$unit->save();
    }

    protected static function deleteUnit($id)
    {

        self::$unit = Unit::find($id);

        self::$unit->delete();
    }
}
