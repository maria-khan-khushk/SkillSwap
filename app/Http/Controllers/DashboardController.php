<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
public function index()
{
    $chartData = Category::withCount('skills')->get();

    $totalCategories = Category::count();

    $totalSkills = Skill::count();

    $totalUsers = User::count();

    $latestSkills = Skill::with('category')
        ->latest()
        ->take(5)
        ->get();

    $mySkills = Skill::with('category')
        ->where('user_id', Auth::id())
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalCategories',
        'totalSkills',
        'totalUsers',
        'latestSkills',
        'chartData',
        'mySkills'
    ));
}
}