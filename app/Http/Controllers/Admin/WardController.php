<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function page(){

        $user =  auth()->user();
        $branch = Branch::where("user_id",$user->id)->first(); 
        return view("admin.pages.ward",["branch_id" => $branch->id]);
    }

    public function index(){
        $ward = Ward::with("branch")->get(); 

        return response()->json($ward);
    }

    public function createOrUpdate(Request $request){

        $wardId = $request->input("ward_id");

        if($wardId){

            $ward = Ward::find($wardId);
            if(!$ward){
                return response()->json(["error" => true,"success" => "error","msg"=> "Ward Can't Find "]);
            }else{
                $ward->branch_id = $request->input("branch_id");
                $ward->name = $request->input("name");
                $ward->ward_number = $request->input("ward_number");
                $ward->ward_type = $request->input("ward_type");

                if($ward->save()){
                    return response()->json(["error" => false,"success" => "success","msg"=> "Ward Update Successful"]);
                }else{
                    return response()->json(["error" => true,"success" => "error","msg"=> "Ward Can't Update"]);
                }
            }

        }else{

            $ward = Ward::create([
                "branch_id" => $request->input("branch_id"),
                "name" => $request->input("name"),
                "ward_number" => $request->input("ward_number"),
                "ward_type" => $request->input("ward_type"),
            ]);

            if($ward){
                return response()->json(["error" => false,"success" => "success","msg"=> "Ward Create Successful"]);
            }else{
                return response()->json(["error" => true,"success" => "error","msg"=> "Ward Can't Create "]);
            }
        }
        
    }
}
