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
        $income = Number::format(Transaction::whereMonth('created_at', date('m'))->where('type', 'income')->sum('amount'));
        $expense = Number::format(Transaction::whereMonth('created_at', date('m'))->where('type', 'expense')->sum('amount'));
        $balance = Auth::user()->balance;
        $cash_balance = Auth::user()->cash_balance;
        $card_balance = Auth::user()->card_balance;

        $categories_income = Category::where('type', 'income')->get();
        $categories_expense = Category::where('type', 'expense')->get();

        $income_info = [];
        $expense_info = [];

        foreach ($categories_income as $category) {
            $income_info[] = [
                'name' => $category->name,
                'amount' => $category->transactions()->whereMonth('created_at', date('m'))->sum('amount')
            ];
        }

        foreach ($categories_expense as $category) {
            $expense_info[] = [
                'name' => $category->name,
                'amount' => $category->transactions()->whereMonth('created_at', date('m'))->sum('amount')
            ];
        }

        $income_info = array_filter($income_info, function ($item) {
            return $item['amount'] > 0;
        });

        $expense_info = array_filter($expense_info, function ($item) {
            return $item['amount'] > 0;
        });

        return view('home', compact('transactions', 'income', 'expense', 'balance', 'cash_balance', 'card_balance', 'income_info', 'expense_info'));
    }
}
