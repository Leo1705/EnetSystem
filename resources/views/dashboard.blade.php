<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External Fonts (Google Fonts) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 
    <!-- ovoj ga zima od public/css -->
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Placeholder for CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        
    </style>
</head>
<body>
    <aside>
        <div class="aside-navigation">
            <img src="{{asset('EnetLogo.png')}}" class="logo-image" alt="logo Enet"/>
            <nav>
                <ul>
                    <li class="active">
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-house"></i> Dashboard</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-book"></i> Courses</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-user-group"></i> Group Course</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-plus"></i> Add new Students & Parents</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="navigation-item"><i class="fa-solid fa-pen"></i>Persons Management</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-file"></i>Invoice & Payments</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="navigation-item"><i class="fa-solid fa-file-signature"></i>Assignments</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-user"></i>Attendance</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item"><i class="fa-solid fa-message"></i>Messages</a>
                    </li>
                    <div class="internal-navigation">
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item">Help</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item">Settings</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class=" navigation-item">Log Out</a>
                    </li>
                    </div>
   

                        </nav>
                    </div>

    </aside>
    <main>
        <section class="information-section">
            <div>
                <h1>Dashboard</h1>
            </div>
            <div class="search-bar">
                <input type="search" placeholder="🔍 Search" name="search" class="search-input"></input>
                <div class="dashboard-icons">
                <i class="fa-regular fa-bell fa-1.5x"></i>
                <i class="fa-regular fa-envelope fa-1.5x"></i>
    </div>    
            </div>
        </section>
        <section class="upcoming-group-course">
            <h2>Upcoming Group Course</h2>
            <div class="course-group-card">
                <h3 class="course-group-card-title">C++ Group 1</h3>
                <button class="course-group-card-btn">View More</button>
    </div>
        </section>
        <div class="two-sec-row">
        <section class="students-list">
            <h3>My Students</h3>
            <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
    <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
    <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
    <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
            </div>
        </section>
        <section class="students-list">
            <h3>My Students</h3>
            <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
    <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
    <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
    <div class="students-card-list">
            <div class="student-list-card">
                <img src="{{ asset('media/dashboard/studentExamplePic.png') }}" alt="Student Image" class="students-list-card-image">
               <div class="student-list-card-content">
                <h3 class="students-list-card-name">Shyam Nithin</h3>
                <span class="students-list-card-course">Math</span>
    </div>

    </div>
            </div>
        </section>
        </div>
        <section class=""></section>
    </main>
    
</body>
</html>
