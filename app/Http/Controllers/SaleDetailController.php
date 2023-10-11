<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index()
    {
        $saleDetails = SaleDetail::all();
        return response()->json($saleDetails);
    }
    public function bySale(Sale $sale)
    {
        return Sale::with('saleDetails')
            ->where('id', $sale->id)
            ->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'sale_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'product_name' => 'required'
        ]);

        $saleDetail = new SaleDetail;
        $saleDetail->product_id = $request->product_id;
        $saleDetail->sale_id = $request->sale_id;
        $saleDetail->price = $request->price;
        $saleDetail->qty = $request->qty;
        $saleDetail->product_name = $request->product_name;

        $saleDetail->save();
        return response()->json([
            "message" => "Sale Detail created",
        ], 201);
    }
    public function show($id)
    {
        $saleDetail = SaleDetail::find($id);
        if ($saleDetail != null) {
            return response()->json($saleDetail);
        } else {
            return response()->json([
                "message" => "Sale Detail not found",
            ], 404);
        }
    }
    public function destroy($id)
    {
        if (SaleDetail::where('id', $id)->exists()) {
            $saleDetail = SaleDetail::find($id);
            $saleDetail->delete();

            return response()->json([
                "message" => "Sale Detail deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Sale Detail not found",
            ], 404);
        }
    }
}
