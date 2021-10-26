<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property User $user
 */
class UserLog extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'note','user_note', 'created_at', 'updated_at'];

    public static function productSearch($query,$id)
    {
        return empty($query) ? static::query()->whereProductId($id)
            : static::whereProductId($id)->where(function ($q) use ($query) {
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                    ->orWhere('note', 'like', '%' . $query . '%')
                    ->orWhere('user_note', 'like', '%' . $query . '%')
                    ->orWhere('created_at', 'like', '%' . $query . '%');
            });
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
