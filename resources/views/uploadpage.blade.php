<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <style>



        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
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

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button[type="submit"],
        .back-btn {
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

        button[type="submit"] {
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

        @media (max-width: 500px) {
            form {
                width: 95%;
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
    <h2>Add Teacher</h2>

    <form method="POST" action="{{ route('teachers.store') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="department">Department:</label>
            <select name="department_id" id="department" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Teacher</button>
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
