<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserTodolistController;

Route::apiResource('todolist', TodolistController::class);

Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::apiResource('todolist', UserTodolistController::class);
    });
});
