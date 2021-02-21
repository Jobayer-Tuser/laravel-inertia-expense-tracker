<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'category_type' => ['required', Rule::in($expenseCategory)],
            'payment_type' => ['required', Rule::in($paymentMethod)],
        ]);
        // dd($postData);
        Expense::create($postData);
        return $request->all();
    }
}
