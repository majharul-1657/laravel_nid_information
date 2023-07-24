<?php

namespace App\Http\Controllers\Backend\Nid;

use App\Http\Controllers\Controller;
use App\Models\UpoZilla;
use Illuminate\Http\Request;

class UpoZillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=UpoZilla::all();
        return view('backend.nid.upozilla.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nid.upozilla.create');
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
            'name' => 'required | unique:upo_zillas,name',
        ]);
        $insert= new UpoZilla();
        $insert->name=$request->name;
        $insert->save();
        return redirect(route('backend.upozilla.index'))->with('success', 'Data add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpoZilla  $upoZilla
     * @return \Illuminate\Http\Response
     */
    public function show(UpoZilla $upoZilla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpoZilla  $upoZilla
     * @return \Illuminate\Http\Response
     */
    public function edit(UpoZilla $upoZilla, $id)
    {
        $allData=UpoZilla::find($id);
        return view('backend.nid.upozilla.edit', compact('allData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpoZilla  $upoZilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpoZilla $upoZilla, $id)
    {
        $validated = $request->validate([
            'name' => 'required | unique:upo_zillas,name',
        ]);
        $updateData=UpoZilla::find($id);
        $updateData->name=$request->name;
        $updateData->save();
        return redirect(route('backend.upozilla.index'))->with('success', 'Data update successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpoZilla  $upoZilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpoZilla $upoZilla)
    {
        //
    }
    public function upoZillaDelete($id){
        $delete = UpoZilla::find($id);
        $delete->delete();
        return redirect(route('backend.upozilla.index'))->with('success', 'Data delete successfully');
    }
}
