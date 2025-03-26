<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//         $products = Product::all();
//         return view('layouts.admin', compact('products'));
    
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{categoryId}', [HomeController::class, 'showCategory'])->name('category.show');  // مسار لعرض المنتجات حسب التصنيف
Route::get('/load-more-products', [HomeController::class, 'loadMoreProducts']);


Route::resource('products', ProductController::class);
// Route::get('products', [ProductController::class,'index']);
// Route::get('products/create', [ProductController::class,'create']);
// Route::post('products/store', [ProductController::class,'store']);
// Route::get('products/edit/{id}', [ProductController::class,'edit']);
// Route::get('products/delete/{id}', [ProductController::class,'delete']);
// Route::patch('products/update/{id}', [ProductController::class,'update']);

Route::resource('categories', CategoryController::class);
Route::get('/admin/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');

// Route::get('categories', [CategorysController::class,'index']);
// Route::get('categories/create', [CategorysController::class,'create']);
// Route::post('categories/store', [CategorysController::class,'store']);
// Route::get('categories/edit/{id}', [CategorysController::class,'edit']);
// Route::get('categories/delete/{id}', [CategorysController::class,'delete']);
// Route::patch('categories/update/{id}', [CategorysController::class,'update']);



