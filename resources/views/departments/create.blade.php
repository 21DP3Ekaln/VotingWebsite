<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: black;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn, .back-btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            font-size: 1rem;
            margin: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .back-btn {
            background-color: #6c757d;
            color: white;
        }

        .btn:hover, .back-btn:hover {
            opacity: 0.9;
        }

        @media (max-width: 600px) {
            h2 {
                font-size: 1.25rem;
            }

            .btn, .back-btn {
                font-size: 0.875rem;
                padding: 8px 16px;
            }



        }

        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            }


            .alert {
    padding: 15px; /* Increased padding for better readability */
    margin-bottom: 20px;
    border: 1px solid transparent; /* Subtle border */
    border-radius: 4px;
}

.alert-success {
    background-color: #d4edda; /* Light green background */
    color: #155724; /* Dark green text */
    border-color: #c3e6cb; /* Slightly darker green border */
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
}
    </style>
</head>
<body>
    <div class="error-div">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        </div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Department') }}
    </h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Department Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Department</button>
        <a href="/home" class="back-btn">Back</a>
    </form>
    <script>
        function fadeOutAndRemove(element) {
            element.classList.add('fade-out');
            setTimeout(function() {
                element.remove();
            }, 1500);
        }

        window.addEventListener('load', function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    fadeOutAndRemove(alert);
                }, 1500);
            });
        });
    </script>
</body>
</html>

