<?php

namespace App\Http\Controllers\Backend\Nid;

use App\Http\Controllers\Controller;
use App\Models\Zilla;
use Illuminate\Http\Request;

class ZillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Zilla::all();
        return view('backend.nid.zilla.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nid.zilla.create');
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
            'name' => 'required | uniquez:illas,name',
        ]);
        $insert= new Zilla();
        $insert->name=$request->name;
        $insert->save();
        return redirect(route('backend.zilla.index'))->with('success', 'Data add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zilla  $zilla
     * @return \Illuminate\Http\Response
     */
    public function show(Zilla $zilla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zilla  $zilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Zilla $zilla)
    {
        $id=$zilla->id;
        $allData=Zilla::find($id);
        return view('backend.nid.zilla.edit', compact('allData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zilla  $zilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zilla $zilla)
    {
        $validated = $request->validate([
            'name' => 'required | unique:zillas,name',
        ]);
        $id=$zilla->id;
        $updateData=Zilla::find($id);
        $updateData->name=$request->name;
        $updateData->save();
        return redirect(route('backend.zilla.index'))->with('success', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zilla  $zilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zilla $zilla)
    {
        //
    }
    public function zillaDelete($id){
        $delete = Zilla::find($id);
        $delete->delete();
        return redirect(route('backend.zilla.index'))->with('success', 'Data delete successfully');
    }
}
