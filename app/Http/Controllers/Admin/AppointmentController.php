<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use App\Models\Admin\Department;
use App\Models\Admin\Doctor;
use App\Models\Admin\Employee;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function page(){
        $department = Department::get();

        return view("admin.pages.appointment",["department" => $department]);
    }

    public function getDoctor($id){

        $user = auth()->user();

        $employee = Employee::where("user_id","=",$user->id)->first();


        $doctor = Doctor::where("department_id" , "=", $id)
                            ->where("branch_id","=",$employee->branch_id)
                            ->get();

        if($doctor){
            return response()->json(["error" => false , "doctor" => $doctor]);
        }else{
            return response()->json(["error" => true,"success" => "error","msg" => "This Department Doctor Not Found"]);
        }

    }
}
