<?php

use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\AppointmentController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\DoctorController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Client Page Route
Route::get("/",[HomeController::class,"page"]);
Route::get("/doctor", [DoctorController::class,"page"]);
Route::get("/appointment", [AppointmentController::class,"page"]);
Route::get("/about", [AboutController::class, "page"]);
Route::get("/contact", [ContactController::class,"page"]);


Route::get("/admin",function(){
    return view("admin.pages.dashboard");
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
