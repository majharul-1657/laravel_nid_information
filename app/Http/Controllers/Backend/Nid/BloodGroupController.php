<?php

namespace App\Http\Controllers\Backend\Nid;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use Illuminate\Http\Request;

class BloodGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=BloodGroup::all();
        return view('backend.nid.bloodgroup.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nid.bloodgroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | unique:blood_groups,name',
        ]);
        $insert= new BloodGroup();
        $insert->name=$request->name;
        $insert->save();
        return redirect(route('backend.bloodgroup.index'))->with('success', 'Data add successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function show(BloodGroup $bloodGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodGroup $bloodGroup, $id)
    {
        $allData=BloodGroup::find($id);
        return view('backend.nid.bloodgroup.edit', compact('allData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodGroup $bloodGroup, $id)
    {
        $validated = $request->validate([
            'name' => 'required | unique:blood_groups,name',
        ]);
        $updateData=BloodGroup::find($id);
        $updateData->name=$request->name;
        $updateData->save();
        return redirect(route('backend.bloodgroup.index'))->with('success', 'Data update successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodGroup  $bloodGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodGroup $bloodGroup)
    {
        //
    }
    public function bloodGroupDelete($id){
        $delete = BloodGroup::find($id);
        $delete->delete();
        return redirect(route('backend.bloodgroup.index'))->with('success', 'Data delete successfully');
    }
}
