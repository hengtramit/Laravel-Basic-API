<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function byCategory(Category $category)
    {
        return Category::with('products')
            ->where('id', $category->id)
            ->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'cost' => 'required',
            'category_id' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->cost = $request->cost;
        $product->category_id = $request->category_id;
        $product->save();

        return response()->json([
            "message" => "Product created",
        ], 201);
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            return response()->json($product);
        } else {
            return response()->json([
                "message" => "Product not found",
            ], 404);
        }
    }
    public function destroy($id)
    {
        if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                "message" => "Product deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Product not found",
            ], 404);
        }
    }
}
