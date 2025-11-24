<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\RegisterTransaction;
use App\Models\Category;
use App\Models\TypePayment;
use App\Models\TypeTransaction;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $transactionsMade = RegisterTransaction::all();
        $categories = Category::where('type_category', 1)->get();
        $payments = TypePayment::all();
        $transactions = TypeTransaction::all();

        
        return view('admin.dashboard.dashboard', compact('transactionsMade', 'categories', 'payments', 'transactions'));
    }
}
