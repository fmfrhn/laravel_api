<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;

require __DIR__ ."/api/V1.php";

require __DIR__ ."/api/V2.php";

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class); // Menggunakan controller invoke untuk login
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum'); // Menggunakan invoke untuk logout
    Route::post('/register', RegisterController::class); // Menggunakan invoke untuk register
    Route::get('/sanctum/csrf-token', [LoginController::class, 'generateCsrfToken']); // Tetap menggunakan metode `generateCsrfToken`
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
