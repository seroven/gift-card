<?php
namespace App\Repositories;
use App\Interfaces\GiftCardRepositoryInterface;
use App\Models\GiftCard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GiftCardRepository extends EssentialRepository implements GiftCardRepositoryInterface{


    protected $model;

    public function __construct(GiftCard $model) {
        $this->model = $model;
    }

    public function getByCode($code) {
        return $this->model->where('code', $code)->first();
    }
    

}