<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => [
        'auth:sanctum',
        'is_super_admin'
    ]
], function () {
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::get('/users/{id}', [UserController::class, 'getUserByIdWithCreateRooms']);
});

Route::group([
    'middleware' => [
        'auth:sanctum'
    ]
], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/message', [ChatController::class, 'createMessage']);
    Route::delete('/deletemessage/{id}', [ChatController::class, 'deleteMessageById']);
    Route::put('/user/update', [userController::class, 'updateUser']);
    // NEW ROOM
    Route::post('/newroom', [RoomController::class, 'newRoom']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);




