<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $journal_code_account_id
 * @property string $title
 * @property string $code
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property JournalCodeAccount $journalCodeAccount
 * @property JournalCode[] $journalCodes
 */
class JournalSubCodeAccount extends Model
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
    protected $fillable = ['journal_code_account_id', 'title', 'code', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journalCodeAccount()
    {
        return $this->belongsTo('App\Models\JournalCodeAccount');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journalCodes()
    {
        return $this->hasMany('App\Models\JournalCode');
    }
}
