<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductManager;
use App\Livewire\CategoryManger;


Route::get('/', function () {
    return view('welcome');
});


// Livewire routes
Route::get('/products', ProductManager::class)->name('products');
Route::get('/categories', CategoryManger::class);
