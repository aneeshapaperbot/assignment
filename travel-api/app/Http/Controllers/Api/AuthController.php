<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email'      => 'required|email|unique:users',
            'phone'      => 'required',
            'password'   => 'required|min:6|confirmed'
        ]);

        $nameParts = explode(' ', trim($request->full_name), 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        $user = User::create([
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => Hash::make($request->password),
            'role'       => 'user'
        ]);

         return response()->json([
            'success' => true,
            'message' => 'Registration successful',
            'data' => [
                'user' => $user,
                'redirect_url' => '/login'
            ]
            ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_id' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->login_id,
            'password' => $request->password
        ];

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid login credentials',
                'data' => (object)[]
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'redirect_url' => '/dashboard'
            ]
        ]);
    }

    public function verifyEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'token' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found',
            'data' => (object)[]
        ]);
    }

    $user->email_verified_at = Carbon::now();
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Email verified successfully',
        'data' => [
            'redirect_url' => '/login'
        ]
    ]);
}

public function forgotPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $token = Str::random(60);

    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $request->email],
        ['token' => $token, 'created_at' => now()]
    );

    return response()->json([
        'success' => true,
        'message' => 'Password reset token generated',
        'data' => [
            'redirect_url' => '/reset-password'
        ]
    ]);
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'token' => 'required',
        'password' => 'required|confirmed|min:6'
    ]);

    $record = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

    if (! $record) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid token',
            'data' => (object)[]
        ]);
    }

    User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return response()->json([
        'success' => true,
        'message' => 'Password reset successful',
        'data' => [
            'redirect_url' => '/login'
        ]
    ]);
}


    public function logout()
    {
       JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
