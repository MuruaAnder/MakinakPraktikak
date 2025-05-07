<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavController;
Route::get('/', function () {
    return view('welcome');
});


//LOGIN
Route::get('/loginView', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/dashboard', [NavController::class, 'showDashboardForm'])->middleware(middleware: 'auth');