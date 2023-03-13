<?php

namespace App\Http\Controllers;

use App\Events\TransferCreated;
use App\Http\Requests\TransferRequest;
use App\Services\TransferService;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer');
    }

    public function store(TransferRequest $request, TransferService $transferService): \Illuminate\Http\RedirectResponse
    {
        $transferService->handle($request);
        return redirect()->route('transfer.index')->with('success', 'O\'tkazma muvaffaqiyatli amalga oshirildi');
    }
}
