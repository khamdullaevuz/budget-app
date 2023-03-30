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
        $transactions = Transaction::whereMonth('created_at', date('m'))->count();
        $income = Transaction::whereMonth('created_at', date('m'))->where('type', 'income')->sum('amount');
        $expense = Transaction::whereMonth('created_at', date('m'))->where('type', 'expense')->sum('amount');
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

        // now is last month and select last 11 months income and expense and month with year

        $income_per_month = [];
        $expense_per_month = [];
        $current_month = now()->month;
        $current_year = now()->year;

        for ($i = 0; $i < 12; $i++) {
            $month = $current_month - $i;
            if ($month <= 0) {
                $month += 12;
            }
            $year = $current_year;
            if ($month > $current_month) {
                $year--;
            }

            $income_per_month[] = [
                'month' => $month,
                'year' => $year,
                'amount' => Transaction::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('type', 'income')->sum('amount')
            ];
            $expense_per_month[] =  [
                'month' => $month,
                'year' => $year,
                'amount' => Transaction::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('type', 'expense')->sum('amount')
            ];
        }

        $income_per_month = array_reverse($income_per_month);
        $expense_per_month = array_reverse($expense_per_month);

        if(array_map(function ($item) {
            return $item['amount'];
        }, $income_per_month) == array_fill(0, count($income_per_month), 0)) {
            $income_per_month = [];
        }

        if(array_map(function ($item) {
            return $item['amount'];
        }, $expense_per_month) == array_fill(0, count($expense_per_month), 0)) {
            $expense_per_month = [];
        }

        return view('home', compact('transactions', 'income', 'expense', 'balance', 'cash_balance', 'card_balance', 'income_info', 'expense_info', 'income_per_month', 'expense_per_month'));
    }
}
