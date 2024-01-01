<?php
namespace App\Repositories;
use App\Interfaces\StatusRepositoryInterface;
use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class StatusRepository extends EssentialRepository implements StatusRepositoryInterface{


    protected $model;

    public function __construct(Status $model) {
        $this->model = $model;
    }

}