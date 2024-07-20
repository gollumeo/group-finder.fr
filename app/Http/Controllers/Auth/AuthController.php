<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController
{
    /**
     * @throws ValidationException
     */
    public function register(): JsonResponse
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json($user, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @throws ValidationException
     */
    public function login(): JsonResponse
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $validated = $validator->validated();

        if (! auth()->guard('web')->attempt($validated)) {
            return response()->json(['message' => 'Accès non autorisé'], 401, [], JSON_PRETTY_PRINT);
        }

        auth()->user();
        //        request()->session()->regenerate();

        return response()->json('Connexion effectuée avec succès!', 200, [], JSON_PRETTY_PRINT);
    }
}
//        $token = auth()->user()->createToken('authToken')->plainTextToken;
