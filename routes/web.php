<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any','.*');
Auth::routes();
