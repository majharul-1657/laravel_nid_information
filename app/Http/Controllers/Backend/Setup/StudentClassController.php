<?php
namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=StudentClass::all();
        return view('backend.setup.studentclass.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.studentclass.create');
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
            'name' => 'required | unique:student_classes,name',
        ]);
        $insert= new StudentClass();
        $insert->name=$request->name;
        $insert->save();
        return redirect(route('backend.class.index'))->with('success', 'Data add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $studentClass, $id)
    {
        $data=StudentClass::find($id);
        return view('backend.setup.studentclass.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentClass $studentClass, $id)
    {
        $validated = $request->validate([
            'name' => 'required | unique:student_classes,name',
        ]);
        $updateData=StudentClass::find($id);
        $updateData->name=$request->name;
        $updateData->save();
        return redirect(route('backend.class.index'))->with('success', 'Data update successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $studentClass, $id)
    {
        $delete = StudentClass::find($id);
        $delete->delete();
        return redirect(route('backend.class.index'))->with('success', 'Data delete successfully');
    }
}
