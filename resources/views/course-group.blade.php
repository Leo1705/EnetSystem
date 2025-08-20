<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Groups</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            background-color: #e6eef1;
            color: #333;
            overflow: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 240px;
            background-color: #ffffff;
            height: 100vh;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            border-radius: 0 15px 15px 0;
            border: 1px solid #cad6de;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 15px;
            text-align: center;
        }

        .logo-title {
            color: #666;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .logo-image {
            width: 120px;
            height: auto;
        }

        .nav-menu {
            list-style: none;
            padding: 0 15px;
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
            color: #4a5568;
            border-radius: 8px;
            transition: all 0.3s ease;
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
            margin-right: 10px;
            font-size: 18px;
            width: 20px;
            text-align: center;
            color: #3b82f6;
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

        .header-right {
            display: flex;
            align-items: center;
        }

        .search-container {
            position: relative;
            width: 300px;
            margin-right: 20px;
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

        .notification-icon {
            color: #666;
            font-size: 18px;
            cursor: pointer;
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

        /* Content Styling */
        .content-container {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .content-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Group Card Styling */
        .group-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border: 1px solid #eaeaea;
        }

        .group-info {
            display: flex;
            flex-direction: column;
            width: 200px;
        }

        .group-name {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .group-subject {
            color: #666;
            font-size: 14px;
        }

        .people-count {
            background-color: #e6eeff;
            color: #3b82f6;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 500;
            width: 100px;
            text-align: center;
        }

        .max-capacity {
            font-size: 14px;
            color: #666;
            width: 150px;
            text-align: right;
        }

        .add-button {
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            width: 100px;
            text-align: center;
        }

        .add-button:hover {
            background-color: #2563eb;
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
                <a href="{{ route('attendance.index') }}"class="nav-link">
                    <i class="far fa-calendar"></i>
                    <span class="nav-text">Calendar</span>
                </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('people.index') }}" class="nav-link {{ request()->routeIs('people.*') ? 'active':'' }}">
          <i class="fas fa-book"></i><span class="nav-text">People Management</span>
        </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('courses.index') }}" class="nav-link active">
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
                <a href="{{ route('course-group') }}" class="nav-link active">
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
            <h1 class="page-title">Course Groups</h1>
            
            <div class="header-right">
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Search">
                </div>
                
                <div class="notification-icons">
                    <i class="far fa-bell notification-icon"></i>
                    <i class="far fa-envelope notification-icon"></i>
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
        
        <div class="content-container">
            <h2 class="content-title">List of All Groups</h2>
            
            <!-- Group Cards -->
            <div class="group-card">
                <div class="group-info">
                    <div class="group-name">Group 1</div>
                    <div class="group-subject">Mathematics</div>
                </div>
                <div class="people-count">30 people</div>
                <div class="max-capacity">Max: 60 people</div>
                <button class="add-button">Add New</button>
            </div>
            
            <div class="group-card">
                <div class="group-info">
                    <div class="group-name">Group 2</div>
                    <div class="group-subject">C++</div>
                </div>
                <div class="people-count">20 people</div>
                <div class="max-capacity">Max: 50 people</div>
                <button class="add-button">Add New</button>
            </div>
            
            <div class="group-card">
                <div class="group-info">
                    <div class="group-name">Group 3</div>
                    <div class="group-subject">HTML/CSS</div>
                </div>
                <div class="people-count">10 people</div>
                <div class="max-capacity">Max: 45 people</div>
                <button class="add-button">Add New</button>
            </div>
            
            <div class="group-card">
                <div class="group-info">
                    <div class="group-name">Group 4</div>
                    <div class="group-subject">Maths</div>
                </div>
                <div class="people-count">30 people</div>
                <div class="max-capacity">Max: 75 people</div>
                <button class="add-button">Add New</button>
            </div>
            
            <div class="group-card">
                <div class="group-info">
                    <div class="group-name">Group 5</div>
                    <div class="group-subject">C#</div>
                </div>
                <div class="people-count">17 people</div>
                <div class="max-capacity">Max: 30 people</div>
                <button class="add-button">Add New</button>
            </div>
            
            <div class="group-card">
                <div class="group-info">
                    <div class="group-name">Group 6</div>
                    <div class="group-subject">Javascript</div>
                </div>
                <div class="people-count">13 people</div>
                <div class="max-capacity">Max: 56 people</div>
                <button class="add-button">Add New</button>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add any JavaScript functionality here
            
            // Example: Search functionality
            const searchInput = document.querySelector('.search-input');
            const groupCards = document.querySelectorAll('.group-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                groupCards.forEach(card => {
                    const name = card.querySelector('.group-name').textContent.toLowerCase();
                    const subject = card.querySelector('.group-subject').textContent.toLowerCase();
                    
                    if (name.includes(searchTerm) || subject.includes(searchTerm)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
            
            // Example: Add New button click
            const addButtons = document.querySelectorAll('.add-button');
            
            addButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const groupName = this.closest('.group-card').querySelector('.group-name').textContent;
                    alert(`Add new student to ${groupName}`);
                });
            });
        });
    </script>
</body>
</html>

