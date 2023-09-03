<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use App\Models\Admin\Test;
use App\Models\User;
use Illuminate\Http\Request;

class MoneyReceiptController extends Controller
{
    public function page(){
        return view("admin.pages.money-receipt");
    }

    public function getTestName(Request $request){
        $term = $request->input('term');
        
        $tests = Test::where('name', 'LIKE', '%' . $term . '%')->select('name', 'price')->get();

        return response()->json($tests);
    }

    public function getPatient(Request $request){
        $term = $request->input('term');
        $patient = User::where("id",'LIKE',"%".$term."%")->select("id","name")->get();
        return response()->json($patient);
    }

    public function getDoctor(Request $request){
        $term = $request->input('term');

        $doctor = Doctor::where("name","LIKE",'%'.$term.'%')->select("name")->get();

        return response()->json($doctor);
    }
}
