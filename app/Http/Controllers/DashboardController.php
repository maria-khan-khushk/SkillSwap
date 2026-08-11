<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use App\Models\SkillRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Existing Dashboard Data
        |--------------------------------------------------------------------------
        */

        $chartData = Category::withCount('skills')->get();

        $totalCategories = Category::count();

        $totalSkills = Skill::count();

        $totalUsers = User::count();


        /*
        |--------------------------------------------------------------------------
        | Latest Skills
        |--------------------------------------------------------------------------
        */

        $latestSkills = Skill::with('category')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Current User's Skills
        |--------------------------------------------------------------------------
        */

        $mySkills = Skill::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Skill Request Statistics
        |--------------------------------------------------------------------------
        */

        // Requests sent by current user
        $sentRequests = SkillRequest::where(
            'sender_id',
            Auth::id()
        )->count();


        // Requests received by current user
        $receivedRequests = SkillRequest::where(
            'receiver_id',
            Auth::id()
        )->count();


        // Pending requests received by current user
        $pendingRequests = SkillRequest::where(
            'receiver_id',
            Auth::id()
        )
        ->where('status', 'pending')
        ->count();


        // Accepted requests involving current user
        $acceptedRequests = SkillRequest::where(function ($query) {

            $query->where('sender_id', Auth::id())
                  ->orWhere('receiver_id', Auth::id());

        })
        ->where('status', 'accepted')
        ->count();


        /*
        |--------------------------------------------------------------------------
        | Return Dashboard View
        |--------------------------------------------------------------------------
        */

        return view('dashboard', compact(

            'totalCategories',

            'totalSkills',

            'totalUsers',

            'latestSkills',

            'chartData',

            'mySkills',

            'sentRequests',

            'receivedRequests',

            'pendingRequests',

            'acceptedRequests'

        ));
    }
}