<?php

namespace App\Http\Controllers\Auth;

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
        // $user = User::where('email', $request->email)->first();
        // if (!$user) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The credentials you entered is incorrect!']
        //     ]);
        // }

        if (!auth()->attempt($request->only(['email','password']))) {
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered is incorrect!']
            ]);
        }
    }

    // public function login(Request $request)
    // {
    //     $email = $request->email;
    //     $password = $request->password;

    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         $token = $request->user()->createToken(auth()->user()->id);

    //         return response()->json(['status' => true, 'message' => 'Login Berhasil', 'token' => $token->plainTextToken]);
    //     }

    //     return response()->json(['status' => false, 'message' => 'email & dan password salah'], 401);
    // }

    public function generateCsrfToken()
    {
        return response()->json(['csrf-token' => csrf_token()]);
    }

    // public function login(Request $request)
    // {
    //     $user = Auth::attempt([
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ]);

    //     dd($user);
    // }
}
