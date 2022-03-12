<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $recipient_id
 * @property integer $finance_id
 * @property integer $product_type_id
 * @property string $title
 * @property string $regarding
 * @property string $note
 * @property int $nominal
 * @property string $created_at
 * @property string $updated_at
 * @property int $receipt_type
 * @property string $no_receipt
 * @property User $finance
 * @property User $recipient
 * @property ProductType $productType
 */
class Receipt extends Model
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
    protected $fillable = ['recipient_id', 'finance_id', 'product_type_id', 'title', 'regarding', 'note', 'nominal', 'created_at', 'updated_at', 'receipt_type', 'no_receipt','status'];

    public static function getCode($id)
    {
        $receipt = Receipt::find($id);
        $c = Receipt::whereProductTypeId($receipt->product_type_id)->whereMonth('created_at', $receipt->created_at)->get()->count();
        $receipt->update(['no_receipt' => $receipt->productType->code . "." . str_pad($c, 2, '0', STR_PAD_LEFT) . '.' . $receipt->created_at->format('dmY')]);
        return $receipt;
    }

    public static function search($query, $dataId)
    {
        return empty($query) ? static::query()->whereProductTypeId($dataId) :
            static::whereProductTypeId($dataId)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->where('no_receipt', 'like', '%' . $query . '%')
                        ->where('regarding', 'like', '%' . $query . '%')
                        ->where('note', 'like', '%' . $query . '%')
                        ->orWhereHas('recipient', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
    }

    /**
     * @return BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo('App\Models\User', 'recipient_id');
    }

    /**
     * @return BelongsTo
     */
    public function finance()
    {
        return $this->belongsTo('App\Models\User', 'finance_id');
    }

    /**
     * @return BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }
}
