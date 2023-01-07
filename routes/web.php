<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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

Route::get('distance_calculation',function(){
    return view('distance_calculation');
});
Route::get('add_data',function(){
    return view('forms');
});
Route::get('add_file',function(){
    return view('audio_add');
});
Route::get('/',[DataController::class,'index']);
Route::post('/add',[DataController::class,'add']);
Route::get('/audio_file_check',[AudioController::class,'index']);
Route::post('/add_audio',[AudioController::class,'add']);
Route::get('edit/{id}',[DataController::class,'edit'])->name('edit');
Route::put('update/{id}',[DataController::class,'update'])->name('update');
Route::get('export',[DataController::class,'export'])->name('export');

