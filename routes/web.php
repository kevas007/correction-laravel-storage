<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PhotoController::class , 'index' ]);
Route::get('/create',[PhotoController::class , 'create' ]);
Route::post('/store',[PhotoController::class , 'store' ]);
Route::get('/edit/{id}',[PhotoController::class , 'edit' ]);
Route::put('/store/{id}',[PhotoController::class , 'update' ]);
Route::delete('/effacer/{id}',[PhotoController::class , 'destroy' ]);
Route::get('/download/{id}',[PhotoController::class , 'download' ]);
