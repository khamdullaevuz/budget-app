<?php

namespace App\Http\Controllers;

use App\Helpers\Number;
use App\Models\Category;
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
        $transactions = Transaction::count();
        $income = Number::format(Transaction::where('type', 'income')->sum('amount'));
        $expense = Number::format(Transaction::where('type', 'expense')->sum('amount'));
        $balance = Number::format(Auth::user()->balance);
        $cash_balance = Number::format(Auth::user()->cash_balance);
        $card_balance = Number::format(Auth::user()->card_balance);

        $income_info = Category::where('type', 'income')->withSum('transactions', 'amount')->whereMonth('created_at', date('m'))->having('transactions_sum_amount','!=', 0)->get('transactions_sum_amount');
        $expense_info = Category::where('type', 'expense')->withSum('transactions', 'amount')->whereMonth('created_at', date('m'))->having('transactions_sum_amount','!=', 0)->get('transactions_sum_amount');

        return view('home', compact('transactions', 'income', 'expense', 'balance', 'cash_balance', 'card_balance', 'income_info', 'expense_info'));
    }
}
