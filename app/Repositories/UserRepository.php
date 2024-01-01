<?php
namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends EssentialRepository implements UserRepositoryInterface{


    protected $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function getByEmail($email) {
        return $this->model->where('email', $email)->first();
    }


}