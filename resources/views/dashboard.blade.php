<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- External Fonts (Google Fonts) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        body {
            display: flex;
            background-color: #f9f9f9;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #e7ecf1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .sidebar ul {
            list-style-type: none;
        }

        .sidebar ul li {
            padding: 10px;
            margin-bottom: 10px;
            font-size: 14px;
            color: #555;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #d1e7fd;
            border-radius: 8px;
        }

        .sidebar ul li i {
            margin-right: 10px;
        }

        /* Main Dashboard */
        .dashboard {
            flex: 1;
            padding: 20px;
            background: #fff;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dashboard-header input {
            width: 200px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }

        .upcoming-course,
        .students,
        .groups,
        .calendar,
        .courses {
            margin-bottom: 20px;
            background-color: #f4f7fb;
            padding: 15px;
            border-radius: 10px;
        }

        .box-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .student-card,
        .group-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #fff;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .student-card .student-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .calendar-event {
            padding: 5px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .calendar-event strong {
            display: block;
            margin-bottom: 5px;
        }

        .personal-card {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <aside>
        <div class="aside-navigation">
            <img src="{{asset('EnetLogo.png')}}" alt="logo Enet"/>
            <nav>
                <ul>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-house"></i> Dashboard</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-book"></i> Courses</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-user-group"></i> Group Course</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-plus"></i> Add new Students & Parents</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-pen"></i>Persons Management</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-file"></i>Invoice & Payments</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-file-signature"></i>Assignments</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-user"></i>Attendance</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item"><i class="fa-solid fa-message"></i>Messages</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item">Help</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item">Settings</a>
                    </li>
                    <li>
                    <a href="{{route('dashboard')}}"class="active navigation-item">Log Out</a>
                    </li>
   

    </nav>
    </div>
    </aside>

</body>
</html>
