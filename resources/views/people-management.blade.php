<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persons Management</title>
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

        /* Person Card Styling */
        .person-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border: 1px solid #eaeaea;
        }

        .person-info {
            display: flex;
            flex-direction: column;
            width: 200px;
        }

        .person-name {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .person-subject {
            color: #666;
            font-size: 14px;
        }

        .group-button {
            background-color: #e6eeff;
            color: #3b82f6;
            border: none;
            border-radius: 6px;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            width: 100px;
            text-align: center;
        }

        .person-role {
            font-size: 14px;
            color: #666;
            width: 100px;
            text-align: center;
        }

        .manage-button {
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

        .manage-button:hover {
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
                <a href="{{ route('people-management') }}" class="nav-link active">
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
            <h1 class="page-title">Persons Management</h1>
            
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
            <h2 class="content-title">List of All Persons</h2>
            
            <!-- Person Cards -->
            <div class="person-card">
                <div class="person-info">
                    <div class="person-name">Filip Petkovski</div>
                    <div class="person-subject">Math</div>
                </div>
                <div class="group-button">3 Group</div>
                <div class="person-role">Parent</div>
                <button class="manage-button">Manage</button>
            </div>
            
            <div class="person-card">
                <div class="person-info">
                    <div class="person-name">Marko Maksimovski</div>
                    <div class="person-subject">German</div>
                </div>
                <div class="group-button">2 Group</div>
                <div class="person-role">Student</div>
                <button class="manage-button">Manage</button>
            </div>
            
            <div class="person-card">
                <div class="person-info">
                    <div class="person-name">Matej Velickovic</div>
                    <div class="person-subject">C++</div>
                </div>
                <div class="group-button">1 Group</div>
                <div class="person-role">Student</div>
                <button class="manage-button">Manage</button>
            </div>
            
            <div class="person-card">
                <div class="person-info">
                    <div class="person-name">Teodor Panevski</div>
                    <div class="person-subject">Math</div>
                </div>
                <div class="group-button">5 Group</div>
                <div class="person-role">Student</div>
                <button class="manage-button">Manage</button>
            </div>
            
            <div class="person-card">
                <div class="person-info">
                    <div class="person-name">Petar Ilievski</div>
                    <div class="person-subject">English</div>
                </div>
                <div class="group-button">2 Group</div>
                <div class="person-role">Personal</div>
                <button class="manage-button">Manage</button>
            </div>
            
            <div class="person-card">
                <div class="person-info">
                    <div class="person-name">Ana Jordanovska</div>
                    <div class="person-subject">All Day Class</div>
                </div>
                <div class="group-button">4 Group</div>
                <div class="person-role">Parent</div>
                <button class="manage-button">Manage</button>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add any JavaScript functionality here
            
            // Example: Search functionality
            const searchInput = document.querySelector('.search-input');
            const personCards = document.querySelectorAll('.person-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                personCards.forEach(card => {
                    const name = card.querySelector('.person-name').textContent.toLowerCase();
                    const subject = card.querySelector('.person-subject').textContent.toLowerCase();
                    
                    if (name.includes(searchTerm) || subject.includes(searchTerm)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
            
            // Example: Manage button click
            const manageButtons = document.querySelectorAll('.manage-button');
            
            manageButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const personName = this.closest('.person-card').querySelector('.person-name').textContent;
                    alert(`Managing ${personName}`);
                });
            });
        });
    </script>
</body>
</html>

