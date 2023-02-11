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

        if ($type === 'income') {
            $user->balance -= $amount;
        } else {
            $user->balance += $amount;
        }

        $user->save();
    }
}
