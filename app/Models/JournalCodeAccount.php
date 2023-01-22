<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property JournalSubCodeAccount[] $journalSubCodeAccounts
 */
class JournalCodeAccount extends Model
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
    protected $fillable = ['title', 'code', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journalSubCodeAccounts()
    {
        return $this->hasMany('App\Models\JournalSubCodeAccount');
    }
}
