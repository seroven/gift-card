<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GiftCardRepositoryInterface extends EssentialRepositoryInterface
{
    function getByCode($code);
}
