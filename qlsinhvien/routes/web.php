<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\SinhVienController;

Route::get('/sinh-vien', [SinhVienController::class, 'index']);