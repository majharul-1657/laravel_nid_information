<?php

namespace App\Http\Controllers\Backend\Nid;

use App\Models\Zilla;
use App\Models\Address;
use App\Models\UpoZilla;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NidInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NidInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=NidInformation::all();
        return view('backend.nid.information.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allZilla=Zilla::all();
        $allUpoZilla=UpoZilla::all();
        $allBlood =BloodGroup::all();
        $allAddress=Address::all();
        return view('backend.nid.information.create', compact('allZilla', 'allUpoZilla', 'allBlood', 'allAddress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth_signature = Str::lower(Auth::user()->name??'null');
        $validated = $request->validate([
            'name' => 'required',
            'bangla_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'date_of_birth' => 'required',
            'mobile' => 'required | unique:nid_information,mobile',
            'email' => 'required | email | unique:nid_information,email',
            'nid_number' => 'required | min:10 | max:20 | unique:nid_information,nid_number',
            'gender' => 'required',
            'zilla_name' => 'required',
            'upozilla_name' => 'required',
            'address_name' => 'required',
            'photo' => 'required',
        ]);

        $insert= new NidInformation();
        $insert->name=$request->name;
        $insert->bangla_name=$request->bangla_name;
        $insert->father_name=$request->father_name;
        $insert->mother_name=$request->mother_name;
        $insert->date_of_birth=$request->date_of_birth;
        $insert->mobile=$request->mobile;
        $insert->email=$request->email;
        $insert->nid_number=$request->nid_number;
        $insert->gender=$request->gender;
        $insert->blood_name=$request->blood_name;
        $insert->zilla_name=$request->zilla_name;
        $insert->upozilla_name=$request->upozilla_name;
        $insert->address_name=$request->address_name;
        // create
        $insert->Create_name=$request->Create_name;
        $insert->auth_signature=$auth_signature;
        $insert->signature=Str::lower($request->name);
        $photo=$request->file('photo');
        if($photo){
            $photo_name=Str::slug($request->name).'-'.time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('storage/upload/nidinfo/'), $photo_name);
            $insert->photo=$photo_name;
        }
        $insert->save();
        return redirect(route('backend.information.index'))->with('success', 'Data add successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NidInformation  $nidInformation
     * @return \Illuminate\Http\Response
     */
    public function show(NidInformation $nidInformation, $id)
    {
        $allData=NidInformation::find($id);
        $allZilla=Zilla::all();
        //return view('backend.nid.information.show', compact('allData', 'allZilla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NidInformation  $nidInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(NidInformation $nidInformation, $id)
    {
        $allData=NidInformation::find($id);
        $allZilla=Zilla::all();
        $allUpoZilla=UpoZilla::all();
        $allBlood=BloodGroup::all();
        $allAddress=Address::all();
        return view('backend.nid.information.edit', compact('allData', 'allZilla', 'allUpoZilla', 'allBlood', 'allAddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NidInformation  $nidInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NidInformation $nidInformation, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'bangla_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'date_of_birth' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'nid_number' => 'required | min:10 | max:20',
            'gender' => 'required',
            'zilla_name' => 'required',
            'upozilla_name' => 'required',
            'address_name' => 'required',
        ]);

        $update=NidInformation::find($id);
        $update->name=$request->name;
        $update->bangla_name=$request->bangla_name;
        $update->father_name=$request->father_name;
        $update->mother_name=$request->mother_name;
        $update->date_of_birth=$request->date_of_birth;
        $update->mobile=$request->mobile;
        $update->email=$request->email;
        $update->nid_number=$request->nid_number;
        $update->gender=$request->gender;
        $update->blood_name=$request->blood_name;
        $update->zilla_name=$request->zilla_name;
        $update->upozilla_name=$request->upozilla_name;
        $update->address_name=$request->address_name;
        // create
        $update->Create_name=$request->Create_name;
        $update->signature=Str::lower($request->name);
        $photo=$request->file('photo');
        if($photo){
            $photo_name=Str::slug($request->name).'-'.time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('storage/upload/nidinfo/'), $photo_name);
            @unlink(public_path('storage/upload/nidinfo/'.$update->photo));
            $update->photo=$photo_name;
        }
        $update->save();
        return redirect(route('backend.information.index'))->with('success', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NidInformation  $nidInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(NidInformation $nidInformation)
    {
        //
    }
    public function informationDelete($id){
        $delete = NidInformation::find($id);
        @unlink(public_path('storage/upload/nidinfo/'.$delete->photo));
        $delete->delete();
        return redirect(route('backend.information.index'))->with('success', 'Data delete successfully');
    }
}
