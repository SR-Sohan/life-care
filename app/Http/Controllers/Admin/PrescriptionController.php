<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Appointment;
use App\Models\Admin\Branch;
use App\Models\Admin\Doctor;
use App\Models\Admin\Medicine;
use App\Models\Admin\Prescription;
use App\Models\Admin\Test;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function page(){
        return view("admin.pages.prescription");
    }

    public function createPrescription(Request $request){
        $auth = auth()->user();
        $doctor = Doctor::where("user_id","=",$auth->id)->first();

        $user = User::find($request->input("user_id"));

        if($user){           
            $issueDate = new DateTime();

            $prescription = Prescription::create([
                "user_id" => $user->id,
                "branch_id" => $doctor->branch_id,
                "doctor_id" => $doctor->id,
                "medicine" => $request->input("medicine"),
                "test" => $request->input("test"),
                "issue_date" => $issueDate,
            ]);

            if($prescription){
                return $prescription;
            }else{
                return response()->json(["error" => true, "success" => "error","msg" => "Prescription Can't Created"]);
            }

        }else{
            return response()->json(["error" => true, "success" => "error","msg" => "Patient Not Found"]);
        }
        

    }

    public function reportPrescription($id){
        $prescription = Prescription::find($id);
        $tests = json_decode($prescription->test, true);
        $medicines = json_decode($prescription->medicine, true);

        // return ["test" => $tests, "medicine" => $medicine];
        $user = User::find($prescription->user_id);
        $branch = Branch::find($prescription->branch_id);
        $doctor = Doctor::with("department")->find($prescription->doctor_id);
        $appointment = Appointment::where("user_id", "=", $prescription->user_id)->first();
        return view('admin.report.prescription',[
            "doctor" => $doctor,
            "branch" => $branch,
            "user" => $user,
            "prescription" => $prescription,
            "test" => $tests,
            "medicine" => $medicines,
            "appointment" => $appointment
        ]);
        
    }

    public function searchTest(Request $request){
        $term = $request->input('term');
        
        $tests = Test::where('name', 'LIKE', '%' . $term . '%')->pluck('name');

        return response()->json($tests);
    }

    public function searchMedicine(Request $request){
        $term = $request->input('term');
        
        $medicines = Medicine::where('name', 'like', '%' . $term . '%')
        ->select('name', 'power','type')
        ->get();
        return response()->json($medicines);
    }


}
