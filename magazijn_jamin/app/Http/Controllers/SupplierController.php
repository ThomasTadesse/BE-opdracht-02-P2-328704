<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Arr;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $leverancier)
    {
        $products = DB::table('productperleverancier')
            ->join('product', 'productperleverancier.ProductId', '=', 'product.ProductId')
            ->where('productperleverancier.LeverancierId', $leverancier->LeverancierId)
            ->select('product.*', 'productperleverancier.DatumLevering', 'productperleverancier.Aantal')
            ->orderBy('Aantal', 'desc')
            ->get();

        return view('suppliers.show', compact('leverancier', 'products'));
    }

    public function store(Request $request)
    {
        $supplier = Supplier::create($request->all());
        return response()->json($supplier, 201);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        return response()->json($supplier, 200);
    }
}
