<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\EmployeeController;

/** AUTH */
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/login-cookie', [AuthController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::group(['prefix' => 'employee'], function () {
        Route::get('/query', [EmployeeController::class, 'query']);
        Route::post('/add', [EmployeeController::class, 'add']);
        Route::post('/update', [EmployeeController::class, 'update']);
        Route::delete('/delete', [EmployeeController::class, 'delete']);
    });
});
