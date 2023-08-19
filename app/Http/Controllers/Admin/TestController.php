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

    public function single($id){
        $test = Test::find($id);

        if ($test) {
            return response()->json(["error" => false,"success" => "success", "data" => $test], 201);
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "Test Not Found"]);
        }
    }

    public function create(Request $request){

        $id = $request->input("id");

        if($id){

            $test = Test::find($id);

            if (!$test) {
                return response()->json(["error" => true, "success" => "error", "msg" => "Test not found"]);
            }

            $test->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            return response()->json(["error" => false, "success" => "success", "msg" => "Test Updated Successfully"], 200);
            
        }else{
            $test = Test::create([
            
                'name' => $request->name,
                'price' => $request->price,
                
            ]);
    
            if($test){
                return response()->json(["error" => false,"success" => "success","msg" => "Test Added SuccessFully" ], 201);
            }else{
                return response()->json(["error" => true,"success" => "error","msg" => "Test Can't Added" ]);
            }
        }

       

       
    }

    public function delete(Request $request){
        
        $id = $request->input("id");
        $department = Test::find($id);

        if($department){
            if($department->delete()){
                return response()->json(["error" => false, "success" => "success", "msg" => "Test Delete Successfuly"], 201);
            }else{
                return response()->json(["error" => true, "success" => "error", "msg" => "Test Can't Delete"]);
            }
        }else{
            return response()->json(["error" => true, "success" => "error", "msg" => "Test Not Found!"]);
        }
    }
}
