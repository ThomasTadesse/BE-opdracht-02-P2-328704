<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPerSupplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductPerSupplierController extends Controller
{
    public function index()
    {
        return ProductPerSupplier::all();
    }

    public function show($id)
    {
        return ProductPerSupplier::findOrFail($id);
    }

    public function store(Request $request)
    {
        $productPerSupplier = ProductPerSupplier::create($request->all());
        return response()->json($productPerSupplier, 201);
    }

    public function update(Request $request, $id)
    {
        $productPerSupplier = ProductPerSupplier::findOrFail($id);
        $productPerSupplier->update($request->all());
        return response()->json($productPerSupplier, 200);
    }

    public function destroy($id)
    {
        ProductPerSupplier::destroy($id);
        return response()->json(null, 204);
    }
}
