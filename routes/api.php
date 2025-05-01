<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GenerateExcelFileController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\IpAddressController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Categories
//----------------------------------
Route::get('categories', CategoriesController::class);

// Hobbies
//----------------------------------
Route::get('hobbies', HobbiesController::class);

// Delete Users
//----------------------------------
Route::post('users-delete', [UserController::class, "delete"]);

// Users
//----------------------------------
Route::apiResource('users', UserController::class);

// Update User Profile picture
//----------------------------------
Route::post('update-profile-picture/{user}', [UserController::class, "updateProfilePicture"]);
