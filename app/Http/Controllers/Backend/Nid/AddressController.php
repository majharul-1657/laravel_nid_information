<?php

namespace App\Http\Controllers\Backend\Nid;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Address::all();
        return view('backend.nid.address.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nid.address.create');
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
            'name' => 'required | unique:addresses,name',
        ]);
        $insert= new Address();
        $insert->name=$request->name;
        $insert->save();
        return redirect(route('backend.address.index'))->with('success', 'Data add successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $id=$address->id;
        $allData=Address::find($id);
        return view('backend.nid.address.edit', compact('allData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'name' => 'required | unique:addresses,name',
        ]);
        $id=$address->id;
        $updateData=Address::find($id);
        $updateData->name=$request->name;
        $updateData->save();
        return redirect(route('backend.address.index'))->with('success', 'Data update successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
    public function addressDelete($id){
        $delete = Address::find($id);
        $delete->delete();
        return redirect(route('backend.address.index'))->with('success', 'Data delete successfully');
    }
}
