<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'Hello World!']);
});

// Group auth routes from auth.php with __DIR__ and a callback function
Route::name('auth.')->group(base_path('routes/Auth/auth.php'));

Route::middleware('api')->group(function () {
    Route::middleware([EnsureFrontendRequestsAreStateful::class,
        ThrottleRequests::class.':api',
        SubstituteBindings::class])->group(function () {
            // Routes
        });
});
