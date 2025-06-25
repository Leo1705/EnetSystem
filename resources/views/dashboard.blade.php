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
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('EnetLogo.png') }}" alt="Logo" class="logo-image">
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link active"><i class="fas fa-th-large"></i><span class="nav-text">Dashboard</span></a></li>
            <li class="nav-item"><a href="{{ route('attendance') }}" class="nav-link"><i class="far fa-calendar"></i><span class="nav-text">Calendar</span></a></li>
            <li class="nav-item"><a href="{{ route('people-management') }}" class="nav-link"><i class="fas fa-book"></i><span class="nav-text">Persons Management</span></a></li>
            <li class="nav-item"><a href="{{ route('courses') }}" class="nav-link"><i class="fas fa-chalkboard"></i><span class="nav-text">Courses</span></a></li>
            <li class="nav-item"><a href="{{ route('course-details') }}" class="nav-link"><i class="fas fa-graduation-cap"></i><span class="nav-text">Course Details</span></a></li>
            <li class="nav-item"><a href="{{ route('course-group') }}" class="nav-link"><i class="far fa-comment-alt"></i><span class="nav-text">Course Group</span></a></li>
            <div class="nav-divider"></div>
            <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-question-circle"></i><span class="nav-text">Help</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-cog"></i><span class="nav-text">Setting</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-sign-out-alt"></i><span class="nav-text">Log out</span></a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
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
            <!-- My Children Section -->
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

            <!-- Completion Progress Section -->
            <div class="card" style="flex:1;">
                <h2 class="card-title">Completion Progress</h2>
                <div class="progress-container">
                    @foreach($progress as $item)
                        <div class="progress-item">
                            <div class="progress-header">
                                <span class="progress-title">{{ $item->course->title }}</span>
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
                            <td>{{ $a->course->title }}</td>
                            <td>{{ $a->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->due_at)->format('g:i A') }}</td>
                            <td><span class="assignment-status status-{{ $a->status }}">{{ ucfirst($a->status) }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Right Sidebar -->
        <div class="right-sidebar">
            <div class="user-profile">
                <img src="/placeholder.svg?height=40&width=40" alt="User Avatar" class="user-avatar">
                <div class="user-info">
                    <div class="user-name">Svetlana Jovanovski</div>
                    <div class="user-role">Parent</div>
                </div>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>

            <!-- Calendar Section -->
            <div class="calendar-section">
                <div class="calendar-header">
                    <h3 class="calendar-title">November 2023</h3>
                    <div class="calendar-nav">
                        <button class="calendar-nav-btn"><i class="fas fa-chevron-left"></i></button>
                        <button class="calendar-nav-btn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="calendar-grid">
                    <div class="calendar-day-header">Mo</div>
                    <div class="calendar-day-header">Tu</div>
                    <div class="calendar-day-header">We</div>
                    <div class="calendar-day-header">Th</div>
                    <div class="calendar-day-header">Fr</div>
                    <div class="calendar-day-header">Sa</div>
                    <div class="calendar-day-header">Su</div>
                    @for($day=30; $day<=19; $day++)
                        <div class="calendar-day @if($day==2) active @endif">{{ $day }}</div>
                    @endfor
                </div>
            </div>

            <!-- Schedule Section -->
            <div class="schedule-section">
                <div class="schedule-header">
                    <h3 class="schedule-title">Schedule</h3>
                    <a href="#" class="see-all">See all</a>
                </div>
                <div class="schedule-list">
                    <!-- Example items -->
                    <div class="schedule-item">
                        <div class="schedule-number">1</div>
                        <div class="schedule-info">
                            <div class="schedule-subject">Physics</div>
                            <div class="schedule-details"><span class="schedule-students">4 of 5 students</span><span class="schedule-time">17:00 - 18:00</span></div>
                        </div>
                    </div>
                    <!-- Add more as needed -->
                </div>
            </div>

            <!-- Events Section -->
            <div class="events-container">
                <div class="schedule-header">
                    <h3 class="schedule-title">Upcoming Events</h3>
                    <a href="#" class="see-all">See all</a>
                </div>
                <div class="event-list">
                    <div class="event-item"><div class="event-icon"><i class="fas fa-video"></i></div><div class="event-info"><div class="event-title">Presentation for maths</div><div class="event-time">Coming soon</div></div></div>
                    <!-- Add more as needed -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
