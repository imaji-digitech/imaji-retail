<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property CashBook[] $cashBooks
 * @property CashNote[] $cashNotes
 * @property Product[] $products
 */
class ProductType extends Model
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
    protected $fillable = ['user_id', 'title', 'created_at', 'updated_at'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return HasMany
     */
    public function cashBooks()
    {
        return $this->hasMany('App\Models\CashBook');
    }

    /**
     * @return HasMany
     */
    public function cashNotes()
    {
        return $this->hasMany('App\Models\CashNote');
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
