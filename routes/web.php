<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudAppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/',[CrudAppController::class,'all_records'])->name('all.records');
Route::get('/add-new-record',[CrudAppController::class,'add_new_record'])->name('add.new.record');
Route::post('/store-new-record',[CrudAppController::class,'store_new_record'])->name('store.new.record');
Route::get('/edit-record/{id}',[CrudAppController::class,'edit_record'])->name('edit.record');
Route::post('/update-record/{id}',[CrudAppController::class,'update_record'])->name('update.record');
Route::get('/delete-record/{id}',[CrudAppController::class,'delete_record'])->name('delete.record');
