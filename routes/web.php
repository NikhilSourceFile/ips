<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth'])->name('dashboard');

Route::get('/test', [DocumentController::class,'abc']);

// Categories
Route::GET('/categories',[CategoryController::class,'index'])->middleware(['auth'])->name('categories');
Route::GET('/get-categories',[CategoryController::class,'getCategories'])->middleware(['auth'])->name('get-categories');
Route::POST('/categories',[CategoryController::class,'store'])->middleware(['auth'])->name('new-category');
// Documents
Route::GET('/documents',[DocumentController::class,'index'])->middleware(['auth'])->name('documents');
Route::POST('/documents',[DocumentController::class,'store'])->middleware(['auth'])->name('new-document');
Route::GET('/get-documents',[DocumentController::class,'getDocuments'])->middleware(['auth'])->name('get-documents');
Route::GET('/get-documents/{file}',[DocumentController::class,'getPdf'])->middleware(['auth']);
require __DIR__.'/auth.php';
