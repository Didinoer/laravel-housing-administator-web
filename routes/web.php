<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blockController;
use App\Http\Controllers\residentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [authController::class , 'login'] )-> name('login') -> middleware('guest');
Route::post('/login', [authController::class , 'authenticating'] );
Route::get('/logout', [authController::class , 'logout'] ) ->middleware('auth');


Route::get('/residents', [residentController::class , 'index'] )->middleware('auth');

Route::get('/blocks', [blockController::class , 'index'] )->middleware('auth');



Route::get('/edit-resident',[residentController::class, 'editResident'])-> middleware(['auth','admin']);
Route::get('/edit-resident-data/{id}',[residentController::class, 'editForm' ])->middleware('auth');
Route::put('/edit-resident-process/{id}',[residentController::class, 'editResidentProcess'])->middleware('auth');
Route::get('/resident-delete/{id}',[residentController::class, 'residentDelete'])->middleware('auth');


Route::post('/add-resident',[residentController::class, 'addResident'])->middleware('auth');
Route::get('/form-resident', function(){
    return view('form-resident');
} )->middleware('auth');





