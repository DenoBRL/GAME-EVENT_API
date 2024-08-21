<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
        $request->validate([
            'surname' => 'required|string|min:2|max:255',
            'name_user' => 'required|string|min:2|max:255',
            'pseudo' => 'required|string|min:2|max:255',
            'image_profile' => 'required|image|max:4000',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:255',
        ]);

        $user = $this->user::create([
            'surname' => $request['surname'],
            'name_user' => $request['name_user'],
            'pseudo' => $request['pseudo'],
            'image_profile' => $request['image_profile'],
            'date_of_birth' => $request['date_of_birth'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $token = auth()->login($user);

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User created successfully!',
            ],
            'data' => [
                'user' => $user,
                'access_token' => [
                    'token' => $token,
                    'type' => 'Bearer',
                    'expires_in' => auth()->factory()->getTTL() * 3600, // Renseigne le temps d'expiration du token en secondes
                ],
            ],
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $token = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($token) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Quote fetched successfully.',
                ],
                'data' => [
                    'user' => auth()->user(),
                    'access_token' => [
                        'token' => $token,
                        'type' => 'Bearer',
                        'expires_in' => auth()->factory()->getTTL() * 3600,
                    ],
                ],
            ]);
        }
    }

    public function logout()
    {
        $token = JWTAuth::getToken();

        $invalidate = JWTAuth::invalidate($token);

        if ($invalidate) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Successfully logged out',
                ],
                'data' => [],
            ]);
        }
    }
}
