<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $journal_sub_code_account_id
 * @property integer $product_type_id
 * @property string $title
 * @property string $code
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property JournalSubCodeAccount $journalSubCodeAccount
 * @property ProductType $productType
 * @property Journal[] $journals
 */
class JournalCode extends Model {
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    /**
     * @var array
     */
    protected $fillable = ['journal_sub_code_account_id', 'product_type_id', 'title', 'code', 'description', 'created_at', 'updated_at'];

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereProductTypeId($dataId)
            : static::whereProductTypeId($dataId)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('code', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%');
                });
    }

    /**
     * @return BelongsTo
     */
    public function journalSubCodeAccount()
    {
        return $this->belongsTo('App\Models\JournalSubCodeAccount');
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
    public function journals()
    {
        return $this->hasMany('App\Models\Journal');
    }
}
