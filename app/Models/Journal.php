<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $journal_code_id
 * @property integer $journal_transaction_id
 * @property int $credit
 * @property int $debit
 * @property int $note
 * @property string $created_at
 * @property string $updated_at
 * @property JournalCode $journalCode
 * @property JournalTransaction $journalTransaction
 */
class Journal extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['journal_code_id', 'journal_transaction_id', 'credit', 'debit', 'note', 'created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journalCode()
    {
        return $this->belongsTo('App\Models\JournalCode');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journalTransaction()
    {
        return $this->belongsTo('App\Models\JournalTransaction');
    }
}
