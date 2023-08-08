<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

Route::get('/', [TesteController::class, 'index'])->name('home');
Route::get('/services', [TesteController::class, 'services'])->name('services');
Route::get('/galery/{paginate?}', [TesteController::class, 'galery'])->name('galery');
Route::get('/contacts', [TesteController::class, 'contacts'])->name('contacts');
Route::get('/register', [TesteController::class, 'register'])->name('register');
Route::post('/register_partners', [TesteController::class, 'register_partners'])->name('register_partners');