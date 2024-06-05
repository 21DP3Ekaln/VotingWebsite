<form method="POST" action="{{ route('teachers.store') }}">
    @csrf
    <style>
        form {
            width: 90%; /* Use percentage width to make it responsive */
            max-width: 500px; /* Set a maximum width to prevent it from getting too wide */
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%; /* Take full available width on smaller screens */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical; /* Allow vertical resizing only */
        }

        button[type="submit"],
        .back-btn {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px; /* Add spacing between buttons */
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-btn {
            background-color: #f0f0f0; /* Light gray background */
            color: #333;
            border: 1px solid #ccc;
        }

        .back-btn:hover {
            background-color: #ddd; /* Darker gray on hover */
        }

        /* Media Query for smaller screens */
        @media (max-width: 500px) {
            form {
                width: 95%;
            }
        }
        </style>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="surname">Surname:</label>
    <input type="text" name="surname" id="surname" required><br><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea><br><br>

    <label for="department">Department:</label>
    <select name="department_id" id="department" required>
        <option value="">Select Department</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Submit</button>
    <a href="/home" class="back-btn">Back</a>


</form>
