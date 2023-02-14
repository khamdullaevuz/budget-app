<?php

namespace App\Listeners;

use App\Events\TransactionDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RefundAmount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param TransactionDeleted $event
     * @return void
     */
    public function handle(TransactionDeleted $event)
    {
        $transaction = $event->transaction;
        $amount = $transaction->amount;
        $type = $transaction->type;
        $user = $transaction->user;
        $payment_method = $transaction->payment_method;

        if ($payment_method == 'cash') {
            if ($type == 'income') {
                $user->cash_balance -= $amount;
            } else {
                $user->cash_balance += $amount;
            }
            $user->save();
        }else{
            if ($type == 'income') {
                $user->card_balance -= $amount;
            } else {
                $user->card_balance += $amount;
            }
            $user->save();
        }

        $user->save();
    }
}
