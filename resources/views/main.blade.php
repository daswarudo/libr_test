
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body  {
        background-image: url("/img/lib_bg.jpg");
        background-color: grey;
        background-repeat: no-repeat;
        background-size: 100%;
    }
    table.d {
        
        table-layout: fixed;
        width: 100%;  
    }
    th, td {
        padding: 10px;
    }
    </style>
</head>
<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Library Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav">
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration') }}">Register</a>
                    </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard') }}">Books</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('students') }}">Student</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('borrow') }}">Borrow/Return Book</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>

                    @endguest
                </ul>
                
            </div>
        </div>
    </nav>
    <div class="container mt-5">

        @yield('content')
        
    </div>
    
</body>
</html>

