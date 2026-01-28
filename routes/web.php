<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductManager;
use App\Livewire\CategoryManager;
use App\Livewire\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\UserLogin;
use Illuminate\Auth\Events\Login as EventsLogin;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', UserLogin::class)->name('login');
});

// Protected Routes (Only accessible if logged in)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');
    Route::get('/products', ProductManager::class)->name('products');
    Route::get('/categories', CategoryManager::class)->name('categories');

    // Logout Route
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
