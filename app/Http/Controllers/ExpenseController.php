<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        //$expenses = Expense::orderByDesc('id')->get();
        $expenses = Expense::orderByDesc('id')->paginate(5); //if we want 5 data per page

        return view('expenses.index')->with('expenses', $expenses);
    }
}
