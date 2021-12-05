<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $finance_id
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Finance $finance
 * @property FinanceNoteItem[] $financeNoteItems
 */
class FinanceNote extends Model
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
    protected $fillable = ['finance_id', 'note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finance()
    {
        return $this->belongsTo('App\Models\Finance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financeNoteItems()
    {
        return $this->hasMany('App\Models\FinanceNoteItem');
    }
}
