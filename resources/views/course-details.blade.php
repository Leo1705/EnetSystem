<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
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
            justify-content: center;
            padding: 0 20px 20px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 15px;
        }

        .logo-image {
            width: 120px;
            margin-bottom: 10px;
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

        .notification-icons {
            display: flex;
            gap: 15px;
            color: #666;
        }

        /* Course Details Styling */
        .course-details {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .course-header {
            display: flex;
            align-items: flex-start;
            padding: 20px;
        }

        .course-image {
            width: 200px;
            height: 120px;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 20px;
        }

        .course-info {
            flex-grow: 1;
        }

        .course-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .course-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .instructor {
            display: flex;
            align-items: center;
        }

        .instructor-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .instructor-name {
            font-size: 14px;
            font-weight: 500;
        }

        /* Course Groups Styling */
        .course-groups {
            padding: 0 20px 20px;
        }

        .groups-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .groups-title {
            font-size: 18px;
            font-weight: 600;
        }

        .add-new-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .group-list {
            display: grid;
            gap: 15px;
        }

        .group-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
        }

        .group-card.green {
            background-color: #e6f7ee;
        }

        .group-card.pink {
            background-color: #fce7e7;
        }

        .group-card.blue {
            background-color: #e6f0ff;
        }

        .group-card.yellow {
            background-color: #fff8e6;
        }

        .group-card.mint {
            background-color: #e6f7f4;
        }

        .group-name {
            font-weight: 600;
            font-size: 16px;
        }

        .group-students {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        .manage-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
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

        /* Next Classes */
        .classes-section {
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .section-title {
            font-weight: 600;
            font-size: 16px;
        }

        .see-all {
            font-size: 12px;
            color: #3b82f6;
            text-decoration: none;
        }

        .class-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .class-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #3b82f6;
            margin-right: 10px;
        }

        .class-info {
            flex-grow: 1;
        }

        .class-day {
            font-weight: 500;
            font-size: 14px;
        }

        .class-group {
            font-size: 12px;
            color: #666;
        }

        .class-time {
            font-weight: 500;
            font-size: 14px;
            color: #333;
        }

        .class-status {
            font-size: 12px;
            color: #ff6b6b;
        }

        /* Students Section */
        .students-section {
            margin-bottom: 30px;
        }

        .student-group {
            margin-bottom: 15px;
        }

        .student-group-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .student-group-name {
            font-weight: 500;
            font-size: 14px;
        }

        .student-count {
            font-size: 12px;
            color: #666;
        }

        .add-student-btn {
            background-color: #e6f7ee;
            color: #00c853;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
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
                width: 40px;
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
        }
    </style>
</head>
<body>
    <!-- Left Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('EnetLogo.png') }}" alt="Logo" class="logo-image" width="200" height="70">
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-th-large"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('attendance.index') }}"class="nav-link">
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
                <a href="{{ route('course-details') }}" class="nav-link active">
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
            <h1 class="page-title">Course Management</h1>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search">
            </div>
            <div class="notification-icons">
                <i class="far fa-bell"></i>
                <i class="far fa-envelope"></i>
            </div>
        </div>
        
        <!-- Course Details -->
        <div class="course-details">
            <div class="course-header">
                <img src="/placeholder.svg?height=120&width=200" alt="Maths Course" class="course-image" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                <div class="course-info">
                    <h2 class="course-title">Maths</h2>
                    <p class="course-description">
                        Maths Description: Tuja mocha da pishe kolku grupa ima, kolku ucenici ima, kaj predava i nekoi plus informacii za kursot.
                    </p>
                    <div class="instructor">
                        <img src="/placeholder.svg?height=40&width=40" alt="Instructor" class="instructor-avatar">
                        <span class="instructor-name">Marjan Spasik</span>
                    </div>
                </div>
            </div>
            
            <div class="course-groups">
                <div class="groups-header">
                    <h3 class="groups-title">Course Groups</h3>
                    <button class="add-new-btn">Add New</button>
                </div>
                
                <div class="group-list">
                    <div class="group-card green">
                        <div>
                            <div class="group-name">Group 1</div>
                            <div class="group-students">
                                Marjo Spasik, Leonid Petkovski, Marko Markovski, Nikola Karanfilovski, Nurin Petkovski, Dario Janeski, Damjan Kotlariovski...
                            </div>
                        </div>
                        <button class="manage-btn">Manage</button>
                    </div>
                    
                    <div class="group-card pink">
                        <div>
                            <div class="group-name">Group 2</div>
                            <div class="group-students">
                                Marjo Spasik, Leonid Petkovski, Marko Markovski, Nikola Karanfilovski, Nurin Petkovski, Dario Janeski, Damjan Kotlariovski...
                            </div>
                        </div>
                        <button class="manage-btn">Manage</button>
                    </div>
                    
                    <div class="group-card blue">
                        <div>
                            <div class="group-name">Group 3</div>
                            <div class="group-students">
                                Marjo Spasik, Leonid Petkovski, Marko Markovski, Nikola Karanfilovski, Nurin Petkovski, Dario Janeski, Damjan Kotlariovski...
                            </div>
                        </div>
                        <button class="manage-btn">Manage</button>
                    </div>
                    
                    <div class="group-card yellow">
                        <div>
                            <div class="group-name">Group 4</div>
                            <div class="group-students">
                                Marjo Spasik, Leonid Petkovski, Marko Markovski, Nikola Karanfilovski, Nurin Petkovski, Dario Janeski, Damjan Kotlariovski...
                            </div>
                        </div>
                        <button class="manage-btn">Manage</button>
                    </div>
                    
                    <div class="group-card mint">
                        <div>
                            <div class="group-name">Group 5</div>
                            <div class="group-students">
                                Marjo Spasik, Leonid Petkovski, Marko Markovski, Nikola Karanfilovski, Nurin Petkovski, Dario Janeski, Damjan Kotlariovski...
                            </div>
                        </div>
                        <button class="manage-btn">Manage</button>
                    </div>
                </div>
            </div>
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
        
        <!-- Next Group Classes -->
        <div class="classes-section">
            <div class="section-header">
                <h3 class="section-title">Next Group Classes</h3>
                <a href="#" class="see-all">See all</a>
            </div>
            
            <div class="class-list">
                <div class="class-item">
                    <div class="class-dot"></div>
                    <div class="class-info">
                        <div class="class-day">Tuesday</div>
                        <div class="class-group">Group 1</div>
                    </div>
                    <div class="class-time-info">
                        <div class="class-time">11:00 AM</div>
                        <div class="class-status">Active</div>
                    </div>
                </div>
                
                <div class="class-item">
                    <div class="class-dot"></div>
                    <div class="class-info">
                        <div class="class-day">Wednesday</div>
                        <div class="class-group">Group 2</div>
                    </div>
                    <div class="class-time-info">
                        <div class="class-time">13:30 AM</div>
                        <div class="class-status">Active</div>
                    </div>
                </div>
                
                <div class="class-item">
                    <div class="class-dot"></div>
                    <div class="class-info">
                        <div class="class-day">Friday</div>
                        <div class="class-group">Group 3</div>
                    </div>
                    <div class="class-time-info">
                        <div class="class-time">3:00 PM</div>
                        <div class="class-status">Active</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add new Students -->
        <div class="students-section">
            <div class="section-header">
                <h3 class="section-title">Add new Students</h3>
                <a href="#" class="see-all">See all</a>
            </div>
            
            <div class="student-groups">
                <div class="student-group">
                    <div class="student-group-header">
                        <div class="student-group-name">Group 1</div>
                        <div class="student-count">Max: 30 students</div>
                    </div>
                    <button class="add-student-btn">Add New</button>
                </div>
                
                <div class="student-group">
                    <div class="student-group-header">
                        <div class="student-group-name">Group 2</div>
                        <div class="student-count">Max: 30 students</div>
                    </div>
                    <button class="add-student-btn">Add New</button>
                </div>
                
                <div class="student-group">
                    <div class="student-group-header">
                        <div class="student-group-name">Group 3</div>
                        <div class="student-count">Max: 20 students</div>
                    </div>
                    <button class="add-student-btn">Add New</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

