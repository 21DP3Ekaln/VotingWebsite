<!DOCTYPE html>
<html>
<head>

    <title>Teachers List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        .sortable button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1em;
            vertical-align: middle;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            text-decoration: none;
            color: #333;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .vote-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .vote-btn:hover {
            background-color: #45a049;
        }
        </style>
</head>
<body>
    <h1>All Teachers</h1>
    <a href="/home" class="back-btn">Back</a>

    <table>
        <thead>
            <tr>

                <th class="sortable" data-sort-dir="asc">Name <button class="sort-btn">⇅</button></th>
                <th>Surname</th>
                <th>Description</th>
                <th>Votes</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($teachers as $teacher)
          <tr>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->surname }}</td>
            <td>{{ $teacher->description }}</td>
            <td>
                <span class="vote-count">{{ \App\Models\Votes::where('teachers_id', '=', $teacher->id)->count() }}</span>
                @unless (\App\Models\Votes::where(['user_id' => Auth::id()])->count() > 0)
                <button class="vote-btn" data-teacher-id="{{ $teacher->id }}">Vote</button>
                @endunless
            </td>
          </tr>
        @endforeach

        </tbody>
    </table>
</body>
</html>

<script>
    $(document).ready(function() {
    $('.vote-btn').on('click', function(e) {
        e.preventDefault();

        var teacherId = $(this).data('teacherId');
        var voteCountSpan = $(this).siblings('.vote-count'); // Target the count span

        $.ajax({
            url: '/teachers/' + teacherId + '/vote',
            type: 'POST',
            data: { _token: "{{ csrf_token() }}" }, // Include CSRF token
            success: function(response) {
                if (response.success) {
                    voteCountSpan.text(response.new_votes); // Update the vote count
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});

</script>

<script>
  const sortableHeaders = document.querySelectorAll('.sortable');

  sortableHeaders.forEach(header => {
    header.addEventListener('click', function() {
      const table = this.closest('table');
      const tbody = table.querySelector('tbody');
      const rowsArray = Array.from(tbody.rows);
      const sortDirection = this.dataset.sortDir === 'asc' ? 'desc' : 'asc';

      // Sort function based on the 'name' column
      rowsArray.sort((a, b) => {
        const nameA = a.cells[0].textContent.toLowerCase();
        const nameB = b.cells[0].textContent.toLowerCase();

        if (nameA < nameB) {
          return sortDirection === 'asc' ? -1 : 1;
        } else if (nameA > nameB) {
          return sortDirection === 'asc' ? 1 : -1;
        } else {
          return 0;
        }
      });

      // Update the table rows
      tbody.innerHTML = ''; // Clear existing rows
      rowsArray.forEach(row => tbody.appendChild(row));

      // Update sort direction
      this.dataset.sortDir = sortDirection;
    });
  });
</script>
