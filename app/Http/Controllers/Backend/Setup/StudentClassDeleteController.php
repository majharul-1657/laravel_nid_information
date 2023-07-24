<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassDeleteController extends Controller
{
    public function studentClassDelete($id){
        $delete = StudentClass::find($id);
        $delete->delete();
        return redirect(route('backend.class.index'))->with('success', 'Data delete successfully');
   
    }
}
