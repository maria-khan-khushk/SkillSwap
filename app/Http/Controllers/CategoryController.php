<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    // Show Add Form
    public function create()
    {
        return view('categories.create');
    }

    // Save Data
public function store(Request $request)
{
    // Validate Form Data
    $request->validate([
        'name' => 'required|max:100',
        'description' => 'nullable'
    ]);

    // Save Data
    Category::create([
        'name' => $request->name,
        'description' => $request->description
    ]);

    // Redirect with Success Message
    return redirect('/categories')
        ->with('success', 'Category added successfully!');
}
public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|max:100',
        'description' => 'nullable'
    ]);

    $category->update([
        'name' => $request->name,
        'description' => $request->description
    ]);

    return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully!');
}
public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('categories.index')
        ->with('success', 'Category deleted successfully!');
}
}