<?php

namespace App\Http\Controllers\Api\Auth;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered is incorrect!']
            ]);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('Laravel_api_token')->plainTextToken
        ]);
    }


    public function generateCsrfToken()
    {
        return response()->json(['csrf-token' => csrf_token()]);
    }

}
