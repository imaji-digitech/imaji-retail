<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_type_id
 * @property integer $journal_transaction_type_id
 * @property string $transaction_date
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property JournalTransactionType $journalTransactionType
 * @property ProductType $productType
 * @property Journal[] $journals
 */
class JournalTransaction extends Model
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
    protected $fillable = ['product_type_id', 'journal_transaction_type_id', 'transaction_date', 'title', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journalTransactionType()
    {
        return $this->belongsTo('App\Models\JournalTransactionType');
    }

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereProductTypeId($dataId)
            : static::whereProductTypeId($dataId)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('transaction_date', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->orWhereHas('journals',function ($q1) use ($query) {
                            $q1->whereHas('journalCode', function ($q2) use ($query) {
                                $q2->where('title', 'like', '%' . $query . '%')
                                    ->orWhere('code', 'like', '%' . $query . '%');
                            });
                        })
                    ;
                });
//        'journal_code_id', 'journal_transaction_id', 'credit', 'debit', 'note',
    }

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
    public function journals()
    {
        return $this->hasMany('App\Models\Journal');
    }
}
