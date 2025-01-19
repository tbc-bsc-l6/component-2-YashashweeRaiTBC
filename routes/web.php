<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::middleware(["auth"])->group(function() {
    Route::get("/dashboard", function () {
        return view("dashboard", [
            "title" => "Dashboard"
        ]);
    });
});


Route::middleware(["web"])->group(function(){
   
    Route::get("/", [HomeController::class, 'home'])->name('home');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');  

    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');   
});