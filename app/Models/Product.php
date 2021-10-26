<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productHistories()
    {
        return $this->hasMany('App\Models\ProductHistory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productManufactures()
    {
        return $this->hasMany('App\Models\ProductManufacture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionCredits()
    {
        return $this->hasMany('App\Models\TransactionCredit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionPaymentDetails()
    {
        return $this->hasMany('App\Models\TransactionPaymentDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionReturnDetails()
    {
        return $this->hasMany('App\Models\TransactionReturnDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLogs()
    {
        return $this->hasMany('App\Models\UserLog');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%')
                ->orWhere('code', 'like', '%' . $query . '%')
                ->orWhere('price', 'like', '%' . $query . '%')
                ->orWhere('hpp', 'like', '%' . $query . '%')
                ->orWhereHas('productType', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
    }
}
