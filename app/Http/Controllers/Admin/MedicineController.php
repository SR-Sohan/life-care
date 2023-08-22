<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    
    public function page(){
        return view("admin.pages.medicine");
    }

    public function index(){

        $medicine = Medicine::get();

        return response()->json($medicine); 
    }

    public function single($id){
      
        $medicine = Medicine::find($id);

        if($medicine){
            return response()->json(["error" => false, "data" => $medicine]);
        }else{
            return response()->json(["error" => true, "success" => "error","msg" => "Medicine Not Found"]);
        }
    }


    public function createOrUpdate(Request $request){

        $medicineId = $request->input("medicine_id");

        if($medicineId){

            $medicine = Medicine::find($medicineId);
            if(!$medicine){
                return response()->json(["error" => true,"success" => "error","msg"=> "Medicine Can't Find "]);
            }else{
                $medicine->name = $request->input("name");
                $medicine->type = $request->input("type");
                $medicine->power = $request->input("power");

                if($medicine->save()){
                    return response()->json(["error" => false,"success" => "success","msg"=> "Medicine Update Successfully"]);
                }else{
                    return response()->json(["error" => true,"success" => "error","msg"=> "Medicine Can't Update"]);
                }
            }

        }else{

            $medicine = Medicine::create([
                "name" => $request->input("name"),
                "type" => $request->input("type"),
                "power" => $request->input("power"),
            ]);

            if($medicine){
                return response()->json(["error" => false,"success" => "success","msg"=> "Medicine Create Successfully"]);
            }else{
                return response()->json(["error" => true,"success" => "error","msg"=> "Medicine Can't Create "]);
            }
        }
        
    }

    public function delete(Request $request){
        
        $id = $request->input("id");
        $medicine = Medicine::find($id);

        if($medicine){
            if($medicine->delete()){
                return response()->json(["error" => false, "success" => "success", "msg" => "Medicine Delete Successfully"], 201);
            }else{
                return response()->json(["error" => true, "success" => "error", "msg" => "Medicine Can't Delete"]);
            }
        }else{
            return response()->json(["error" => true, "success" => "error", "msg" => "Medicine Not Found!"]);
        }
    }


}
