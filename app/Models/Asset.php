<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $asset_state_id
 * @property integer $product_type_id
 * @property integer $asset_code_id
 * @property integer $asset_ownership_id
 * @property string $code
 * @property string $title
 * @property int $amount
 * @property int $nominal
 * @property string $created_at
 * @property string $updated_at
 * @property AssetCode $assetCode
 * @property AssetOwnership $assetOwnership
 * @property AssetState $assetState
 * @property ProductType $productType
 */
class Asset extends Model
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
    protected $fillable = ['asset_state_id', 'product_type_id', 'asset_code_id', 'asset_ownership_id', 'code', 'title', 'amount', 'nominal', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetCode()
    {
        return $this->belongsTo('App\Models\AssetCode');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetOwnership()
    {
        return $this->belongsTo('App\Models\AssetOwnership');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetState()
    {
        return $this->belongsTo('App\Models\AssetState');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }
    public static function search($query)
    {
        if (auth()->id()!=22){
            return empty($query) ? static::query()
                : static::where('title', 'like', '%' . $query . '%');
        }else{
            return empty($query) ? static::query()->whereProductTypeId(8)
                : static::whereProductTypeId(8)->where('title', 'like', '%' . $query . '%');
        }
    }
}
