<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use App\Models\SkillRequest;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Total registered users
        $totalUsers = User::count();

        // Total skills added
        $totalSkills = Skill::count();

        // Total skill categories
        $totalCategories = Category::count();

        // Total skill requests
        $totalRequests = SkillRequest::count();

        return view('home', compact(
            'totalUsers',
            'totalSkills',
            'totalCategories',
            'totalRequests'
        ));
    }
}