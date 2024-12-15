<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height:700px;
            padding:0;
        }
        .left-side{
          display:flex;
          justify-content:center;
          align-items:center;
        }
        .image-section {
            background: url('../../logInImage.png') no-repeat center;
            background-size: cover;
        }
        .logo img {
            width:95%;
            margin:50px auto;
        }
        button:nth-of-type(1){
            background-color:#2525AD;
            border:1px solid black;
            border-radius:10px;
            padding:10px 15px;
            color:white;
            font-family: "Istok Web", sans-serif;
            font-weight:600;
        }
        button:nth-of-type(2){
            background-color:white;
            border:1px solid black;
            padding:10px 15px;
            margin:0 10px;
            border-radius:10px;
            font-weight:600;
        }
        button a{
            text-decoration:none;
            color:black;

        }
    
    </style>
</head>
<body>
    <div class="container row">
        <div class="col-md-6 p-5 d-flex flex-column left-side">
            <div class="logo text-center mb-4">
                <img src="{{asset('EnetLogo.png')}}" alt="Logo">
                <div class="buttons-group">
                <button>Log In as Parent</button> 
                <button><a href="{{route('login')}}">Log In as Teacher</a></button>
    </div>
            </div>
           
        </div>
        <div class="col-md-6 image-section d-none d-md-block">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
