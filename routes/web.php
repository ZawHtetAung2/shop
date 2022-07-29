<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/',[PageController::class,'index'])->name('home');

Route::get('product',[ProductController::class,'index'])->name('product.index');
Route::get('product/create',[ProductController::class,'create'])->name('product.create');
Route::post('product',[ProductController::class,'store'])->name('product.store');
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::get('product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('product/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('product/{id}',[ProductController::class,'destroy'])->name('product.destroy');


Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category',[CategoryController::class,'store'])->name('category.store');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');