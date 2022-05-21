<?php

namespace App\Http\Controllers\Admin\Master;

use App\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();
        return view('admin.governorates.all',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.governorates.add');
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
            'title' => ['required', 'string'],
            'status' => ['required', 'integer']
        ]);

        // update
        $governorates = new Governorate();
        $governorates->title = $request->title;
        $governorates->status = $request->status;
        $governorates->save();

        return redirect()->route('admin.governorates.index')->with('status', 'Governorate added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function edit(Governorate $governorate)
    {
        return View('admin.governorates.edit', compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => ['required', 'string'],
            'status' => ['required', 'integer']
        ]);

        // update
        $governorate = Governorate::find($id);
        $governorate->title = $request->title;
        $governorate->status = $request->status;
        $governorate->save();


        return redirect()->route('admin.governorates.index')->with('status', 'Governorate updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Governorate  $governorate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $governorate = Governorate::where('id',$id)->first();
        $governorate->delete();

        return redirect()->back()->with('status', 'Governorate Deleted successfully!');
    }
}
