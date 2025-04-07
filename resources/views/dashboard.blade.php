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
    <!-- Inline CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f5f7f9;
            overflow: hidden;
            color: #333;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 240px;
            background-color: #ffffff;
            height: 100vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
        }

        .logo-container {
            display: flex;
            align-items: center;
            padding: 0 20px 20px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 15px;
        }

        .logo-image {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .logo-text {
            font-weight: 700;
            font-size: 18px;
            color: #333;
        }

        .logo-text span {
            color: #e74c3c;
            font-weight: 700;
        }

        .nav-menu {
            list-style: none;
            padding: 0 10px;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #666;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: #f0f7ff;
            color: #3b82f6;
        }

        .nav-link.active {
            background-color: #3b82f6;
            color: white;
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .nav-text {
            font-size: 14px;
            font-weight: 500;
        }

        .nav-divider {
            height: 1px;
            background-color: #f0f0f0;
            margin: 15px 0;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 240px;
            width: calc(100% - 240px - 280px);
            padding: 20px;
            overflow-y: auto;
            height: 100vh;
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
            color: #333;
        }

        .search-container {
            position: relative;
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

        /* Card Styling */
        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        /* Announcement Card */
        .announcement-card {
            background-color: #f0f7ff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-radius: 8px;
        }

        .announcement-text {
            font-size: 14px;
            color: #333;
        }

        .announcement-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
        }

        /* Children Cards */
        .children-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .child-card {
            padding: 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
        }

        .child-card.green {
            background-color: #e6f7ee;
        }

        .child-card.pink {
            background-color: #fce7e7;
        }

        .child-card.blue {
            background-color: #e6f0ff;
        }

        .child-card.yellow {
            background-color: #fff8e6;
        }

        .child-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .child-info {
            flex-grow: 1;
        }

        .child-name {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .child-grade {
            font-size: 12px;
            color: #666;
        }

        /* Progress Section */
        .progress-container {
            margin-top: 10px;
        }

        .progress-item {
            margin-bottom: 15px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .progress-title {
            font-size: 14px;
            font-weight: 500;
        }

        .progress-chapter {
            font-size: 12px;
            color: #666;
        }

        .progress-bar {
            height: 8px;
            background-color: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: #3b82f6;
            border-radius: 4px;
        }

        /* Assignments Section */
        .assignment-table {
            width: 100%;
            border-collapse: collapse;
        }

        .assignment-table th {
            text-align: left;
            padding: 10px;
            font-size: 14px;
            font-weight: 500;
            color: #666;
            border-bottom: 1px solid #f0f0f0;
        }

        .assignment-table td {
            padding: 12px 10px;
            font-size: 14px;
            border-bottom: 1px solid #f0f0f0;
        }

        .assignment-subject {
            font-weight: 500;
        }

        .assignment-chapter {
            font-size: 12px;
            color: #666;
        }

        .assignment-status {
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-pending {
            background-color: #fff0e0;
            color: #ff9800;
        }

        .status-completed {
            background-color: #e6f7ee;
            color: #00c853;
        }

        /* Right Sidebar */
        .right-sidebar {
            width: 280px;
            background-color: white;
            height: 100vh;
            position: fixed;
            right: 0;
            top: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            overflow-y: auto;
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 20px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            flex-grow: 1;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-role {
            font-size: 12px;
            color: #666;
        }

        .dropdown-icon {
            color: #666;
            cursor: pointer;
        }

        /* Calendar */
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-title {
            font-weight: 600;
            font-size: 16px;
        }

        .calendar-nav {
            display: flex;
            gap: 10px;
        }

        .calendar-nav-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #666;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin-bottom: 20px;
        }

        .calendar-day-header {
            text-align: center;
            font-size: 12px;
            font-weight: 500;
            color: #666;
            padding: 5px 0;
        }

        .calendar-day {
            text-align: center;
            padding: 8px 0;
            font-size: 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .calendar-day:hover {
            background-color: #f0f7ff;
        }

        .calendar-day.active {
            background-color: #3b82f6;
            color: white;
        }

        /* Schedule */
        .schedule-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .schedule-title {
            font-weight: 600;
            font-size: 16px;
        }

        .see-all {
            font-size: 12px;
            color: #3b82f6;
            text-decoration: none;
        }

        .schedule-item {
            display: flex;
            margin-bottom: 15px;
        }

        .schedule-number {
            width: 24px;
            height: 24px;
            background-color: #f0f7ff;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            margin-right: 10px;
        }

        .schedule-info {
            flex-grow: 1;
        }

        .schedule-subject {
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .schedule-details {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
        }

        .schedule-students {
            margin-right: 10px;
        }

        /* Events */
        .events-container {
            margin-top: 20px;
        }

        .event-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .event-icon {
            width: 36px;
            height: 36px;
            background-color: #f0f7ff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: #3b82f6;
        }

        .event-info {
            flex-grow: 1;
        }

        .event-title {
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .event-time {
            font-size: 12px;
            color: #666;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .main-content {
                width: calc(100% - 240px);
            }
            
            .right-sidebar {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            
            .logo-text, .nav-text {
                display: none;
            }
            
            .logo-container {
                justify-content: center;
                padding: 15px 0;
            }
            
            .logo-image {
                margin-right: 0;
            }
            
            .nav-link {
                justify-content: center;
                padding: 10px;
            }
            
            .nav-link i {
                margin-right: 0;
            }
            
            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
            
            .children-container {
                grid-template-columns: 1fr;
            }
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
                    <i class="fas fa-th-large"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('attendance') }}"class="nav-link">
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
                <p class="announcement-text">Hello world, your live session is about to start!</p>
                <button class="announcement-btn">Join</button>
            </div>
        </div>
        
        <!-- Children and Progress Section -->
        <div class="card-container" style="display: flex; gap: 20px;">
            <!-- My Children Section -->
            <div class="card" style="flex: 1;">
                <h2 class="card-title">My Children</h2>
                <div class="children-container">
                    <div class="child-card green">
                        <div class="child-info">
                            <h3 class="child-name">Steven Nilson</h3>
                            <p class="child-grade">Grade 5</p>
                        </div>
                    </div>
                    
                    <div class="child-card pink">
                        <img src="/placeholder.svg?height=40&width=40" alt="Avatar" class="child-avatar">
                        <div class="child-info">
                            <h3 class="child-name">Nicki Ferrer</h3>
                            <p class="child-grade">Computer Science</p>
                        </div>
                    </div>
                    
                    <div class="child-card blue">
                        <div class="child-info">
                            <h3 class="child-name">Wesley Groves</h3>
                            <p class="child-grade">Grade 4</p>
                        </div>
                    </div>
                    
                    <div class="child-card yellow">
                        <img src="/placeholder.svg?height=40&width=40" alt="Avatar" class="child-avatar">
                        <div class="child-info">
                            <h3 class="child-name">Radhia Jendoubi</h3>
                            <p class="child-grade">Science</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Completion Progress Section -->
            <div class="card" style="flex: 1;">
                <h2 class="card-title">Completion progress</h2>
                <div class="progress-container">
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-title">Organic Chemistry</span>
                            <span class="progress-chapter">Chapter 1</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 75%;"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-title">States of Matter</span>
                            <span class="progress-chapter">Chapter 2</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 45%;"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-title">Solutions</span>
                            <span class="progress-chapter">Chapter 3</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%;"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-title">Chemical changes</span>
                            <span class="progress-chapter">Chapter 4</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 30%;"></div>
                        </div>
                    </div>
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
                    <tr>
                        <td>
                            <div class="assignment-subject">Chemistry</div>
                            <div class="assignment-chapter">Page 15</div>
                        </td>
                        <td>Daily task</td>
                        <td>10:00 AM</td>
                        <td><span class="assignment-status status-pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="assignment-subject">Physics</div>
                            <div class="assignment-chapter">Page 45</div>
                        </td>
                        <td>Daily task</td>
                        <td>11:45 AM</td>
                        <td><span class="assignment-status status-pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="assignment-subject">Biology</div>
                            <div class="assignment-chapter">Chapter 4</div>
                        </td>
                        <td>Daily task</td>
                        <td>10:30 AM</td>
                        <td><span class="assignment-status status-completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
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
        
        <!-- Calendar -->
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
                
                <!-- Calendar days -->
                <div class="calendar-day">30</div>
                <div class="calendar-day">31</div>
                <div class="calendar-day">1</div>
                <div class="calendar-day active">2</div>
                <div class="calendar-day">3</div>
                <div class="calendar-day">4</div>
                <div class="calendar-day">5</div>
                
                <div class="calendar-day">6</div>
                <div class="calendar-day">7</div>
                <div class="calendar-day">8</div>
                <div class="calendar-day">9</div>
                <div class="calendar-day">10</div>
                <div class="calendar-day">11</div>
                <div class="calendar-day">12</div>
                
                <div class="calendar-day">13</div>
                <div class="calendar-day">14</div>
                <div class="calendar-day">15</div>
                <div class="calendar-day">16</div>
                <div class="calendar-day">17</div>
                <div class="calendar-day">18</div>
                <div class="calendar-day">19</div>
            </div>
        </div>
        
        <!-- Schedule -->
        <div class="schedule-section">
            <div class="schedule-header">
                <h3 class="schedule-title">Schedule</h3>
                <a href="#" class="see-all">See all</a>
            </div>
            
            <div class="schedule-list">
                <div class="schedule-item">
                    <div class="schedule-number">1</div>
                    <div class="schedule-info">
                        <div class="schedule-subject">Physics</div>
                        <div class="schedule-details">
                            <span class="schedule-students">4 of 5 students</span>
                            <span class="schedule-time">17:00 - 18:00</span>
                        </div>
                    </div>
                </div>
                
                <div class="schedule-item">
                    <div class="schedule-number">2</div>
                    <div class="schedule-info">
                        <div class="schedule-subject">Chemistry</div>
                        <div class="schedule-details">
                            <span class="schedule-students">3 of 5 students</span>
                            <span class="schedule-time">9:00 - 10:00</span>
                        </div>
                    </div>
                </div>
                
                <div class="schedule-item">
                    <div class="schedule-number">3</div>
                    <div class="schedule-info">
                        <div class="schedule-subject">Mathematics</div>
                        <div class="schedule-details">
                            <span class="schedule-students">5 of 5 students</span>
                            <span class="schedule-time">10:15 - 11:00</span>
                        </div>
                    </div>
                </div>
                
                <div class="schedule-item">
                    <div class="schedule-number">4</div>
                    <div class="schedule-info">
                        <div class="schedule-subject">Biology</div>
                        <div class="schedule-details">
                            <span class="schedule-students">4 of 5 students</span>
                            <span class="schedule-time">12:00 - 12:30</span>
                        </div>
                    </div>
                </div>
                
                <div class="schedule-item">
                    <div class="schedule-number">5</div>
                    <div class="schedule-info">
                        <div class="schedule-subject">Social</div>
                        <div class="schedule-details">
                            <span class="schedule-students">5 of 5 students</span>
                            <span class="schedule-time">16:30 - 17:30</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Upcoming Events -->
        <div class="events-container">
            <div class="schedule-header">
                <h3 class="schedule-title">Upcoming Events</h3>
                <a href="#" class="see-all">See all</a>
            </div>
            
            <div class="event-list">
                <div class="event-item">
                    <div class="event-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="event-info">
                        <div class="event-title">Presentation for maths</div>
                        <div class="event-time">Coming soon</div>
                    </div>
                </div>
                
                <div class="event-item">
                    <div class="event-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="event-info">
                        <div class="event-title">Guest Lecture on Atoms</div>
                        <div class="event-time">Coming soon</div>
                    </div>
                </div>
                
                <div class="event-item">
                    <div class="event-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <div class="event-info">
                        <div class="event-title">English - Prepositions</div>
                        <div class="event-time">Coming soon</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

