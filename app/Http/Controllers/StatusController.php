<?php

namespace App\Http\Controllers;

use App\Interfaces\StatusRepositoryInterface;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $repository;

    public function __construct(StatusRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function all(){
        return $this->repository->all();
    }

}
