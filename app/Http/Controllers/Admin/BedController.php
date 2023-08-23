<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ward;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function page(){

        $ward = Ward::get();
        return view("admin.pages.bed",["ward" => $ward]);
    }
}
