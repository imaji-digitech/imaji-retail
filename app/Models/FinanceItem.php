<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $finance_id
 * @property integer $finance_unit_id
 * @property string $title
 * @property int $amount
 * @property int $price
 * @property string $created_at
 * @property string $updated_at
 * @property Finance $finance
 * @property FinanceUnit $financeUnit
 */
class FinanceItem extends Model
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
    protected $fillable = ['finance_id', 'finance_unit_id', 'title', 'amount', 'price', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finance()
    {
        return $this->belongsTo('App\Models\Finance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financeUnit()
    {
        return $this->belongsTo('App\Models\FinanceUnit');
    }
}
