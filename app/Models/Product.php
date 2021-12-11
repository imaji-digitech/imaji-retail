<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $product_type_id
 * @property string $title
 * @property string $code
 * @property int $price
 * @property int $hpp
 * @property int $stock
 * @property string $created_at
 * @property string $updated_at
 * @property ProductType $productType
 * @property ProductHistory[] $productHistories
 * @property ProductManufacture[] $productManufactures
 * @property TransactionCredit[] $transactionCredits
 * @property TransactionDetail[] $transactionDetails
 * @property TransactionPaymentDetail[] $transactionPaymentDetails
 * @property TransactionReturnDetail[] $transactionReturnDetails
 * @property UserLog[] $userLogs
 */
class Product extends Model
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
    protected $fillable = ['product_type_id', 'title', 'code', 'price', 'hpp', 'stock', 'created_at', 'updated_at'];

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereProductTypeId($dataId)
            : static::whereProductTypeId($dataId)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('code', 'like', '%' . $query . '%')
                        ->orWhere('price', 'like', '%' . $query . '%')
                        ->orWhere('hpp', 'like', '%' . $query . '%');
                });
    }

    /**
     * @return BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }

    /**
     * @return HasMany
     */
    public function productHistories()
    {
        return $this->hasMany('App\Models\ProductHistory');
    }

    /**
     * @return HasMany
     */
    public function productManufactures()
    {
        return $this->hasMany('App\Models\ProductManufacture');
    }

    /**
     * @return HasMany
     */
    public function transactionCredits()
    {
        return $this->hasMany('App\Models\TransactionCredit');
    }

    /**
     * @return HasMany
     */
    public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail');
    }

    /**
     * @return HasMany
     */
    public function transactionPaymentDetails()
    {
        return $this->hasMany('App\Models\TransactionPaymentDetail');
    }

    /**
     * @return HasMany
     */
    public function transactionReturnDetails()
    {
        return $this->hasMany('App\Models\TransactionReturnDetail');
    }

    /**
     * @return HasMany
     */
    public function userLogs()
    {
        return $this->hasMany('App\Models\UserLog');
    }
}
