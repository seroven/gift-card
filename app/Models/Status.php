<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $description
 * @property string $keycode
 * @property integer $enable
 * @property string $created_at
 * @property string $updated_at
 * @property Giftcard[] $giftcards
 */
class Status extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'status';

    /**
     * @var array
     */
    protected $fillable = ['description', 'keycode', 'enable', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function giftcards()
    {
        return $this->hasMany('App\Models\Giftcard', 'idStatus');
    }
}
