<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function page(){

        return view("admin.pages.ward");
    }
}
