<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Assignment;
use App\Models\Schedule;  // ← your schedule model
use App\Models\Event;     // ← your event model

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1) My Children
        $children = $user->children()->get();

        // 2) Completion Progress
        $progress = $user->progress()->with('course')->get();

        // 3) Active Announcement
        $announcement = Announcement::active()->latest()->first();

        // 4) Assignments
        $assignments = Assignment::where('user_id', $user->id)
                                 ->with('course')
                                 ->get();

        // 5) Today’s Schedule — adjust the scope to match your schema
        $scheduleItems = Schedule::whereDate('date', today())
                                 ->orderBy('slot')
                                 ->get();

        // 6) Next 5 Upcoming Events
        $upcomingEvents = Event::where('start_at', '>=', now())
                               ->orderBy('start_at')
                               ->limit(5)
                               ->get();

        return view('dashboard', compact(
            'children',
            'progress',
            'announcement',
            'assignments',
            'scheduleItems',
            'upcomingEvents'
        ));
    }
}
