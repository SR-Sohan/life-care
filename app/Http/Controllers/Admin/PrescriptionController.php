<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Test;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function page(){
        return view("admin.pages.prescription");
    }

    public function searchTest(Request $request){
        $term = $request->input('term');
        
        $tests = Test::where('name', 'LIKE', '%' . $term . '%')->pluck('name');

        return response()->json($tests);
    }
}
