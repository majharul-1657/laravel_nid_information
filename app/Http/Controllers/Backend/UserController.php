<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = User::all();
        return view('backend.user.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $insert= new User();
      $insert->usertype=$request->usertype;
      $insert->name=$request->name;
      $insert->email=$request->email;
      $insert->password=bcrypt($request->password);
      $insert->save();
      return redirect(route('backend.user.index'))->with('success', 'Data insert successfully');
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
    public function edit(User $user)
    {
       $id = $user->id;
       $allData=User::find($id);
      return view('backend.user.edit', compact('allData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $id = $user->id;
       $update=User::find($id);
       $update->usertype=$request->usertype;
       $update->name=$request->name;
       $update->email=$request->email;
       $update->save();
       return redirect(route('backend.user.index'))->with('success', 'Data update successfully');
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
    public function userDelete($id){
        $delete = User::find($id);
        $delete->delete();
        return redirect(route('backend.user.index'))->with('success', 'Data delete successfully');
    }
}
