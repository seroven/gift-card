<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property float $mount
 * @property string $code
 * @property string $email
 * @property string $dateIssue
 * @property string $dateExpired
 * @property integer $idStatus
 * @property integer $enable
 * @property string $created_at
 * @property string $updated_at
 * @property Status $status
 */
class GiftCard extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'giftcard';

    /**
     * @var array
     */
    protected $fillable = ['name', 'mount', 'code', 'email', 'dateIssue', 'dateExpired', 'idStatus', 'enable', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'idStatus');
    }
}
