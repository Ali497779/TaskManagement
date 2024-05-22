<?php

use App\Http\Controllers\ChattController;
use App\Http\Controllers\PasportController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/',function (){
    return redirect()->route('task.index');
});
Route::get('login',[PasportController::class,'index'])->name('login');
Route::post('login',[PasportController::class,'login'])->name('login');
Route::get('registration',[PasportController::class,'register'])->name('register');
Route::post('registration',[PasportController::class,'registerstore'])->name('register');
Route::get('logout',[PasportController::class,'logout'])->name('logout')->middleware('auth');

Route::group(['prefix'=>'task','middleware'=>'auth','as'=>'task.'],function (){
    Route::get('/',[TaskController::class,'index'])->name('index');
    Route::get('/filter',[TaskController::class,'filter'])->name('filter');
    Route::post('/store',[TaskController::class,'store'])->name('store');
    Route::post('/update/{id}',[TaskController::class,'update'])->name('update');
    Route::post('/taskupdate',[TaskController::class,'taskupdate'])->name('taskupdate');
    Route::get('/delete/{id}',[TaskController::class,'destroy'])->name('delete');
});

Route::group(['prefix'=>'chatt','middleware'=>'auth','as'=>'chatt.'], function () {
    Route::get('/', [ChattController::class, 'index'])->name('index');
    Route::post('/broadcast', [ChattController::class, 'broadcast'])->name('broadcast');
    Route::post('/receive', [ChattController::class, 'receive'])->name('receive');
});

