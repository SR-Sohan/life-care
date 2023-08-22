<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function page(){
        return view("admin.pages.employee");
    }

    public function index(){
        $u =  auth()->user();
        $branch = Branch::where("user_id",$u->id)->first(); 
        
        $employee = Employee::with(["branch","user"])->where("branch_id","=",$branch->id)->get();

        return response()->json($employee);
                            
    }

    public function create(Request $request){

        $user = User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => $request->input("password"),
            "role" => $request->input("role"),
         ]);

         if($user){
            $u =  auth()->user();
            $branch = Branch::where("user_id",$u->id)->first(); 
            $imagePath = $request->file('image')->store('doctor_images', 'public');

            $employee = Employee::create([
                "user_id" => $user->id,
                "branch_id" => $branch->id,
                "address" => $request->input("address"),
                "phone" => $request->input("phone"),
                "image" => $imagePath
            ]);
            if($employee){
                return response()->json(["error" => false,"success" => "succss","msg" => "Employee  Create Successfully"]);
            }else{
                return response()->json(["error" => true,"success" => "error","msg" => "Employee Can't Create"]);
            }

         }else{
            return response()->json(["error" => true,"success" => "error","msg" => "Employee Can't Create"]);
         }
     
    }

    
    public function delete(Request $request){
        $user = User::find($request->input("id"));

        if($user){

            if($user->delete()){
                return response()->json(["error" => false,"success" => "success","msg" => "Employee Delete successfully"]);
            }else{
                return response()->json(["error" => true,"success" => "error","msg" => "Employee Can't Delete"]);
            }

        }else{
            return response()->json(["error" => true,"success" => "error","msg" => "Employee Not Found"]);
        }
    }
}
