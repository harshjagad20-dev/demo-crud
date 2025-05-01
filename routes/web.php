<?php

use App\Http\Controllers\GenerateExcelFileController;
use App\Http\Controllers\IpAddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});