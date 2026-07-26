<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSkills = Skill::count();

        $totalCategories = Category::count();

        $beginnerSkills = Skill::where(
            'experience_level',
            'Beginner'
        )->count();

        $advancedSkills = Skill::where(
            'experience_level',
            'Advanced'
        )->count();

        $recentSkills = Skill::with('category')
                            ->latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact(

            'totalSkills',

            'totalCategories',

            'beginnerSkills',

            'advancedSkills',

            'recentSkills'

        ));
    }
}