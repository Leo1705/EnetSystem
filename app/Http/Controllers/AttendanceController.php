<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
{
    $user        = Auth::user();
    $year        = $request->query('year',  now()->year);
    $month       = $request->query('month', now()->month);
    $currentDate = $request->query('date',  now()->toDateString());

    // 1) all events for that month
    $events = Event::where('user_id', $user->id)
                   ->whereYear('start_at', $year)
                   ->whereMonth('start_at', $month)
                   ->get();

    // 2) only the “current” date’s events
    $dayEvents = $events
      ->filter(fn($e) => $e->start_at->toDateString() === $currentDate);

    return view('attendance', compact(
      'year','month','currentDate','events','dayEvents'
    ));
}


    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'time'        => 'nullable|date_format:H:i',
            'description' => 'nullable|string',
            'color'       => 'required|in:blue,pink,green,yellow,purple',
            'all_day'     => 'sometimes|boolean',
        ]);

        $allDay = $request->boolean('all_day', false);
        $start  = Carbon::parse($data['date']);

        if (! $allDay && $request->filled('time')) {
            $start->setTimeFromTimeString($data['time']);
        } else {
            $start->setTime(0,0);
        }

        Event::create([
            'user_id'     => Auth::id(),
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'color'       => $data['color'],
            'all_day'     => $allDay,
            'start_at'    => $start,
            // satisfy the old NOT NULL `date`/`time` columns if you still have them:
            'date'        => $start->toDateString(),
            'time'        => $allDay ? null : $start->format('H:i:s'),
        ]);

        return redirect()
            ->route('attendance.index', [
                'year'  => $start->year,
                'month' => $start->month,
            ])
            ->with('success','Event created');
    }
}
