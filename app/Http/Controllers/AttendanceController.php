<?php

namespace App\Http\Controllers;
use App\Models\Schedule; 
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function events()
{
  return Schedule::where('user_id',auth()->id())
    ->get(['id','subject as title','date as start','color']);
}

  public function index(Request $request)
    {
        $user        = Auth::user();
        $year        = $request->query('year', now()->year);
        $month       = $request->query('month', now()->month);
        $currentDate = $request->query('date', now()->toDateString());

        // set up our month window
        $viewStart = Carbon::create($year, $month, 1);
        $viewEnd   = $viewStart->copy()->endOfMonth();

        // 1) one‑off events in this month
        $baseEvents = Schedule::where('user_id', $user->id)
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        // 2) recurring rules for this user
        $recurrences = Schedule::where('user_id', $user->id)
            ->whereNotNull('recurrence')
            ->get();

        // 3) build full list (one‑offs + generated recurrences)
        $all = $baseEvents->toArray();
        foreach ($recurrences as $e) {
            $start = Carbon::parse($e->date);
            switch ($e->recurrence) {
                case 'daily':
                    for ($d = $start->copy(); $d->lte($viewEnd); $d->addDay()) {
                        if ($d->month == $viewStart->month) {
                            $all[] = array_merge($e->toArray(), ['date' => $d->toDateString()]);
                        }
                    }
                    break;
                case 'weekly':
                    for ($d = $start->copy(); $d->lte($viewEnd); $d->addWeek()) {
                        if ($d->month == $viewStart->month) {
                            $all[] = array_merge($e->toArray(), ['date' => $d->toDateString()]);
                        }
                    }
                    break;
                case 'monthly':
                    for ($d = $start->copy(); $d->lte($viewEnd); $d->addMonth()) {
                        if ($d->month == $viewStart->month) {
                            $all[] = array_merge($e->toArray(), ['date' => $d->toDateString()]);
                        }
                    }
                    break;
            }
        }

        // 4) rehydrate as objects with Carbon date() property
        $events = collect($all)->map(function ($raw) {
            $raw['date'] = Carbon::parse($raw['date']);
            return (object) $raw;
        });

        // 5) filter out today’s (or clicked day’s) events
        $dayEvents = $events->filter(fn($e) => $e->date->toDateString() === $currentDate);

        return view('attendance', compact(
            'year', 'month', 'currentDate', 'events', 'dayEvents'
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
            'recurrence'  => 'nullable|in:daily,weekly,monthly',
        ]);

        $allDay = $request->boolean('all_day', false);
        $start  = Carbon::parse($data['date']);
        if (! $allDay && $request->filled('time')) {
            $start->setTimeFromTimeString($data['time']);
        } else {
            $start->setTime(0,0);
        }

        Schedule::create([
            'user_id'     => Auth::id(),               // ← must include
            'subject'     => $data['title'],
            'description' => $data['description'] ?? null,
            'color'       => $data['color'],
            'all_day'     => $allDay,
            'date'        => $start->toDateString(),
            'start_time'  => $allDay ? null : $start->format('H:i:s'),
            'end_time'    => null,
            'capacity'    => 0,
            'attended'    => 0,
            'recurrence'  => $data['recurrence'] ?? null,
        ]);

        return redirect()
            ->route('attendance.index', [
                'year'  => $start->year,
                'month' => $start->month,
                'date'  => $start->toDateString(),
            ])
            ->with('success','Event created');
    }
}
