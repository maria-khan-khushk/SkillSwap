<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Show all notifications
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $notifications = $user->notifications()
            ->latest()
            ->get();

        return view('notifications.index', compact('notifications'));
    }


    // Mark one notification as read
    public function markAsRead($id)
    {
        /** @var User $user */
        $user = Auth::user();

        $notification = $user->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        return back();
    }


    // Mark all notifications as read
    public function markAllAsRead()
    {
        /** @var User $user */
        $user = Auth::user();

        $user->unreadNotifications->markAsRead();

        return back();
    }
}