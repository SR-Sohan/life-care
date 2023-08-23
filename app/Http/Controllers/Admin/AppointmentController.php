<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appointment;
use App\Models\Admin\Branch;
use App\Models\Admin\Department;
use App\Models\Admin\Doctor;
use App\Models\Admin\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function page(){
        $department = Department::get();

        return view("admin.pages.appointment",["department" => $department]);
    }

    public function index(){

        $appointment = Appointment::with(["user","branch","department","doctor"])->orderBy('created_at', 'desc')->get();

        return $appointment;
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


    public function create(Request $request){
        $u = auth()->user();
        $employee = Employee::where("user_id","=",$u->id)->first();

        $p_id = $request->input("p_id");

        if($p_id){

            $person = User::find($p_id);

            if($person){

                $appointment = Appointment::create([
                    "user_id" =>$p_id,
                    "department_id" => $request->input("department_id"),
                    "doctor_id" => $request->input("doctor_id"),
                    "branch_id" => $employee->branch_id,
                    "phone" => $request->input("phone"),
                    "appointment_date" => $request->input("appointment_date")
                ]);

                if($appointment){
                    return response()->json(["error" => false,"success" => "succss","msg" => "Appointment  Create Successfully"]);
                }else{
                    return response()->json(["error" => true,"success" => "error","msg" => "Appointment Can't Create"]);
                }


            }else{
                return response()->json(["error" => true,"success" => "error","msg" => "Can't find this user"]);
            }


        }else{
            $user = User::create([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password" => $request->input("password"),
                "role" => "patient",
            ]);

            if($user){

                $appointment = Appointment::create([
                    "user_id" => $user->id,
                    "department_id" => $request->input("department_id"),
                    "doctor_id" => $request->input("doctor_id"),
                    "branch_id" => $employee->branch_id,
                    "phone" => $request->input("phone"),
                    "appointment_date" => $request->input("appointment_date")
                ]);

                if($appointment){
                    return response()->json(["error" => false,"success" => "succss","msg" => "Appointment  Create Successfully"]);
                }else{
                    return response()->json(["error" => true,"success" => "error","msg" => "Appointment Can't Create"]);
                }

            }else{
                return response()->json(["error" => true,"success" => "error","msg" => "Patient Can't Create"]);
            }
        }

    }

    public function updateStatus(Request $request){
            $id = $request->input('id');
            $newStatus = $request->input('newStatus');

            try {
                $appointment = Appointment::findOrFail($id);
                $appointment->status = $newStatus;
                $appointment->save();

                return response()->json(['message' => 'Status updated successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error updating status'], 500);
            }
        }
}
