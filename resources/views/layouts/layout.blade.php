<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Excel Sheets</title>



    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: cursive;
    }
    /* Custom styles for lavender outlined button */
    .btn-outline-lavender {
        color: rgb(93, 88, 129) !important; /* Text color */
        border: 2px solid rgb(93, 88, 129) !important; /* Lavender border */
        background-color: transparent !important; /* Transparent background */
        transition: all 0.3s ease; /* Smooth transition for hover effects */
    }

    /* Hover effect */
    .btn-outline-lavender:hover {
        background-color: rgb(118, 118, 170) !important; /* Lavender background on hover */
        color: white !important; /* White text on hover */
    }
</style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Excel Sheets Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                 @if (Auth::check())
                 <li class="nav-item active">
                     <a class="nav-link" href="{{ url('/home')}}">Home <span class="visually-hidden">(current)</span></a>
                 </li>  
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('index')}}">Import to Excel</a>
                 </li>
                 @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/')}}">Register</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="{{ route('login.view')}}">Login</a>
                    </li>
                 @endif
            </ul>
            @if(Auth::check())
              <div class="d-flex">
                 <a href="{{ route('logout')}}" class="btn btn-md btn-outline-lavender" type="submit">Logout</a>
              </div>
            @endif
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') <!-- This is where your page content will be inserted -->
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
