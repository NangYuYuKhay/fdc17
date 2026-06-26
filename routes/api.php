<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureBController;

Route::get('/get-items',[FeatureBController::class,'getItems'])->name('api.get-items');

