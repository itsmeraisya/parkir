<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\DistributorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\TransactionController;

Route::redirect('/', '/locations');
Route::redirect('/dashboard', '/locations');

Route::resource('users', UserController::class)->except(['show']);

Route::resource('locations', LocationController::class)->except(['show']);
Route::resource('vehicle-types', VehicleTypeController::class)->except(['show']);
Route::resource('transactions', TransactionController::class)->except(['show']);
