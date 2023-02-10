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

    public static function getDebitCredit($umkm,$start,$end,$code,$note){
        return Journal::whereHas('journalTransaction',function($q) use ($start, $end, $umkm) {
            $q->where('product_type_id',$umkm)
                ->whereBetween('transaction_date',[$start,$end])
            ;
        })->where('journal_code_id',$code)->sum($note);
    }

    public static function getWorksheetDebitCredit($umkm,$type,$code,$start,$end,$note){

        return Journal::whereHas('journalTransaction',function($q) use ($type, $start, $end, $umkm) {
            $q->where('product_type_id',$umkm)
                ->where('journal_transaction_type_id',$type)
                ->whereBetween('transaction_date',[$start,$end])
            ;
        })->where('journal_code_id',$code)->sum($note);
    }
}
