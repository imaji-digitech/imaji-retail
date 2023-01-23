<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Asset[] $assets
 * @property CashBook[] $cashBooks
 * @property CashNote[] $cashNotes
 * @property Finance[] $finances
 * @property JournalCode[] $journalCodes
 * @property JournalTransaction[] $journalTransactions
 * @property Product[] $products
 * @property Receipt[] $receipts
 */
class ProductType extends Model {
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'code', 'created_at', 'updated_at'];


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
    public function assets()
    {
        return $this->hasMany('App\Models\Asset');
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
    public function finances()
    {
        return $this->hasMany('App\Models\Finance');
    }

    /**
     * @return HasMany
     */
    public function journalCodes()
    {
        return $this->hasMany('App\Models\JournalCode');
    }

    /**
     * @return HasMany
     */
    public function journalTransactions()
    {
        return $this->hasMany('App\Models\JournalTransaction');
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * @return HasMany
     */
    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }
}
