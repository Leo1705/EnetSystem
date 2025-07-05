<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #e6eef1;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #fff;
            border-radius: 0 15px 15px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 10;
            border: 1px solid #cad6de;
            display: flex;
            flex-direction: column;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 15px;
        }

        .logo-title {
            font-size: 12px;
            font-weight: 500;
            color: #666;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .logo-img {
            height: 60px;
            width: auto;
        }

        .nav-menu {
            list-style: none;
            padding: 0 15px;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
            color: #4a5568;
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: #f0f7ff;
            color: #3b82f6;
        }

        .nav-link.active {
            background-color: #e6eeff;
            color: #3b82f6;
        }

        .nav-icon {
            color: #3b82f6;
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .nav-text {
            font-size: 14px;
        }

        .nav-divider {
            height: 1px;
            background-color: #f0f0f0;
            margin: 15px 0;
        }

        /* Main Content */
        .main-content {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .search-container {
            position: relative;
            margin-right: 15px;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            background-color: white;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .notification-icons {
            display: flex;
            gap: 15px;
            margin-right: 20px;
        }

        .notification-badge {
            position: relative;
            color: #666;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #e74c3c;
            color: white;
            font-size: 10px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 5px 10px;
            border-radius: 50px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .user-role {
            font-size: 12px;
            color: #666;
        }

        /* Calendar Container */
        .calendar-container {
            display: flex;
            gap: 20px;
        }

        .calendar-main {
            flex: 1;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-title {
            font-size: 20px;
            font-weight: 600;
        }

        .calendar-actions {
            display: flex;
            align-items: center;
        }

        .view-buttons {
            display: flex;
            gap: 4px;
            margin-right: 5px;
        }

        .view-btn {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #4a5568;
            transition: all 0.2s;
        }

        .view-btn:hover {
            background-color: #f0f7ff;
        }

        .view-btn.active {
            background-color: #e0e0e0;
            color: #333;
        }

        .new-schedule-btn {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            background-color: white;
            border: 1px solid #e0e0e0;
            cursor: pointer;
            color: #333;
            transition: all 0.2s;
        }

        .new-schedule-btn:hover {
            background-color: #f0f7ff;
        }

        /* Calendar Grid */
        .calendar-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar-grid th {
            padding: 10px;
            text-align: center;
            font-weight: 500;
            color: #666;
            border-bottom: 1px solid #e0e0e0;
        }

        .calendar-grid td {
            height: 100px;
            vertical-align: top;
            border: 1px solid #e0e0e0;
            padding: 5px;
            position: relative;
        }

        .date-number {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .calendar-event {
            position: absolute;
            top: 25px;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
        }

        .calendar-event.blue {
            background-color: #e6eeff;
            color: #3b82f6;
        }

        .calendar-event.pink {
            background-color: #fce7e7;
            color: #e74c3c;
        }

        /* Calendar Sidebar */
        .calendar-sidebar {
            width: 280px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-date {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .time-slot {
            display: flex;
            margin-bottom: 15px;
        }

        .time-label {
            width: 80px;
            font-size: 14px;
            color: #666;
        }

        .time-event {
            flex: 1;
        }

        .event-card {
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .event-card.blue {
            background-color: #e6eeff;
            color: #3b82f6;
        }

        .event-card.gray {
            background-color: #f0f0f0;
            color: #333;
        }

        .time-divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 10px 0;
        }

        .time-marker {
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 12px;
            width: 400px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #666;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            resize: vertical;
            min-height: 80px;
        }

        .color-options {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .color-option {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .color-option.selected {
            border-color: #333;
        }

        .color-blue {
            background-color: #e6eeff;
        }

        .color-pink {
            background-color: #fce7e7;
        }

        .color-green {
            background-color: #e6f7ee;
        }

        .color-yellow {
            background-color: #fff8e6;
        }

        .color-purple {
            background-color: #f0e6ff;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .checkbox-custom {
            width: 18px;
            height: 18px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkbox-input {
            display: none;
        }

        .checkbox-input:checked + .checkbox-custom {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }

        .checkbox-input:checked + .checkbox-custom i {
            display: block;
            color: white;
        }

        .checkbox-custom i {
            display: none;
            font-size: 12px;
        }

        .checkbox-label {
            font-size: 14px;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .submit-btn:hover {
            background-color: #2563eb;
        }

        /* Event Details */
        .event-details {
            background-color: #e6eeff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .event-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .event-datetime {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .event-description {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .event-actions {
            display: flex;
            gap: 10px;
        }

        .event-btn {
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
        }

        .edit-btn {
            background-color: #f0f0f0;
            color: #333;
        }

        .delete-btn {
            background-color: #fce7e7;
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('EnetLogo.png') }}" alt="Logo" class="logo-image" width="200" height="50">
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-th-large"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('attendance.index') }}"class="nav-link active">
                    <i class="far fa-calendar"></i>
                    <span class="nav-text">Calendar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('people-management') }}" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span class="nav-text">Persons Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('courses') }}" class="nav-link">
                    <i class="fas fa-chalkboard"></i>
                    <span class="nav-text">Courses</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('course-details') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <span class="nav-text">Courses Details</span>
                </a>
            </li>
            
            
            <li class="nav-item">
                <a href="{{ route('course-group') }}" class="nav-link">
                    <i class="far fa-comment-alt"></i>
                    <span class="nav-text">Course Group</span>
                </a>
            </li>
            
            <div class="nav-divider"></div>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-question-circle"></i>
                    <span class="nav-text">Help</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span class="nav-text">Setting</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-text">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1 class="page-title">Attendance</h1>
            
            <div class="header-right">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search">
                </div>
                
                <div class="notification-icons">
                    <div class="notification-badge">
                        <i class="far fa-bell"></i>
                        <span class="badge">3</span>
                    </div>
                    <div class="notification-badge">
                        <i class="far fa-envelope"></i>
                        <span class="badge">2</span>
                    </div>
                </div>
                
                <div class="user-profile">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="User Avatar" class="user-avatar">
                    <div class="user-info">
                        <div class="user-name">
                            Swetha shankaresh <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="user-role">Student</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="calendar-container">
            <!-- Main Calendar -->
            @php
    use Carbon\Carbon;
    // determine how many blanks before day 1
    $firstOfMonth = Carbon::create($year, $month, 1);
    $startWeekday = $firstOfMonth->dayOfWeekIso; // 1 (Mon) – 7 (Sun)
    $daysInMonth  = $firstOfMonth->daysInMonth;
    $todayIso     = Carbon::now()->toDateString();
@endphp

<div class="calendar-main">
  <div class="calendar-header">
    <h2 class="calendar-title">
      {{ strtoupper($firstOfMonth->format('F Y')) }}
    </h2>
    <div class="calendar-actions">
      {{-- nav to prev month --}}
      <a href="{{ route('attendance.index', [
            'year'=>$firstOfMonth->copy()->subMonth()->year,
            'month'=>$firstOfMonth->copy()->subMonth()->month,
          ]) }}"
         class="view-btn"><i class="fas fa-chevron-left"></i></a>
      <a href="{{ route('attendance.index', [
            'year'=>$firstOfMonth->copy()->addMonth()->year,
            'month'=>$firstOfMonth->copy()->addMonth()->month,
          ]) }}"
         class="view-btn"><i class="fas fa-chevron-right"></i></a>
      <button class="new-schedule-btn" id="new-event-btn">New schedule</button>
    </div>
  </div>

  <table class="calendar-grid">
    <thead>
      <tr>
      @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $wd)
        <th>{{ $wd }}</th>
      @endforeach
      </tr>
    </thead>
    <tbody>
      @php $day = 1; @endphp

      @for($week=0; $week<6; $week++)
        @if($day > $daysInMonth) @break @endif
        <tr>
          @for($dow=1; $dow<=7; $dow++)
            @if($week===0 && $dow < $startWeekday)
              <td></td>
            @elseif($day > $daysInMonth)
              <td></td>
            @else
              @php
                $dateString = $firstOfMonth->copy()->day($day)->toDateString();
                $cellEvents = $events->filter(fn($e)=> $e->date->toDateString()===$dateString);
              @endphp
              <td>
  <a href="{{ route('attendance.index', [
        'year'       => $year,
        'month'      => $month,
        'date'       => $dateString,
      ]) }}"
     class="cell-link">
    <div class="date-number">{{ $day }}</div>
    {{-- …event dots… --}}
  </a>
</td>

              @php $day++; @endphp
            @endif
          @endfor
        </tr>
      @endfor
    </tbody>
  </table>
</div>

{{-- Right Sidebar --}}
{{-- Right-hand mini-schedule sidebar for the clicked day --}}
<div class="calendar-sidebar">
  <h3 class="sidebar-title">
    Schedules for {{ \Carbon\Carbon::parse($currentDate)->format('F j, l') }}
  </h3>

  @if($dayEvents->isEmpty())
    <p class="no-data">No scheduled classes on this day.</p>
  @else
    @foreach($dayEvents as $e)
      <div class="time-slot">
        <div class="time-label">
          {{ $e->all_day
               ? 'All day'
               : $e->start_at->format('h:i A')
          }}
        </div>
        <div class="time-event">
          <div class="event-card {{ $e->color }}">
            {{ $e->title }}
          </div>
        </div>
      </div>
    @endforeach
  @endif
</div>



{{-- New Event Modal (update your form action + add CSRF!) --}}
<div id="new-event-modal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title">Add New Event</h3>
      <button class="close-btn">&times;</button>
    </div>
    <form method="POST" action="{{ route('attendance.store') }}" id="event-form">
      @csrf

      <input type="hidden" name="date" id="event-date">

      <div class="form-group">
        <label class="form-label" for="event-title">Event Title</label>
        <input type="text" name="title" id="event-title" class="form-input" required>
      </div>

      <div class="form-group">
        <label class="form-label" for="event-time">Time</label>
        <input type="time" name="time" id="event-time" class="form-input">
      </div>

      <div class="form-group">
        <label class="form-label" for="event-description">Description</label>
        <textarea name="description"
                  id="event-description"
                  class="form-textarea"></textarea>
      </div>

      <div class="form-group">
        <label class="form-label">Color</label>
        <div class="color-options">
          @foreach(['blue','pink','green','yellow','purple'] as $c)
            <div class="color-option color-{{ $c }}"
                 data-color="{{ $c }}"></div>
          @endforeach
          <input type="hidden" name="color" id="event-color" value="blue">
        </div>
      </div>

      <div class="form-group checkbox-group">
        <input type="checkbox" name="all_day" id="all-day" class="checkbox-input" value="1">
        <span class="checkbox-custom"><i class="fas fa-check"></i></span>
        <label for="all-day" class="checkbox-label">All day</label>
      </div>

      <button type="submit" class="submit-btn">Save Event</button>
    </form>
  </div>
</div>

            
            <!-- Calendar Sidebar -->
            {{-- Right-hand mini-schedule sidebar --}}
<div class="calendar-sidebar">
  <h3 class="sidebar-title">Schedules</h3>

  @if($dayEvents->isEmpty())
    <p class="no-data">No scheduled classes today.</p>
  @else
    @foreach($dayEvents as $e)
      <div class="time-slot">
        <div class="time-label">
          {{-- if all_day is set, say “All day” else show H:i A --}}
          {{ $e->all_day
               ? 'All day'
               : $e->start_at->format('h:i A')
          }}
        </div>
        <div class="time-event">
          {{-- main event title --}}
          <div class="event-card {{ $e->color }}">
            {{ $e->title }}
          </div>
          {{-- optional description underneath --}}
          @if($e->description)
            <div class="event-card gray" style="margin-top:4px;">
              {{ $e->description }}
            </div>
          @endif
        </div>
      </div>
    @endforeach
  @endif
</div>

        </div>
    </div>
    
    <!-- New Event Modal -->
    <div id="new-event-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Event</h3>
                <button class="close-btn">&times;</button>
            </div>
            
            <form id="event-form">
                <div class="form-group">
                    <label for="event-title" class="form-label">Event Title</label>
                    <input type="text" id="event-title" class="form-input" placeholder="Enter event title" required>
                </div>
                
                <div class="form-group">
                    <label for="event-date" class="form-label">Date</label>
                    <input type="date" id="event-date" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label for="event-time" class="form-label">Time</label>
                    <input type="time" id="event-time" class="form-input">
                </div>
                
                <div class="form-group">
                    <label for="event-description" class="form-label">Description</label>
                    <textarea id="event-description" class="form-textarea" placeholder="Enter event description"></textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Color</label>
                    <div class="color-options">
                        <div class="color-option color-blue selected" data-color="blue"></div>
                        <div class="color-option color-pink" data-color="pink"></div>
                        <div class="color-option color-green" data-color="green"></div>
                        <div class="color-option color-yellow" data-color="yellow"></div>
                        <div class="color-option color-purple" data-color="purple"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-group">
                        <input type="checkbox" id="all-day" class="checkbox-input">
                        <span class="checkbox-custom"><i class="fas fa-check"></i></span>
                        <span class="checkbox-label">All day</span>
                    </label>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-group">
                        <input type="checkbox" id="repeat-event" class="checkbox-input">
                        <span class="checkbox-custom"><i class="fas fa-check"></i></span>
                        <span class="checkbox-label">Repeat</span>
                    </label>
                </div>
                
                <button type="submit" class="submit-btn">Save Event</button>
            </form>
        </div>
    </div>
    
    <!-- Event Details Modal -->
    <div id="event-details-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Event Details</h3>
                <button class="close-btn">&times;</button>
            </div>
            
            <div class="event-details">
                <h3 class="event-title">C++ Grupa 1</h3>
                <div class="event-datetime">October 15, 2024 at 14:00</div>
                <p class="event-description">C++ programming class for Group 1</p>
                <div class="event-actions">
                    <button class="event-btn edit-btn">Edit</button>
                    <button class="event-btn delete-btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
document.addEventListener('DOMContentLoaded', ()=> {
  const newEventModal = document.getElementById('new-event-modal');
  const openBtn       = document.getElementById('new-event-btn');
  const closeBtns     = newEventModal.querySelectorAll('.close-btn');
  const dateInput     = document.getElementById('event-date');
  const colorInputs   = document.querySelectorAll('.color-option');

  // 1) Click a cell to open modal
  document.querySelectorAll('.calendar-grid td[data-date]').forEach(td => {
    td.addEventListener('click', ()=>{
      dateInput.value = td.dataset.date;
      newEventModal.style.display = 'flex';
    });
  });

  // 2) “New schedule” button
  openBtn.addEventListener('click', ()=>{
    // default to today
    dateInput.value = new Date().toISOString().slice(0,10);
    newEventModal.style.display = 'flex';
  });

  // 3) Close
  closeBtns.forEach(b=> b.addEventListener('click', ()=> {
    newEventModal.style.display = 'none';
  }));
  window.addEventListener('click', e=>{
    if (e.target === newEventModal) newEventModal.style.display='none';
  });

  // 4) Color picker
  colorInputs.forEach(opt=>{
    opt.addEventListener('click', ()=>{
      colorInputs.forEach(o=> o.classList.remove('selected'));
      opt.classList.add('selected');
      document.getElementById('event-color').value = opt.dataset.color;
    });
  });
});
</script>

</body>
</html>

