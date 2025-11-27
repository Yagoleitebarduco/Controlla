<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\RegisterTransaction;
use App\Models\Category;
use App\Models\TypePayment;
use App\Models\TypeTransaction;

class RegisterTransactionController extends Controller
{
    public function showToRegisterTransaction()
    {
        $transactionsMade = RegisterTransaction::all();
        $categories = Category::where('type_category', 1)->get();
        $payments = TypePayment::all();
        $transactions = TypeTransaction::all();
        return view('admin.RdT.registroTransacao', compact('transactionsMade', 'categories', 'payments', 'transactions'));
    }

    public function store(Request $request)
    {
        $$formatterValue = $request->input('value_transaction');
        $valueThousands = str_replace('.', '', $$formatterValue);
        $finalValue = str_replace(',', '.', $valueThousands);
        $convertedValue = (float) $finalValue;

        $request->validate([
            'TypeTransaction_id' => 'required',
        ]);

        $data = $request->all();
        $data['value_transaction'] = $convertedValue;

        RegisterTransaction::create($data);

        // RegisterTransaction::create([
        //     'TypeTransaction_id' => $request->TypeTransaction_id,
        //     'description_sale' => $request->description_sale,
        //     'value_transaction' => $request->value_transaction,
        //     'entry_date' => $request->entry_date,
        //     'Category_id' => $request->Category_id,
        //     'TypePayment_id' => $request->TypePayment_id,
        //     'status_transaction' => $request->status_transaction,
        // ]);

        return redirect()->route('registerTransaction');
    }
}
