<?php
// web.php in laravel
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function (){
    Route::post('/login',LoginController::class)->middleware('guest');
    Route::post('/logout',LogoutController::class);
    Route::post('/register',RegisterController::class);
    Route::get('/sanctum/csrf-token', [LoginController::class, 'generateCsrfToken']);
});