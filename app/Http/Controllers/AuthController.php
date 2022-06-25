<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $r)
    {
        $r->headers->set('Accept', 'application/json');
        $r->headers->set('Content-Type', 'application/json');

        $fields = $r->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(Request $r)
    {
        $r->headers->set('Accept', 'application/json');
        $r->headers->set('Content-Type', 'application/json');

        $fields = $r->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid Email or Password'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $r)
    {
        $r->headers->set('Accept', 'application/json');
        $r->headers->set('Content-Type', 'application/json');

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out',
        ];
    }

    public function updateProfile(Request $r)
    {
        $r->headers->set('Accept', 'application/json');
        $r->headers->set('Content-Type', 'application/json');

        $user = User::where('id', $r->user_id)->update([
            'name' => !$r->name ? auth()->user()->name : $r->name,
            'email' => !$r->email ? auth()->user()->email : $r->email,
            'password' => !$r->password ? auth()->user()->password : bcrypt($r->password)
        ]);

        return [
            'message' => 'Update Success',
        ];
    }
}
