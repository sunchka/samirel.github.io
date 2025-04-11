<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $productsQ = Product::with('tags');

        if (!empty($categoryId = $request->input('category_id'))) {
            $productsQ->whereHas('categories', fn ($q) => $q->where('categories.id', $categoryId));
        }

        $products = $productsQ->get();
        $categories = Category::all();

        return view('product.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
