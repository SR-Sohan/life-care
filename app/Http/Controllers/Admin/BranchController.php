<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    public function page()
    {
        return view("admin.pages.branch");
    }

    public function index(Request $request)
    {

        $branches = Branch::with('user')->paginate(10);

        return response()->json($branches);
    }

    public function single($id)
    {
        $branch = Branch::find($id);

        if ($branch) {
            return response()->json(["error" => false, "data" => $branch], 201);
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "Branch Not Found"]);
        }
    }

    public function create(Request $request)
    {


        $user =  Branch::createWithUser([
            "name" => $request->input("username"),
            "email" => $request->input("useremail"),
            "password" => $request->input("password"),
        ]);

        if ($user) {
            $imagePath = $request->file('image')->store('branch_images', 'public');
            $branch = Branch::create([
                "user_id" => $user->id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'image' => $imagePath,
            ]);

            if ($branch) {
                return response()->json(["error" => false, "success" => "success", "msg" => "Branch Added SuccessFully"], 201);
            } else {
                return response()->json(["error" => true, "success" => "error", "msg" => "Server Error"]);
            }
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "User Can't Create"]);
        }
    }


    public function update(Request $request)
    {

        $branch = Branch::find($request->input('id'));

        if (!$branch) {
            return response()->json(["error" => true, "success" => "error", "msg" => "Branch Not Found"]);
        }

        $branch->name = $request->input('name');
        $branch->address = $request->input('address');
        $branch->phone = $request->input('phone');

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($branch->image && Storage::disk('public')->exists($branch->image)) {
                Storage::disk('public')->delete($branch->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('branch_images', 'public');
            $branch->image = $imagePath;
        }

        if ($branch->save()) {
            return response()->json(["error" => false, "success" => "success", "msg" => "Branch Updated Successfully"], 200);
        } else {
            return response()->json(["error" => true, "success" => "error", "msg" => "Update Error"]);
        }
    }

    public function delete(Request $request)
    {

        $id = $request->input("id");

        $branch = Branch::find($id);

        $imgPath = $branch->images;


        if (Storage::disk('public')->delete($imgPath)) {
            $res = Branch::deleteUser(["id" => $branch->user_id]);

            if ($res) {
                return response()->json(["error" => false, "success" => "success", "msg" => "Branch Delete Successfuly"], 201);
            } else {
                return response()->json(["error" => true, "success" => "error", "msg" => "Branch Can't Delete "]);
            }
        }
    }
}
