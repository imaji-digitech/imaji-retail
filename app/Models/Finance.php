<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $product_type_id
 * @property integer $status_rab_id
 * @property integer $status_spj_id
 * @property string $title
 * @property integer $user_id
 * @property string $rab_note
 * @property string $rab_revision_note
 * @property string $spj_note
 * @property string $spj_revision_note
 * @property string $created_at
 * @property string $updated_at
 * @property integer $finance_id
 * @property ProductType $productType
 * @property FinanceStatus $rabStatus
 * @property FinanceStatus $spjStatus
 * @property FinanceItem[] $financeItems
 * @property FinanceNoteItem[] $financeNoteItems
 * @property FinanceNote[] $financeNotes
 */
class Finance extends Model
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
    protected $fillable = [
        'product_type_id',
        'status_rab_id',
        'status_spj_id',
        'title',
        'user_id',
        'rab_note',
        'rab_revision_note',
        'spj_note',
        'spj_revision_note',
        'created_at',
        'updated_at',

    ];

    public static function search($query, $dataId)
    {
        if (auth()->user()->role==1){
            return empty($query) ? static::query()->whereProductTypeId($dataId)
                : static::whereProductTypeId($dataId)->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        }else{
            return empty($query) ? static::query()->whereProductTypeId($dataId)->whereUserId(auth()->id())
                : static::whereProductTypeId($dataId)->whereUserId(auth()->id())->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhereHas('user', function ($q) use ($query) {
                            $q->where('name', 'like', '%' . $query . '%');
                        });
                });
        }
    }

    /**
     * @return BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType');
    }

    /**
     * @return BelongsTo
     */
    public function rabStatus()
    {
        return $this->belongsTo('App\Models\FinanceStatus', 'status_rab_id');
    }

    /**
     * @return BelongsTo
     */
    public function spjStatus()
    {
        return $this->belongsTo('App\Models\FinanceStatus', 'status_spj_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function financeItems()
    {
        return $this->hasMany('App\Models\FinanceItem');
    }

    /**
     * @return HasMany
     */
//    public function financeNotes()
//    {
//        return $this->hasMany('App\Models\FinanceNote', 'finance_note_id');
//    }

    /**
     * @return HasMany
     */
    public function financeNotes()
    {
        return $this->hasMany('App\Models\FinanceNote');
    }
}
