<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\User\UserRepositoryInterface;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function login(LoginRequest $request) 
    {
        $credentials = $request->only([
            'email',
            'password'
        ]);
        $token = auth()->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterRequest $request) 
    {
        $data = $request->only([
            'name',
            'email'
        ]);
        $data['password'] = bcrypt($request->password);

        $this->userRepository->create($data);
    }

    public function logout() 
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
}
