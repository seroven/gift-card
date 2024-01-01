<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseFormat;
use App\Interfaces\TokenRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function login(Request $request)
    {
        $user = $this->repository->getByEmail($request['email']);
        
        if (!$user) {
            return ResponseFormat::format(403, null, 'User doesn\'t exist');
        }

        if (!Hash::check($request['password'], $user->password)) {
            return ResponseFormat::format(403, null, 'Incorrect password');
        }

        $token = JWTAuth::fromUser($user);
        
        return ResponseFormat::format(200, $token);
    }
}
