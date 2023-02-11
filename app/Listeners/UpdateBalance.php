<?php

namespace App\Listeners;

use App\Events\TransactionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateBalance
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
     * @param TransactionCreated $event
     * @return void
     */
    public function handle(TransactionCreated $event)
    {
        $transaction = $event->transaction;
        $amount = $transaction->amount;
        $type = $transaction->type;
        $user = $transaction->user;

        if ($type === 'income') {
            $user->balance += $amount;
        } else {
            $user->balance -= $amount;
        }

        $user->save();
    }
}
