<?php

namespace App\Listeners;

use App\Events\TransferCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransferBalance
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
     * @param TransferCreated $event
     * @return void
     */
    public function handle(TransferCreated $event)
    {
        $transfer = $event->transfer;
        $amount = $transfer->amount;
        $type = $transfer->type;
        $user = $transfer->user;

        if($type == 'card2cash')
        {
            $user->card_balance -= $amount;
            $user->cash_balance += $amount;
        }else{
            $user->card_balance += $amount;
            $user->cash_balance -= $amount;
        }

        $user->save();
    }
}
