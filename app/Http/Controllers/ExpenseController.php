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
    private $rules;

    public function __construct()
    {
        $this->expenseCategory = config('expense.expense_category');
        $this->paymentMethod = config('expense.payment_method');
        $this->rules = [
            'description' => ['required', 'min:3'],
            'date' => ['required', 'date'],
            'amount' => ['required', 'min:1'],
            'category' => ['required', Rule::in($this->expenseCategory)],
            'payment_method' => ['required', Rule::in($this->paymentMethod)],
        ];
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
            'expenses' => new Expense,
            'expenseCategories' => $this->expenseCategory,
            'paymentMethods' => $this->paymentMethod
        ]);
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, $this->rules);
        // dd($postData);
        # $postData['user_id'] = $this->user()->id; [1]way we can get value
        $postData['user_id'] = Auth::user()->id;

        Expense::create($postData);
        return redirect()->route('expense.list');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show')->with([
            'expenses' => $expense,
            'expenseCategories' => $this->expenseCategory,
            'paymentMethods' => $this->paymentMethod
        ]);
    }

    public function update(Request $request)
    {
        /*
            $rules = $this->rules;
            $rules['id'] = ['required', 'exists:expenses,id'];
            we can do this both way
        */
        $this->rules['id'] = ['required', 'exists:expenses,id'];

        $postData = $this->validate($request, $this->rules);

        $expenseId = $postData['id'];
        unset($postData['id']);

        Expense::where('id', $expenseId)->update($postData);

        return redirect()->route('expense.list');
    }

    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::user()->id) {
            abort(401, 'You cannot delete this');
        }
        $expense->delete();
        return redirect()->back();
    }
}
