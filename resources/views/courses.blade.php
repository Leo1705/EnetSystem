<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
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
            width: 180px; /* Increased size */
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
            width: calc(100% - 240px);
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
            font-size: 18px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            margin-left: 20px;
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

        .user-name i {
            margin-left: 5px;
        }

        .user-role {
            font-size: 12px;
            color: #666;
        }

        /* Courses Content */
        .courses-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 500;
            color: #666;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .tab.active {
            color: #3b82f6;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #3b82f6;
        }

        .tab-count {
            font-size: 14px;
            color: #999;
            margin-left: 5px;
        }

        .add-course-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            margin-left: auto;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .course-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .course-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .course-content {
            padding: 15px;
            position: relative;
        }

        .course-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .instructor-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: absolute;
            right: 15px;
            top: -20px;
            border: 3px solid white;
            object-fit: cover;
        }

        .view-course-btn {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #f5f7f9;
            color: #333;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-course-btn:hover {
            background-color: #e6f0ff;
            color: #3b82f6;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .courses-grid {
                grid-template-columns: repeat(2, 1fr);
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
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-wrap: wrap;
            }
            
            .search-container {
                order: 3;
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Left Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('EnetLogo.png') }}" alt="Logo" class="logo-image" width="300" height="100">
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
                <a href="{{ route('courses') }}" class="nav-link active">
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
            <h1 class="page-title">Courses</h1>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search">
            </div>
            <div class="notification-icons">
                <i class="far fa-bell"></i>
                <i class="far fa-envelope"></i>
            </div>
            <div class="user-profile">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User Avatar" class="user-avatar">
                <div class="user-info">
                    <div class="user-name">Swetha shankaresh <i class="fas fa-chevron-down"></i></div>
                    <div class="user-role">Student</div>
                </div>
            </div>
        </div>
        
        <!-- Courses Content -->
        <div class="courses-container">
            <div class="tabs">
                <div class="tab active" data-tab="all">All courses <span class="tab-count">(12)</span></div>
                <div class="tab" data-tab="ongoing">Ongoing <span class="tab-count">(7)</span></div>
                <div class="tab" data-tab="completed">Completed <span class="tab-count">(5)</span></div>
                <button class="add-course-btn">Add new Course</button>
            </div>
            
            <!-- All Courses Tab -->
            <div class="tab-content active" id="all-tab">
                <div class="courses-grid">
                    <!-- Course 1 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-vector/hand-drawn-mathematics-background_23-2148157511.jpg" alt="Maths" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">Maths</h3>
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="{{ route('course-details') }}" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 2 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/science-lab-equipment_144627-43402.jpg" alt="C++ Programming" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">C++ Programming</h3>
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 3 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-vector/atom-design-illustration_23-2149539884.jpg" alt="HTML/CSS Programming" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">HTML/CSS Programming</h3>
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 4 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/programming-background-with-person-working-with-codes-computer_23-2150010125.jpg" alt="JavaScript Programming" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">JavaScript Programming</h3>
                            <img src="https://randomuser.me/api/portraits/men/42.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 5 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/english-books-table_144627-12835.jpg" alt="English Department" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">English Department</h3>
                            <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 6 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/travel-concept-with-landmarks_23-2149153256.jpg" alt="Social science Department" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">Social science Department</h3>
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Ongoing Courses Tab -->
            <div class="tab-content" id="ongoing-tab">
                <div class="courses-grid">
                    <!-- Course 1 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-vector/hand-drawn-mathematics-background_23-2148157511.jpg" alt="Maths" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">Maths</h3>
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="{{ route('course-details') }}" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 2 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/science-lab-equipment_144627-43402.jpg" alt="C++ Programming" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">C++ Programming</h3>
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 3 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-vector/atom-design-illustration_23-2149539884.jpg" alt="HTML/CSS Programming" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">HTML/CSS Programming</h3>
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 4 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/programming-background-with-person-working-with-codes-computer_23-2150010125.jpg" alt="JavaScript Programming" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">JavaScript Programming</h3>
                            <img src="https://randomuser.me/api/portraits/men/42.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Completed Courses Tab -->
            <div class="tab-content" id="completed-tab">
                <div class="courses-grid">
                    <!-- Course 1 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/english-books-table_144627-12835.jpg" alt="English Department" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">English Department</h3>
                            <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                    
                    <!-- Course 2 -->
                    <div class="course-card">
                        <img src="https://img.freepik.com/free-photo/travel-concept-with-landmarks_23-2149153256.jpg" alt="Social science Department" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title">Social science Department</h3>
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Instructor" class="instructor-avatar">
                            <a href="#" class="view-course-btn">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript for Tab Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    tab.classList.add('active');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Show the corresponding tab content
                    const tabId = tab.getAttribute('data-tab');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>

