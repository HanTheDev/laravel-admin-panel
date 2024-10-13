<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Instantiate a new controller instance.
     * Apply the 'auth' middleware to all methods in this controller.
     */
    public function __construct()
    {$this->middleware('auth');
    }

    // Display a listing of products
    public function index(Request$request)
    {$search =$request->input('search');$products = Product::with('category')
            ->when($search, function($query,$search){
                return$query->where('name', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->get();
        return view('products.index', compact('products', 'search'));
    }

    // Show the form for creating a new product
    public function create()
    {$categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Store a newly created product in storage
    public function store(Request$request)
    {$request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    // Display the specified product
    public function show(Product$product)
    {$product->load('category');
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product
    public function edit(Product$product)
    {$categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update the specified product in storage
    public function update(Request$request, Product$product)
    {$request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);$product->update($request->all());
        return redirect()->route('products.index')->with('success','Product updated successfully.');
    }

    // Remove the specified product from storage
    public function destroy(Product$product)
    {$product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully.');
    }
}
