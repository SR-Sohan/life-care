<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function page(){
        return view("admin.pages.department");
    }

    public function index(Request $request){

        $branches = Department::paginate(10); 

        return response()->json($branches);
    }


    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $imagePath = $request->file('image')->store('department_images', 'public');

        $branch = Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);


        return response()->json(["error" => false,"msg" => "Department Added SuccessFully" ], 201);
    }
}
