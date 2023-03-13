<?php

namespace App\Services;

use App\Events\TransferCreated;
use App\Http\Requests\TransferRequest;

class TransferService
{
    public function handle(TransferRequest $request)
    {
        $data = new \stdClass();
        $data->amount = preg_replace('/[^0-9.]/', '', $request->input('amount'));
        $data->type = $request->input('type');
        $data->user = auth()->user();

        TransferCreated::dispatch($data);
    }
}
