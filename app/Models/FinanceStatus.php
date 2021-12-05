<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property Finance[] $spjs
 * @property Finance[] $rabs
 */
class FinanceStatus extends Model
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
    protected $fillable = ['title', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rabs()
    {
        return $this->hasMany('App\Models\Finance', 'status_rab_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function spjs()
    {
        return $this->hasMany('App\Models\Finance', 'status_spj_id');
    }
}
