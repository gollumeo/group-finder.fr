<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'Hello World!']);
});


// Group auth routes from auth.php with __DIR__ and a callback function
Route::name('auth.')->group(base_path('routes/Auth/auth.php'));
