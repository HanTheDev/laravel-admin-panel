<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Instantiate a new controller instance.
     * Apply the 'auth' middleware to all methods in this controller.
     */
    public function __construct()
    {$this->middleware('auth');
    }

    // Display a listing of categories
    public function index()
    {$categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category in storage
    public function store(Request$request)
    {$request->validate(['name' => 'required']);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success','Category created successfully.');
    }

    // Display the specified category
    public function show(Category$category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified category
    public function edit(Category$category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update the specified category in storage
    public function update(Request$request, Category$category)
    {$request->validate(['name' => 'required']);$category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated successfully.');
    }

    // Remove the specified category from storage
    public function destroy(Category$category)
    {$category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully.');
    }
}
