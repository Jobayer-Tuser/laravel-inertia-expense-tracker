<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        //$expenses = Expense::orderByDesc('id')->get();
        $expenses = Expense::orderByDesc('id')->paginate(5); //if we want 5 data per page

        return view('expenses.index')->with('expenses', $expenses);
    }

    public function create()
    {
        $expenseCategory = config('expense.expense_category');
        $paymentMethod = config('expense.payment_method');

        return view('expenses.create')->with([
            'expenses' => $expenseCategory,
            'payment' => $paymentMethod
        ]);
    }

    public function store(Request $request)
    {
        $expenseCategory = config('expense.expense_category');
        $paymentMethod = config('expense.payment_method');

        $postData = $this->validate($request, [
            'description' => ['required', 'min:3'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'min:1'],
            'category' => ['required', Rule::in($expenseCategory)],
            'payment_method' => ['required', Rule::in($paymentMethod)],
        ]);
        // dd($postData);
        # $postData['user_id'] = $this->user()->id; [1]way we can get value
        $postData['user_id'] = Auth::user()->id;

        Expense::create($postData);
        return redirect()->route('expense.list');
    }
}
