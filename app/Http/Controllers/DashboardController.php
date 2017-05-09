<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseType;
use App\Expense;

class DashboardController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        $types = ExpenseType::all();

        return view('dashboard.index', compact('expenses', 'types'));
    }
}
