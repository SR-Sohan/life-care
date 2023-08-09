<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function page(){
        return view("admin.pages.test");
    }

    public function index(Request $request){

        $test = Test::paginate(10);

        return response()->json($test);

    }

    public function create(Request $request){
        $test = Test::create([
            
            'name' => $request->name,
            'price' => $request->price,
            
        ]);

        return response()->json(["error" => false,"msg" => "Test Added SuccessFully" ], 201);
    }
}
