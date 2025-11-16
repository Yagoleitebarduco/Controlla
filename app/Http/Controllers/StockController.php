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
        $totalProducts = Stock::count();
        $addedValue = Stock::sum('unit_value');
        $belowMinimun = Stock::whereColumn('max_stock', '<', 'min_stock')->count();
        return view('admin.estoque.estoque', compact('products', 'totalProducts', 'addedValue', 'belowMinimun'));
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

    public function showToEditStock(Stock $product)
    {
        $categories = Category::where('type_category', 2)->get();
        return view('admin.estoque.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Stock $product)
    {
        $formatterValue = $request->input('unit_value');
        $valueThousands = str_replace('.', '', $formatterValue);
        $finalValue = str_replace(',', '.', $valueThousands);
        $convertedValue = (float) $finalValue;

        $data = $request->all();
        $data['unit_value'] = $convertedValue;

        $product->update($data);
        return redirect()->route('stock');
    }

    public function destroy(Stock $product)
    {
        $product->delete();
        return redirect()->route('stock');   
    }
}
