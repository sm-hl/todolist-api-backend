<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\DeliveryController;
use App\Http\Controllers\API\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// task
Route::get('/tasks', [TaskController::class,'index'])->name('tasks.index');
Route::get('/tasks/{id}', [TaskController::class,'show'])->name('tasks.show');
Route::post('/tasks/store', [TaskController::class,'store'])->name('tasks.store');
Route::put('/tasks/update/{id}', [TaskController::class,'update'])->name('tasks.update');
Route::delete('/tasks/delete/{id}', [TaskController::class,'destroy'])->name('tasks.destroy');