<?php

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/email', [HomeController::class, 'email']);

Route::get('/map', [HomeController::class, 'map']);

Route::get('/geo', [HomeController::class, 'geo']);

//saveaddress
Route::get('/savemapaddress', [HomeController::class, 'saveMapAddress']);


