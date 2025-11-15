<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Stock;


class StockController extends Controller
{
    public function showToStock()
    {
        $products = Stock::all();
        return view('admin.estoque.estoque', compact('products'));
    }

    public function showToCreateItemStock()
    {
        $categories = Category::where('type_category', 2)->get();
        return view('admin.estoque.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $formatterValue = $request->input('unit_value');
        $valueThousands = str_replace('.', '', $formatterValue);
        $finalValue = str_replace(',', '.', $valueThousands);
        $convertedValue = (float) $finalValue;

        $request->validate(
            [
                'cod' => [
                    'required',
                    'string',
                    'unique:stocks',
                ]
            ],
            [
                'cod.unique' => 'Este Codigo já Corresponde a Outro Produto'
            ],
        );

        $data = $request->all();
        $data['unit_value'] = $convertedValue;

        Stock::create($data);

        return redirect()->route('stock');
    }
}
