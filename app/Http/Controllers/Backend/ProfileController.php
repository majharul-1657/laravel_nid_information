<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $allData = User::find($id);
        return view('backend.profile.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $allData=User::find($id);
        return view('backend.profile.edit', compact('allData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $update=User::find($id);
        $update->name=$request->name;
        $update->mobile=$request->mobile;
        $update->address=$request->address;
        $update->email=$request->email;
        $update->gender=$request->gender;
        $update->email=$request->email;
        $photo=$request->file('photo');
        if($photo){
            $photo_name =date('YmdHi').'.'.$photo->getClientOriginalExtension();
            $upload=$photo->move(public_path('storage/upload/user_photo/'),$photo_name);
            @unlink(public_path(('storage/upload/user_photo/'.$update->photo)));
            $update->photo=$photo_name;
            //if(file_exists($path)){
             //  unlink($path);
           // }
        }
        $update->save();
        return redirect(route('backend.profile.index'))->with('success', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
