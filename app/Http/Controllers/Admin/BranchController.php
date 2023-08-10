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



        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $name = $request->input("name");
        $address = $request->input("address");
        $phone = $request->input("phone");
        $image = $request->file('image');

        $imagePath = $request->file('image')->store('branch_images', 'public');

        Branch::createWithUser(["asdf","asdf"]);

        $branch = Branch::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);


        return response()->json(["error" => false,"msg" => "Branch Added SuccessFully" ], 201);

        
    }
}
