<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Department;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function page(){
        $branches = Branch::get();
        $departments = Department::get();
        return view("admin.pages.doctor",["branches" => $branches,"departments"=>$departments]);
    }

    public function index(Request $request){
        $doctors = Doctor::with(["branch","department"])->get(); 
        
        return response()->json($doctors);
    }

    public function create(Request $request){
        // $request->validate([
        //     'name' => 'required|string',
        //     'address' => 'required|string',
        //     'phone' => 'required|string',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $name = $request->input("name");
        // $address = $request->input("address");
        // $phone = $request->input("phone");
        // $image = $request->file('image');

        $imagePath = $request->file('image')->store('doctor_images', 'public');

        $branch = Doctor::create([
            'branch_id' => $request->branch_id,
            'department_id' => $request->department_id,
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address,
            'phone' => $request->phone,
            'images' => $imagePath,
        ]);


        return response()->json(["error" => false,"msg" => "Doctor Added SuccessFully" ], 201);
    }
}
