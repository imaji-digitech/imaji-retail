<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\TransactionCredit;
use App\Models\TransactionPayment;
use App\Models\TransactionReturn;
use Livewire\Component;

class DetailTransaction extends Component
{
    public $dataId;
    public $transaction;
    public function mount(){
        $this->transaction=Transaction::find($this->dataId);
    }
    public function render()
    {
        return view('livewire.detail-transaction');
    }
    public function cancelReturn($id){
        $tp=TransactionReturn::find($id);
        $tc=Transaction::find($tp->transaction_id);
        foreach ($tp->transactionReturnDetails as $tpd){
            $check=true;
            foreach ($tc->transactionCredits as $tcd){
                if ($tcd->product_id==$tpd->product_id){
                    TransactionCredit::find($tcd->id)->update([
                        'total'=>$tpd->total+$tcd->total,
                        'quantity'=>$tpd->quantity+$tcd->quantity,
                    ]);
                    $check=false;
                    break;
                }
            }
            if ($check){
                TransactionCredit::create([
                    'transaction_id'=>$tp->transaction_id,
                    'product_id'=>$tpd->product_id,
                    'quantity'=>$tpd->quantity,
                    'total'=>$tpd->total
                ]);
            }
        }
        $tp->delete();
        $this->transaction=Transaction::find($this->dataId);
    }

    public function cancelPayment($id){
        $tp=TransactionPayment::find($id);
        $tc=Transaction::find($tp->transaction_id);
        foreach ($tp->transactionPaymentDetails as $tpd){
            $check=true;
            foreach ($tc->transactionCredits as $tcd){
                if ($tcd->product_id==$tpd->product_id){
                    TransactionCredit::find($tcd->id)->update([
                        'total'=>$tpd->total+$tcd->total,
                        'quantity'=>$tpd->quantity+$tcd->quantity,
                    ]);
                    $check=false;
                    break;
                }
            }
            if ($check){
                TransactionCredit::create([
                    'transaction_id'=>$tp->transaction_id,
                    'product_id'=>$tpd->product_id,
                    'quantity'=>$tpd->quantity,
                    'total'=>$tpd->total
                ]);
            }
        }
        $tp->delete();
        $this->transaction=Transaction::find($this->dataId);
    }
}
