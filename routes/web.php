<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WardController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\AppointmentController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\DoctorsController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


// Client Page Route
Route::get("/",[HomeController::class,"page"]);
Route::get("/doctor", [DoctorsController::class,"page"]);
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
    Route::get("ward",[WardController::class,"page"]);
    Route::get("medicine",[MedicineController::class,"page"]);
    Route::get("employee",[EmployeeController::class,"page"]);
    

    // Employee Routes
    Route::get("employes",[EmployeeController::class,"index"]);
    Route::get("employee-delete",[EmployeeController::class,"delete"]);
    Route::post("upload-employee",[EmployeeController::class,"create"]);


    // Branch Routes
    Route::get("branches",[BranchController::class,"index"]);
    Route::get("branch-delete",[BranchController::class,"delete"]);
    Route::get("single-branch/{id}",[BranchController::class,"single"]);
    Route::post("upload-branch",[BranchController::class,"create"]);
    Route::post("update-branch",[BranchController::class,"update"]);
    
    // Department Routes
    Route::get("departments",[DepartmentController::class,"index"]);
    Route::get("single-department/{id}",[DepartmentController::class,"single"]);
    Route::get("department-delete",[DepartmentController::class,"delete"]);
    Route::post("upload-department",[DepartmentController::class,"createOrUpdate"]);

    // Doctor Routes
    Route::get("doctors",[DoctorController::class,"index"]);
    Route::post("upload-doctor",[DoctorController::class,"create"]);
    Route::get("doctor-delete",[DoctorController::class,"delete"]);

    // Test Routes
    Route::get("tests", [TestController::class,"index"]);
    Route::get("single-test/{id}", [TestController::class,"single"]);
    Route::get("test-delete", [TestController::class,"delete"]);
    Route::post("upload-test",[TestController::class,"create"]);

    // Ward Routes
    Route::post("create-ward",[WardController::class,"createOrUpdate"]);
    Route::get("wards",[WardController::class,"index"]);
    Route::get("wards-single/{id}",[WardController::class,"single"]);
    Route::get("ward-delete", [WardController::class,"delete"]);

    //Medicine Routes
    Route::get("medicines", [MedicineController::class,"index"]);
    Route::get("medicines-single/{id}",[MedicineController::class,"single"]);
    Route::post("create-medicine",[MedicineController::class,"createOrUpdate"]);
    Route::get("medicine-delete", [MedicineController::class,"delete"]);


    



});

require __DIR__.'/auth.php';
