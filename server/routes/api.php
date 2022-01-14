<?php

use App\Http\Controllers\FieldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/fields', [FieldController::class, 'list']);
Route::get('/fields/{id}', [FieldController::class, 'view']);
Route::post('/fields', [FieldController::class, 'create']);
Route::put('/fields/{id}', [FieldController::class, 'modify']);
Route::delete('/fields/{id}', [FieldController::class, 'bin']);
