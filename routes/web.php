<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DroneRentController;
use App\Http\Controllers\SportEquipController;

Route::get('/', [PublicController::class, 'index']); 

    
// }); //->middleware('auth');

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('sportsequip', [SportEquipController::class, 'index'])->middleware('auth');
        route::get('drone-add', [SportEquipController::class, 'add']);
        route::post('drone-add', [SportEquipController::class, 'store']);
        route::get('drone-edit/{slug}', [SportEquipController::class, 'edit']);
        route::post('drone-edit/{slug}', [SportEquipController::class, 'update']);
        route::get('drone-delete/{slug}', [SportEquipController::class, 'delete']);
        route::get('drone-destroy/{slug}', [SportEquipController::class, 'destroy']);
        route::get('drone-deleted', [SportEquipController::class, 'deleteDrone']);
        Route::get('drone-restore/{slug}', [SportEquipController::class, 'restore']);
        
        Route::get('drone-rent', [DroneRentController::class, 'index']);
        Route::post('drone-rent', [DroneRentController::class, 'store']);
        
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);
        
        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('users-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

    });

    Route::get('rent-logs', [RentLogController::class, 'index']);
});
