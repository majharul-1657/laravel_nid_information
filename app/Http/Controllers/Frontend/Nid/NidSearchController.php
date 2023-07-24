<?php

namespace App\Http\Controllers\Frontend\Nid;

use App\Models\Zilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NidInformation;

class NidSearchController extends Controller
{
    public function home(Request $request){
        $allZilla=Zilla::all();
        return view('frontend.layouts.home', compact('allZilla',));
    }
    public function nidShow(Request $request){
        $validated = $request->validate([
        
            'date_of_birth' => 'required',
            'nid_number' => 'required | min:10 | max:20',
            'zilla_name' => 'required',
    
        ]);
        $allZilla=Zilla::all();
        $nid_number= $request->nid_number;
        $date_of_birth = $request->date_of_birth;
        $zilla = $request->zilla_name;
        $nid_information = NidInformation::where('date_of_birth', $date_of_birth)->where('nid_number', $nid_number)->where('zilla_name', $zilla)->get();
        $count = count($nid_information);
        if($count==1){
            return view('frontend.layouts.home', compact('allZilla', 'nid_information'));
        }else{
            return view('frontend.layouts.home', compact('allZilla','count'));
        }
        
    }
}
