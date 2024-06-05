<!DOCTYPE html>
<html>
<head>
    <title>RVT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .content-container {
            margin-top: 250px; 
        }
    </style> 
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center content-container">  
                <h1>RVT labākie skolotāji</h1> 

                <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            </div>
        </div>
    </div>
</body>
</html>
