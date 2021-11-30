<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Bad Request',
            ]);
        }

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Unauthorized',
            ]);
        }

        $user = User::where('email', $request->email)->first();
        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'status_code' => 200,
            'token' => $tokenResult,
        ]);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status_code' => 200,
            'message' => 'Token deleted successfully',
        ]);
    }
}
