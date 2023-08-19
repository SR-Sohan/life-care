<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function page(){
        return view("admin.pages.department");
    }

    public function index(Request $request){

        $department = Department::get(); 

        return response()->json($department);
    }


    public function single($id){
        $branch = Department::find($id);

        if ($branch) {
            return response()->json(["error" => false,"success" => "success", "data" => $branch], 201);
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "Department Not Found"]);
        }
    }


    public function createOrUpdate(Request $request)
{
    $id = $request->input("id");
    if ($id) {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(["error" => true, "success" => "error", "msg" => "Department not found."], 404);
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($department->image); // Delete old image
            $imagePath = $request->file('image')->store('department_images', 'public');
            $department->image = $imagePath;
        }

        $department->name = $request->input("name");
        $department->description = $request->input("description");

        if ($department->save()) {
            return response()->json(["error" => false, "success" => "success", "msg" => "Department updated successfully."], 200);
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "Server error while updating department."], 500);
        }
    } else {
        $imagePath = $request->file('image')->store('department_images', 'public');
        $department = Department::create([
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'image' => $imagePath,
        ]);

        if ($department) {
            return response()->json(["error" => false, "success" => "success", "msg" => "Department added successfully."], 201);
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "Server error while adding department."], 500);
        }
    }
}


    public function delete(Request $request)
    {

        $id = $request->input("id");

        $department = Department::find($id);

        $imgPath = $department->image;


        if (Storage::disk('public')->delete($imgPath)) {
            $res = $department->delete();

            if ($res) {
                return response()->json(["error" => false, "success" => "success", "msg" => "Department Delete Successfuly"], 201);
            } else {
                return response()->json(["error" => true, "success" => "error", "msg" => "Department Can't Delete "]);
            }
        }
    }
      
}
