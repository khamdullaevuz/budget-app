<?php

namespace App\Http\Controllers;

use App\Helpers\Number;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
            ->with('transactions', Transaction::count())
            ->with('income', Number::format(Transaction::where('type', 'income')->sum('amount')))
            ->with('expense', Number::format(Transaction::where('type', 'expense')->sum('amount')))
            ->with('balance', Number::format(Auth::user()->balance));
    }
}
