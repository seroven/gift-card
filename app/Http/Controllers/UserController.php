<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function create(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        return $this->repository->create($request->all());
    }

    public function delete($id)
    {
        return $this->repository->update($id, array("enable" => 0));
    }
}
