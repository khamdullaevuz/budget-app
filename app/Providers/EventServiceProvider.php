<?php

namespace App\Providers;

use App\Events\TransactionCreated;
use App\Events\TransactionDeleted;
use App\Events\TransferCreated;
use App\Listeners\RefundAmount;
use App\Listeners\TransferBalance;
use App\Listeners\UpdateBalance;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TransactionCreated::class => [
            UpdateBalance::class,
        ],
        TransactionDeleted::class => [
            RefundAmount::class
        ],
        TransferCreated::class => [
            TransferBalance::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
