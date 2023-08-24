<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bed;
use App\Models\Admin\Ward;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function page(){

        $ward = Ward::get();
        return view("admin.pages.bed",["ward" => $ward]);
    }


    public function index(){
        $bed = Bed::with(['branch',"ward"])->get();
        return response()->json($bed);
    }

    public function createBed(Request $request){
        
        $ward = Ward::find($request->ward_id);

        if($ward){

            $bed = Bed::create([
                "branch_id" => $ward->branch_id,
                "ward_id" => $ward->id,
                "bed_number" => $request->bed_number
            ]);

            if($bed){
                return response()->json(["error" => false, "success" => "success","msg" => "Bed Create Successful"]);
            }else{
                return response()->json(["error" => true, "success" => "error","msg" => "Bed Can't Create"]);
            }

        }else{
            return response()->json(["error" => true, "success" => "error","msg" => "Ward Not Found"]);
        }
    }



    // public function delete(Request $request){
        
    //     $id = $request->input("id");
    //     $bed = Bed::find($id);

    //     if($bed){
    //         if($bed->delete()){
    //             return response()->json(["error" => false, "success" => "success", "msg" => "Bed Delete Successfuly"], 201);
    //         }else{
    //             return response()->json(["error" => true, "success" => "error", "msg" => "Bed Can't Delete"]);
    //         }
    //     }else{
    //         return response()->json(["error" => true, "success" => "error", "msg" => "Bed Not Found!"]);
    //     }
    // }



    
}
