<!DOCTYPE html>
<html>
<head>
    <title>Top Voted Teachers</title>
    <style>

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
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1, h2, p {
            text-align: center;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }


        @media (max-width: 768px) {

            body {
                margin: 10px;
            }

            th, td {
                padding: 8px;
            }
        }

        @media (max-width: 480px) {

            body {
                margin: 5px;
            }

            th, td {
                padding: 6px;
            }

        }
    </style>
    </head>
<body>
    <h1>Top Voted Teachers</h1>

    @foreach($topTeachers as $teacher)
        <h2>{{ $teacher->usertype === 'admin' ? 'Top Teacher in ' . $teacher->department->name : 'Top Teacher' }}</h2>
        <p>Name: {{ $teacher->name }} {{ $teacher->surname }}</p>
        <p>Description: {{ $teacher->description }}</p>
        <p>Votes: {{ $teacher->total_votes }}</p>
        <hr>
    @endforeach
    <a href="/home" class="back-btn">Back</a>
</body>
</html>
