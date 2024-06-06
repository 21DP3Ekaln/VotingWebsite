<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <style>

.alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }


        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        h1 {
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


        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }


        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }


        @media (max-width: 600px) {
            h1 {
                font-size: 1.25rem;
            }

            .btn, .back-btn {
                font-size: 0.875rem;
                padding: 8px 16px;
            }
            .back-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6c757d;
    color: white;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
}

.back-btn:hover {
    opacity: 0.9;
}
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
    <h1>Edit Department</h1>

    <form action="{{ route('departments.update', $department) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Department Name:</label>
            <input type="text" name="name" id="name" value="{{ $department->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Department</button>
        <a href="/home" class="back-btn">Back</a>
    </form>
    <script>
        
    </script>
</body>
</html>
