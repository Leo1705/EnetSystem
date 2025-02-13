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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- Placeholder for CSS -->
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
    color: #333;
    background-color: #f5f5f5;
    overflow: hidden;
}

/* Sidebar Styling */
aside {
    width: 240px;
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.logo-image {
    width: 220px; /* Increased size */
    margin-bottom: 20px;
}

nav ul {
    list-style: none;
    width: 100%;
}

nav ul li {
    margin-bottom: 10px;
}

.navigation-item {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    text-decoration: none;
    color: #555;
    border-radius: 8px;
    font-size: 14px;
    transition: background-color 0.3s, color 0.3s;
}

.navigation-item:hover,
.navigation-item.active {
    background-color: #007bff;
    color: #fff;
}

.navigation-item i {
    margin-right: 10px;
}

/* Header Styling */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: calc(100% - 240px);
    position: fixed;
    top: 0;
    left: 240px;
    z-index: 1000;
}

.search input {
    padding: 10px;
    width: 280px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.profile {
    display: flex;
    align-items: center;
}

.profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

/* Main Content Styling */
.container {
    margin-left: 240px;
    padding: 20px;
    margin-top: 80px;
    overflow-y: auto;
    height: calc(100vh - 80px);
}

.container h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Card Component */
.person-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #ffffff;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.person-info {
    display: flex;
    flex-direction: column;
}

.person-info .name {
    font-weight: 600;
    margin-bottom: 5px;
}

.person-info .subject {
    color: #888;
}

.group-btn,
.manage-btn {
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
    border: none;
    transition: background-color 0.3s;
}

.group-btn {
    background-color: #e0f0ff;
    color: #007bff;
}

.manage-btn {
    background-color: #007bff;
    color: #fff;
}

.manage-btn:hover {
    background-color: #0056b3;
}

.role {
    color: #555;
    font-weight: 500;
}

/* Scroll Behavior */
body,
.container {
    scroll-behavior: smooth;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    aside {
        width: 200px;
    }

    header {
        width: calc(100% - 200px);
        left: 200px;
    }

    .search input {
        width: 200px;
    }

    .person-card {
        flex-direction: column;
        align-items: flex-start;
    }
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
                    <a href="{{route('people-management')}}"class="navigation-item"><i class="fa-solid fa-pen"></i>Persons Management</a>
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
            <div>
                <input type="search" placeholder="Search" name="search"/>
                <i class="fa-regular fa-bell"></i>
                <i class="fa-regular fa-envelope"></i>
            </div>
        </section>
        <section class=""></section>
        <section class=""></section>
        <section class=""></section>
        <section class=""></section>
    </main>
</body>
</html>
