<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Employee Detail routes
    Route::post("/employee-detail", [EmployeeController::class, 'store']);
    Route::get("/employee-detail", [EmployeeController::class, 'show']);
    Route::put("/employee-detail", [EmployeeController::class, 'update']);
    Route::delete("/employee-detail", [EmployeeController::class, 'destroy']);

    // Attendance routes
    Route::post("/attendance", [AttendanceController::class, 'store']);
    Route::get("/attendance", [AttendanceController::class, 'index']);
    Route::get("/attendance/{id}", [AttendanceController::class, 'show']);
    Route::put("/attendance/{id}", [AttendanceController::class, 'update']);
    Route::delete("/attendance/{id}", [AttendanceController::class, 'destroy']);
});