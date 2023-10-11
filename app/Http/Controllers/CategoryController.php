<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return response()->json([
            "message" => "Category created",
        ], 201);
    }
    public function show($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            return response()->json($category);
        } else {
            return response()->json([
                "message" => "Category not found",
            ], 404);
        }
    }
    public function destroy($id)
    {
        if (Category::where('id', $id)->exists()) {
            $category = Category::find($id);
            $category->delete();

            return response()->json([
                "message" => "Category deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Category not found",
            ], 404);
        }
    }
}
