<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\AppointmentController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Client Page Route
Route::get("/",[HomeController::class,"page"]);
Route::get("/doctor", [DoctorController::class,"page"]);
Route::get("/appointment", [AppointmentController::class,"page"]);
Route::get("/about", [AboutController::class, "page"]);
Route::get("/contact", [ContactController::class,"page"]);







Route::prefix("/dashboard")->middleware(['auth', 'verified',"role"])->group(function () {

    //Dashboard Page Routes
    Route::get("",[DashboardController::class,"page"]);
    Route::get("branch",[BranchController::class,"page"]);
    Route::get("user",[UserController::class,"page"]);
    Route::get("doctor",[DoctorController::class,"page"]);
    Route::get("department",[DepartmentController::class,"page"]);
    Route::get("test",[TestController::class,"page"]);


    // Dashboard Commericial Routes
    Route::get("branches",[BranchController::class,"index"]);
    Route::post("upload-branch",[BranchController::class,"create"]);

});

require __DIR__.'/auth.php';
