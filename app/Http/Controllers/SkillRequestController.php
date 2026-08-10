<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillRequestController extends Controller
{
    // Show requests received by logged-in user
    public function index()
    {
        $requests = SkillRequest::with(['sender', 'skill'])
            ->where('receiver_id', Auth::id())
            ->latest()
            ->get();

        return view('requests.index', compact('requests'));
    }


    // Show requests sent by logged-in user
    public function myRequests()
    {
        $requests = SkillRequest::with(['receiver', 'skill'])
            ->where('sender_id', Auth::id())
            ->latest()
            ->get();

        return view('requests.my-requests', compact('requests'));
    }


    // Send request for a skill
    public function store(Request $request, Skill $skill)
    {
        // Prevent requesting your own skill
        if ($skill->user_id == Auth::id()) {

            return back()->with(
                'error',
                'You cannot request your own skill.'
            );
        }


        // Prevent duplicate pending request
        $exists = SkillRequest::where('sender_id', Auth::id())
            ->where('skill_id', $skill->id)
            ->where('status', 'pending')
            ->exists();


        if ($exists) {

            return back()->with(
                'error',
                'You have already sent a request for this skill.'
            );
        }


        SkillRequest::create([

            'sender_id'   => Auth::id(),

            'receiver_id' => $skill->user_id,

            'skill_id'    => $skill->id,

            'message'     => $request->message,

            'status'      => 'pending',

        ]);


        return back()->with(
            'success',
            'Skill request sent successfully.'
        );
    }


    // Accept request
    public function accept(SkillRequest $skillRequest)
    {
        // Make sure only the receiver can accept the request
        if ($skillRequest->receiver_id != Auth::id()) {

            abort(403, 'Unauthorized action.');

        }


        // Only pending requests can be accepted
        if ($skillRequest->status !== 'pending') {

            return back()->with(
                'error',
                'This request has already been processed.'
            );
        }


        $skillRequest->update([

            'status' => 'accepted'

        ]);


        return back()->with(
            'success',
            'Request accepted successfully.'
        );
    }


    // Reject request
    public function reject(SkillRequest $skillRequest)
    {
        // Make sure only the receiver can reject the request
        if ($skillRequest->receiver_id != Auth::id()) {

            abort(403, 'Unauthorized action.');

        }


        // Only pending requests can be rejected
        if ($skillRequest->status !== 'pending') {

            return back()->with(
                'error',
                'This request has already been processed.'
            );
        }


        $skillRequest->update([

            'status' => 'rejected'

        ]);


        return back()->with(
            'success',
            'Request rejected successfully.'
        );
    }
}