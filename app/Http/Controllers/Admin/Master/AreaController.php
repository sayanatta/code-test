<?php

namespace App\Http\Controllers\Admin\Master;

use App\Area;
use App\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('admin.areas.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::latest()->get();
        return View('admin.areas.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'governorate_id' => ['required', 'string'],
            'title' => ['required', 'string'],
            'status' => ['required', 'integer']
        ]);

        // update
        $areas = new Area();
        $areas->governorate_id = $request->governorate_id;
        $areas->title = $request->title;
        $areas->status = $request->status;
        $areas->save();

        return redirect()->route('admin.areas.index')->with('status', 'Area added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $governorates = Governorate::latest()->get();
        return View('admin.areas.edit',compact('governorates','area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'governorate_id' => ['required', 'string'],
            'title' => ['required', 'string'],
            'status' => ['required', 'integer']
        ]);

        // update
        $areas = Area::find($id);
        $areas->governorate_id = $request->governorate_id;
        $areas->title = $request->title;
        $areas->status = $request->status;
        $areas->save();


        return redirect()->route('admin.areas.index')->with('status', 'Area updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areas = Area::where('id',$id)->first();
        $areas->delete();

        return redirect()->back()->with('status', 'Area Deleted successfully!');
    }
}
