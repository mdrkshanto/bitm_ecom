<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    private $unit, $units;

    public function index()
    {
        return view('admin.unit.index');
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|unique:units,name',
            'description'   =>'nullable',
            'status'        =>'nullable|in:0,1',
        ],[
            'status.in'     =>'Status can only "Active" or "Inactive".'
        ]);

        Unit::newUnit($request);
        return back()->with('message', 'Unit created successfully.');
    }

    public function manage()
    {
        $this->units = Unit::orderBy('name','asc')->get();
        return view('admin.unit.manage',[
            'units'=>$this->units
        ]);
    }

    public function edit($id)
    {
        $this->unit = Unit::find($id);
        return view('admin.unit.edit',[
            'unit'=>$this->unit
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'          => 'required|unique:units,name,'.$id,
            'description'   =>'nullable',
            'status'        =>'required|in:0,1',
        ],[
            'status.in'     =>'Status can only "Active" or "Inactive".'
        ]);

        Unit::updateUnit($request, $id);

        return back()->with('message','Unit updated successfully.');
    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return back()->with('message', 'Unit deleted successfully.');
    }
}
