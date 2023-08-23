<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appointment;
use App\Models\Admin\Branch;
use App\Models\Admin\Department;
use Illuminate\Http\Request;

class PrintAppointmentController extends Controller
{
    public function page(){
        $department = Department::get();
       
        return view("admin.pages.print-appointment" , ["department" => $department]);
    }

    public function search(Request $request){
        $user = auth()->user();
        $branch = Branch::where("user_id",'=',$user->id)->first();

        $appointments = Appointment::with(["user","branch","department","doctor"])
                                    ->where("department_id","=", $request->input("department"))
                                    ->where("doctor_id","=", $request->input("doctor"))
                                    ->where("appointment_date","=", $request->input("appointment_date"))->get();
        if($appointments){
            return response()->json(["error" => false,"appointments" => $appointments]);
        }else{
            return response()->json(["error" => true,"success" => "error","msg" => "Someting Wrong"]);
        }
    }
}
