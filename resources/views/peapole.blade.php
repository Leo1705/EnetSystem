<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 
    <!-- ovoj ga zima od public/css -->
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Placeholder for CSS -->
    <title>People Management Page</title>
</head>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        
    </style>
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
</body>
</html>