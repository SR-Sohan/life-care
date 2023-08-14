<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function page(){
        return view("admin.pages.branch");
    }

    public function index(Request $request){

        $branches = Branch::paginate(10); 

        return response()->json($branches);
    }
    
    public function create(Request $request){


        $user =  Branch::createWithUser([
            "name" => $request->input("username"),
            "email" => $request->input("useremail"),
            "password" => $request->input("password"),
        ]);

        if($user){
            $imagePath = $request->file('image')->store('branch_images', 'public');
            $branch = Branch::create([
                "user_id" => $user->id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'image' => $imagePath,
            ]);
    
            if($branch){
                return response()->json(["error" => false,"success" => "success","msg" => "Branch Added SuccessFully" ], 201);
            }else{
                return response()->json(["error" => true,"success" => "error","msg" => "Server Error" ]);
            }
        }else{
            return response()->json(["error" => true,"success" => "error","msg" => "User Can't Create" ]);
        }
        
    }

    public function delete(Request $request){
        $id = $request->input("id");



        $branch = Branch::find($id);

        $res = Branch::deleteUser($branch->user_id);
       
        return response()->json(["data" => $res]);
        
    }
}
