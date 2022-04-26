<?php

use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IndexController;

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


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'about']);




Route::prefix('ips-panel/')->middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    // Categories
    Route::GET('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::GET('/get-categories', [CategoryController::class, 'getCategories'])->name('get-categories');
    Route::POST('/categories', [CategoryController::class, 'store'])->name('new-category');
    Route::POST('/edit-category',[CategoryController::class,'edit'])->name('edit-category');
    Route::POST('/update-category',[CategoryController::class,'update'])->name('update-category');
    Route::post('/category-delete', [CategoryController::class, 'destroy'])->name('category-delete');

    // Documents
    Route::GET('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::POST('/documents', [DocumentController::class, 'store'])->name('new-document');
    Route::GET('/get-documents', [DocumentController::class, 'getDocuments'])->name('get-documents');
    Route::POST('/edit-document',[DocumentController::class,'edit'])->name('edit-document');
    Route::POST('/update-document',[DocumentController::class,'update'])->name('update-document');
    Route::post('/document-delete', [DocumentController::class, 'destroy'])->name('document-delete');

    
    
});
Route::GET('/get-documents/{file}', [DocumentController::class, 'getPdf']);

require __DIR__ . '/auth.php';
