<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // My Children
        $children = $user->children;

        // Completion Progress
        $progress = $user->progress()->with('course')->get();

        // Announcement
        $announcement = Announcement::active()->latest()->first();

        // Assignments: if teacher, get assignments on their courses;
        // otherwise get assignments for groups the user belongs to.
        if ($user->role === 'teacher') {
            $courseIds = $user->courses->pluck('id');
            $assignments = Assignment::whereIn('course_id', $courseIds)
                                     ->with('course')
                                     ->get();
        } else {
            $groupIds = $user->groups->pluck('id');
            $assignments = Assignment::whereIn('group_id', $groupIds)
                                     ->with('course')
                                     ->get();
        }

        return view('dashboard', compact(
            'children',
            'progress',
            'assignments',
            'announcement'
        ));
    }
}
