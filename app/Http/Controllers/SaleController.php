<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return response()->json($sales);
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'total_amount' => 'required'
        ]);

        $sale = new Sale;
        $sale->date = $request->date;
        $sale->total_amount = $request->total_amount;
        $sale->save();

        return response()->json([
            "message" => "Sale created",
        ], 201);
    }
    public function show($id)
    {
        $sale = Sale::find($id);
        if ($sale != null) {
            return response()->json($sale);
        } else {
            return response()->json([
                "message" => "Sale not found",
            ], 404);
        }
    }
    public function destroy($id)
    {
        if (Sale::where('id', $id)->exists()) {
            $sale = Sale::find($id);
            $sale->delete();

            return response()->json([
                "message" => "Sale deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Sale not found",
            ], 404);
        }
    }
}
