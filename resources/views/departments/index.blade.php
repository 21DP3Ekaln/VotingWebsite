
<!DOCTYPE html>
<html>
<head>
    <title>Departments List</title>
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
        body {
            font-family: sans-serif;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 40%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }


        .action-btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            float:right;
        {
{}

    </style>
</head>
<body>
    <h1>Departments List</h1>

    @if (session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div style="color:red;">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn">Delete</button>
                        </form>
                        <a href="{{ route('departments.edit', $department) }}" class="action-btn edit-btn">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/home" class="back-btn">Back</a>
</body>
</html>
