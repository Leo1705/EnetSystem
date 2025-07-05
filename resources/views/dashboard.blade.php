<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External Fonts (Google Fonts) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
        body { display: flex; height: 100vh; background-color: #f5f7f9; overflow: hidden; color: #333; }
        /* Sidebar Styling */
        .sidebar { width: 240px; background: #fff; height: 100vh; box-shadow: 0 0 10px rgba(0,0,0,0.05); padding: 20px 0; position: fixed; left: 0; top: 0; }
        .logo-container { display: flex; align-items: center; padding: 0 20px 20px; border-bottom: 1px solid #f0f0f0; margin-bottom: 15px; }
        .logo-image { width: 40px; height: 40px; margin-right: 10px; }
        .nav-menu { list-style: none; padding: 0 10px; flex-grow: 1; }
        .nav-item { margin-bottom: 5px; }
        .nav-link { display: flex; align-items: center; padding: 10px 15px; text-decoration: none; color: #666; border-radius: 8px; transition: 0.3s; }
        .nav-link:hover { background: #f0f7ff; color: #3b82f6; }
        .nav-link.active { background: #3b82f6; color: #fff; }
        .nav-link i { margin-right: 10px; width: 20px; text-align: center; }
        /* Main Content Styling */
        .main-content { margin-left: 240px; width: calc(100% - 240px - 280px); padding: 20px; overflow-y: auto; height: 100vh; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .page-title { font-size: 24px; font-weight: 600; }
        .search-container { position: relative; width: 300px; }
        .search-input { width: 100%; padding: 10px 15px 10px 40px; border: 1px solid #e0e0e0; border-radius: 8px; }
        .search-icon { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #999; }
        .card { background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 20px; margin-bottom: 20px; }
        .card-title { font-size: 18px; font-weight: 600; margin-bottom: 15px; }
        .announcement-card { background: #f0f7ff; padding: 15px 20px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; }
        .announcement-text { font-size: 14px; color: #333; }
        .announcement-btn { background: #3b82f6; color: #fff; border: none; padding: 6px 15px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 500; }
        .children-container { display: grid; grid-template-columns: repeat(2,1fr); gap: 15px; }
        .child-card { padding: 15px; border-radius: 8px; display: flex; align-items: center; }
        .child-card.green { background: #e6f7ee; }
        .child-card.pink { background: #fce7e7; }
        .child-card.blue { background: #e6f0ff; }
        .child-card.yellow { background: #fff8e6; }
        .child-avatar { width: 40px; height: 40px; border-radius: 50%; margin-right: 15px; object-fit: cover; }
        .child-name { font-weight: 600; font-size: 14px; }
        .child-grade { font-size: 12px; color: #666; }
        .progress-container { margin-top: 10px; }
        .progress-item { margin-bottom: 15px; }
        .progress-header { display: flex; justify-content: space-between; margin-bottom: 5px; }
        .progress-bar { height: 8px; background: #e0e0e0; border-radius: 4px; overflow: hidden; }
        .progress-fill { height: 100%; background: #3b82f6; border-radius: 4px; }
        .assignment-table { width: 100%; border-collapse: collapse; }
        .assignment-table th, .assignment-table td { padding: 12px 10px; font-size: 14px; border-bottom: 1px solid #f0f0f0; }
        .assignment-status { padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 500; }
        .status-pending { background: #fff0e0; color: #ff9800; }
        .status-completed { background: #e6f7ee; color: #00c853; }
        .right-sidebar { width: 280px; background: #fff; height: 100vh; position: fixed; right: 0; top: 0; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow-y: auto; }
        .user-profile { display: flex; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; }
        .user-avatar { width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; }
        .user-name { font-weight: 600; font-size: 14px; }
        .user-role { font-size: 12px; color: #666; }
        .calendar-grid, .schedule-list, .events-container { margin-top: 20px; }
        .calendar-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 4px;
  align-items: start;
}

/* Weekday headers */
.calendar-day-header {
  text-align: center;
  font-weight: 600;
  padding: 6px 0;
  background: #f0f0f0;
  border-radius: 4px;
  font-size: 0.85rem;
  color: #555;
}

/* Day cells */
.calendar-day {
  width: 100%;
  padding: 10px 0;
  text-align: center;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.2s;
  background: #fff;
  border: 1px solid #e0e0e0;
  font-size: 0.9rem;
  color: #333;
}

/* Blank (padding) slots */
.calendar-day.empty {
  background: transparent;
  border: none;
  cursor: default;
}

/* Hover effect */
.calendar-day:not(.empty):hover {
  background: #e8f1ff;
}

/* Today */
.calendar-day.active {
  background: #3b82f6;
  color: #fff;
  font-weight: 600;
  border-color: #3b82f6;
}

/* Weekends */
.calendar-day.weekend {
  color: #d00;
}
/* --- Card Header --- */
.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
}
.card-header .see-all {
  font-size: 0.9rem;
  color: #3b82f6;
  text-decoration: none;
  transition: opacity .2s;
}
.card-header .see-all:hover {
  opacity: .7;
}

/* --- Schedule --- */
.schedule-list,
.event-list {
  list-style: none;
  padding: 0;
  margin: 0 -20px; /* offset card padding */
}
.schedule-item,
.event-item {
  display: flex;
  align-items: center;
  padding: 12px 20px;
  border-top: 1px solid #f0f0f0;
  transition: background .2s;
}
.schedule-item:first-child,
.event-item:first-child {
  border-top: none;
}
.schedule-item:hover {
  background: #f9faff;
}
.schedule-number {
  flex-shrink: 0;
  width: 32px; height: 32px;
  background: #e0e7ff;
  color: #3b82f6;
  font-weight: 600; font-size: .9rem;
  border-radius: 6px;
  display: flex; align-items: center; justify-content: center;
  margin-right: 14px;
}
.schedule-info { flex: 1; }
.schedule-subject { font-weight: 500; margin-bottom: 4px; }
.schedule-details { font-size: .85rem; color: #666; }
.schedule-details span + span { margin-left: 12px; }

/* --- Events --- */
.event-icon {
  flex-shrink: 0;
  width: 36px; height: 36px;
  background: #eef6ff;
  color: #3b82f6;
  font-size: 1.2rem;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  margin-right: 12px;
}
.event-info { flex: 1; }
.event-title { font-weight: 500; margin-bottom: 2px; }
.event-time { font-size: .85rem; color: #666; }

/* --- Fallback “no data” --- */
.no-data {
  padding: 16px 20px;
  text-align: center;
  color: #999;
  font-style: italic;
}

    </style>
</head>
<body>
    <!-- Left Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('EnetLogo.png') }}" alt="Logo" class="logo-image">
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="fas fa-th-large"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('attendance.index') }}" class="nav-link">
                    <i class="far fa-calendar"></i><span class="nav-text">Calendar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('people-management') }}" class="nav-link">
                    <i class="fas fa-book"></i><span class="nav-text">People Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('courses') }}" class="nav-link">
                    <i class="fas fa-chalkboard"></i><span class="nav-text">Courses</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('course-details') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i><span class="nav-text">Course Details</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('course-group') }}" class="nav-link">
                    <i class="far fa-comment-alt"></i><span class="nav-text">Course Group</span>
                </a>
            </li>
            <div class="nav-divider"></div>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-question-circle"></i><span class="nav-text">Help</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i><span class="nav-text">Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i><span class="nav-text">Log Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="page-title">Dashboard</h1>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search">
            </div>
        </div>

        <!-- Announcement Section -->
        <div class="card">
            <h2 class="card-title">Announcement</h2>
            <div class="announcement-card">
                @if($announcement)
                    <p class="announcement-text">{{ $announcement->text }}</p>
                @else
                    <p class="announcement-text">No announcements at this time.</p>
                @endif
                <button class="announcement-btn">Join</button>
            </div>
        </div>

        <!-- Children & Progress Section -->
        <div class="card-container" style="display:flex; gap:20px;">
            <!-- My Children -->
            <div class="card" style="flex:1;">
                <h2 class="card-title">My Children</h2>
                <div class="children-container">
                    @foreach($children as $child)
                        <div class="child-card {{ $child->grade_color ?? 'green' }}">
                            @if($child->avatar_url)
                                <img src="{{ asset($child->avatar_url) }}" alt="{{ $child->name }}" class="child-avatar">
                            @endif
                            <div class="child-info">
                                <h3 class="child-name">{{ $child->name }}</h3>
                                <p class="child-grade">{{ $child->grade }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Completion Progress -->
            <div class="card" style="flex:1;">
                <h2 class="card-title">Completion Progress</h2>
                <div class="progress-container">
                    @foreach($progress as $item)
                        <div class="progress-item">
                            <div class="progress-header">
                                <span class="progress-title">
  {{ $item->course?->title ?? '—' }}
</span>

                                <span class="progress-chapter">{{ round($item->percent_complete) }}%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $item->percent_complete }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Assignments Section -->
        <div class="card">
            <h2 class="card-title">Assignments</h2>
            <table class="assignment-table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Type</th>
                        <th>Due</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $a)
                        <tr>
                            <td>{{ $a->course?->title ?? '—' }}</td>
                            <td>{{ ucfirst($a->status) }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->due_at)->format('M j, Y g:i A') }}</td>
                            <td>
                                <span class="assignment-status status-{{ $a->status }}">
                                    {{ ucfirst($a->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="right-sidebar">
        <div class="user-profile">
            <img src="/placeholder.svg?height=40&width=40" alt="User Avatar" class="user-avatar">
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
            </div>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </div>

        <!-- Mini-Calendar -->
        <!-- Calendar Section -->
<div class="calendar-section">
  <div class="schedule-header" style="align-items:center; gap:10px;">
    <h3 class="calendar-title" id="monthYear">Month Year</h3>
    <div class="calendar-nav">
      <button id="prevMonth" class="calendar-nav-btn"><i class="fas fa-chevron-left"></i></button>
      <button id="nextMonth" class="calendar-nav-btn"><i class="fas fa-chevron-right"></i></button>
    </div>
  </div>

  <div class="calendar-grid" id="calendarGrid">
   <script>
  (function(){
    const monthNames = [
      'January','February','March','April',
      'May','June','July','August',
      'September','October','November','December'
    ];

    let today      = new Date();
    let viewYear   = today.getFullYear();
    let viewMonth  = today.getMonth(); // 0–11

    const monthYearEl  = document.getElementById('monthYear');
    const gridEl       = document.getElementById('calendarGrid');
    const prevBtn      = document.getElementById('prevMonth');
    const nextBtn      = document.getElementById('nextMonth');

    function renderCalendar(y, m) {
      // Header
      monthYearEl.textContent = `${monthNames[m]} ${y}`;

      // clear old
      gridEl.innerHTML = '';

      // 1) Weekday headers
      ['Mo','Tu','We','Th','Fr','Sa','Su']
        .forEach(wd => {
          const hd = document.createElement('div');
          hd.className = 'calendar-day-header';
          hd.textContent = wd;
          gridEl.appendChild(hd);
        });

      // 2) blanks until 1st
      const first = new Date(y, m, 1);
      // JS: Sunday=0, Monday=1 ... Saturday=6
      // we want ISO: Mon=1...Sun=7
      let startIso = first.getDay() === 0 ? 7 : first.getDay();
      for(let i=1; i<startIso; i++){
        const empty = document.createElement('div');
        empty.className = 'calendar-day empty';
        gridEl.appendChild(empty);
      }

      // 3) numbered days
      const daysInMonth = new Date(y, m+1, 0).getDate();
      for(let d=1; d<=daysInMonth; d++){
        const dt = new Date(y, m, d);
        const iso = dt.getDay()===0?7:dt.getDay();
        const cell = document.createElement('div');
        cell.className = 'calendar-day';
        if(d === today.getDate() &&
           m === today.getMonth() &&
           y === today.getFullYear()) {
          cell.classList.add('active');
        }
        if(iso >= 6) {
          cell.classList.add('weekend');
        }
        cell.textContent = d;
        gridEl.appendChild(cell);
      }
    }

    prevBtn.addEventListener('click', ()=> {
      viewMonth--;
      if(viewMonth < 0) { viewMonth = 11; viewYear--; }
      renderCalendar(viewYear, viewMonth);
    });

    nextBtn.addEventListener('click', ()=> {
      viewMonth++;
      if(viewMonth > 11) { viewMonth = 0; viewYear++; }
      renderCalendar(viewYear, viewMonth);
    });

    // init
    renderCalendar(viewYear, viewMonth);
  })();
</script>

  </div>
</div>

            @php
    // 1) Grab first day-of-week (ISO: 1=Mon, 7=Sun) and days in month
    $firstOfMonth   = \Carbon\Carbon::now()->startOfMonth();
    $startWeekday   = $firstOfMonth->dayOfWeekIso; 
    $daysInMonth    = $firstOfMonth->daysInMonth;
    $today          = \Carbon\Carbon::now()->day;
@endphp

<!-- Schedule Card -->
    <div class="card schedule-card">
      <div class="card-header">
        <h2 class="card-title">Schedule</h2>
        <a href="#" class="see-all">See all</a>
      </div>
      <ul class="schedule-list">
        @forelse($scheduleItems ?? [] as $item)
          <li class="schedule-item">
            <div class="schedule-number">{{ $item->slot }}</div>
            <div class="schedule-info">
              <div class="schedule-subject">{{ $item->subject }}</div>
              <div class="schedule-details">
                <span class="schedule-students">
                  {{ $item->attended }} of {{ $item->capacity }} students
                </span>
                <span class="schedule-time">
                  {{ \Carbon\Carbon::parse($item->start)->format('H:i') }}
                  –
                  {{ \Carbon\Carbon::parse($item->end)->format('H:i') }}
                </span>
              </div>
            </div>
          </li>
        @empty
          <li class="no-data">No scheduled classes today.</li>
        @endforelse
      </ul>
    </div>

    <!-- Upcoming Events Card -->
    <div class="card events-card">
      <div class="card-header">
        <h2 class="card-title">Upcoming Events</h2>
        <a href="#" class="see-all">See all</a>
      </div>
      <ul class="event-list">
        @forelse($upcomingEvents ?? [] as $event)
          <li class="event-item">
            <div class="event-icon"><i class="{{ $event->icon }}"></i></div>
            <div class="event-info">
              <div class="event-title">{{ $event->title }}</div>
              <div class="event-time">{{ $event->when }}</div>
            </div>
          </li>
        @empty
          <li class="no-data">No events coming up.</li>
        @endforelse
      </ul>
    </div>


</div>

     
    </div>
</body>
</html>
