<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Department;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function page(){
        $user =  auth()->user();
        $branch = Branch::where("user_id",$user->id)->first();       
        $departments = Department::get();
        return view("admin.pages.doctor",["branch_Id" => $branch->id,"departments"=>$departments]);
    }

    public function index(Request $request){
        $user =  auth()->user();
        $branch = Branch::where("user_id",$user->id)->first();

        $doctors = Doctor::with(["branch","department"])->where("branch_id","=",$branch->id)->get(); 
        
        return response()->json($doctors);
    }

    public function create(Request $request){
        $user =  Doctor::createWithUser([
            "name" => $request->input("username"),
            "email" => $request->input("useremail"),
            "password" => $request->input("password"),
        ]);

        if ($user) {
            $imagePath = $request->file('image')->store('doctor_images', 'public');
            $doctor = Doctor::create([
                "user_id" => $user->id,
                "branch_id" => $request->branch_id,
                'department_id' => $request->department_id,
                'name' => $request->name,
                'position' => $request->position,
                'address' => $request->address,
                'phone' => $request->phone,
                'images' => $imagePath,
            ]);

            if ($doctor) {
                return response()->json(["error" => false, "success" => "success", "msg" => "Doctor Added SuccessFully"], 201);
            } else {
                return response()->json(["error" => true, "success" => "error", "msg" => "Server Error"]);
            }
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "User Can't Create"]);
        }
    }


    public function delete(Request $request)
    {

        $id = $request->input("id");

        $doctor = Doctor::find($id);

        $imgPath = $doctor->images;

        if (Storage::disk('public')->delete($imgPath)) {
            $res = Doctor::userDelete(["id" => $doctor->user_id]);

            if ($res) {
                return response()->json(["error" => false, "success" => "success", "msg" => "Doctor Delete Successfuly"], 201);
            } else {
                return response()->json(["error" => true, "success" => "error", "msg" => "Doctor Can't Delete "]);
            }
        }
    }
}
