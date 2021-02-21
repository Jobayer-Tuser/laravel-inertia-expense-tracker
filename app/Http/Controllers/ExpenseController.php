<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
{
    private $expenseCategory;
    private $paymentMethod;

    public function __construct()
    {
        $this->expenseCategory = config('expense.expense_category');
        $this->paymentMethod = config('expense.payment_method');
    }
    public function index()
    {
        //$expenses = Expense::orderByDesc('id')->get();
        $expenses = Expense::orderByDesc('id')->paginate(5); //if we want 5 data per page

        return view('expenses.index')->with('expenses', $expenses);
    }

    public function create()
    {
        return view('expenses.create')->with([
            'expenses' => $this->expenseCategory,
            'payment' => $this->paymentMethod
        ]);
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'description' => ['required', 'min:3'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'min:1'],
            'category' => ['required', Rule::in($this->expenseCategory)],
            'payment_method' => ['required', Rule::in($this->paymentMethod)],
        ]);
        // dd($postData);
        # $postData['user_id'] = $this->user()->id; [1]way we can get value
        $postData['user_id'] = Auth::user()->id;

        Expense::create($postData);
        return redirect()->route('expense.list');
    }

    public function show(Expense $expense)
    {
        return view('expense.show')->with([
            'expenseCategories' => $this->expenseCategory,
            'paymentMethods' => $this->paymentMethod
        ]);
    }
}
