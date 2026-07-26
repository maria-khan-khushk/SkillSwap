<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;

class SkillController extends Controller
{
   public function index(Request $request)
{
    // Sab categories dropdown ke liye
    $categories = Category::orderBy('name')->get();

    // Base query
    $query = Skill::with('category');

    // Search
    if ($request->filled('search')) {

        $query->where('title', 'LIKE', '%' . $request->search . '%');

    }

    // Category Filter
    if ($request->filled('category')) {

        $query->where('category_id', $request->category);

    }

    // Pagination
    $skills = $query->latest()->paginate(6);

    // Search aur filter ko pagination ke sath maintain rakhega
    $skills->appends($request->query());

    return view('skills.index', compact(
        'skills',
        'categories'
    ));
}

public function create()
{
    $categories = Category::orderBy('name')->get();

    return view('skills.create', compact('categories'));
}
public function store(Request $request)
{
    $request->validate([

        'category_id' => 'required|exists:categories,id',

        'title' => 'required|max:100',

        'description' => 'nullable|max:500',

        'experience_level' => 'required',

        'created_by' => 'required|max:100',

    ]);

    Skill::create([

        'category_id' => $request->category_id,

        'title' => $request->title,

        'description' => $request->description,

        'experience_level' => $request->experience_level,

        'created_by' => $request->created_by,

    ]);

    return redirect()
            ->route('skills.index')
            ->with('success', 'Skill added successfully!');
}

public function edit(Skill $skill)
{
    $categories = Category::orderBy('name')->get();

    return view('skills.edit', compact('skill', 'categories'));
}
public function update(Request $request, Skill $skill)
{
    $request->validate([

        'category_id' => 'required|exists:categories,id',

        'title' => 'required|max:100',

        'description' => 'nullable|max:500',

        'experience_level' => 'required',

        'created_by' => 'required|max:100'

    ]);

    $skill->update([

        'category_id' => $request->category_id,

        'title' => $request->title,

        'description' => $request->description,

        'experience_level' => $request->experience_level,

        'created_by' => $request->created_by

    ]);

    return redirect()
            ->route('skills.index')
            ->with('success', 'Skill updated successfully!');
}
public function destroy(Skill $skill)
{
    $skill->delete();

    return redirect()
            ->route('skills.index')
            ->with('success', 'Skill deleted successfully!');
}
}