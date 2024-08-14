<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function success(mixed $data, int $code = 200): JsonResponse
    {
        return response()->json($data, $code, [], JSON_PRETTY_PRINT);
    }

    public function error(mixed $data, int $code = 500): JsonResponse
    {
        return response()->json($data, $code, [], JSON_PRETTY_PRINT);
    }
}
