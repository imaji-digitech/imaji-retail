<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $transaction_id
 * @property integer $total
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Transaction $transaction
 */
class TransactionPaymentCash extends Model
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
    protected $fillable = ['transaction_id', 'total', 'note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
