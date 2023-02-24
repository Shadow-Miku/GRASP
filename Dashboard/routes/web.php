<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistaController;
use App\Http\Controllers\DepartamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin.priAdm',[VistaController::class,'showPriAdm'])->name('priAdm');
Route::get('admin.regDep',[VistaController::class,'showRegDep'])->name('regDep');
Route::get('admin.adminDep',[VistaController::class,'showAdmDep'])->name('adminDep');

/*
|--------------------------------------------------------------------------
| CRUD DEPARTAMETO
|--------------------------------------------------------------------------
*/

//index
Route::get('admin.adminDep',[DepartamentoController::class,'index'])->name('adminDep.index');

//Create
Route::get('admin.adminDep/create', [DepartamentoController::class,'create'])->name('adminDep.create');

//store
Route::post('admin.adminDep', [DepartamentoController::class,'store'])->name('adminDep.store');

//Edit
Route::get('admin.adminDep/{id}/edit',[DepartamentoController::class,'edit'])->name('adminDep.edit');

//Update
Route::put('admin.adminD/{id}',[DepartamentoController::class,'update'])->name('adminDep.update');

//show
Route::get('admin.adminD/{id}/show',[DepartamentoController::class,'show'])->name('adminDep.show');

//destroy
Route::delete('admin.adminD/{id}',[DepartamentoController::class,'destroy'])->name('adminDep.destroy');



/*Ruta de validador */
Route::post('admin.regDep', [VistaController::class,'procesarregistroDeparamento'])->name('RegiDepartamento');
