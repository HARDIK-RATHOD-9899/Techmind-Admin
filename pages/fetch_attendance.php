    <?php
    include 'db.php'; 

    if (isset($_GET['batch_id'])) {
        $batch_id = $_GET['batch_id'];

        $query = "
            SELECT 
                a.attendance_date, 
                a.status, 
                s.first_name, 
                a.id AS attendance_id
            FROM attendance a
            JOIN students s ON a.student_id = s.id
            WHERE a.batch_id = ?
            ORDER BY a.attendance_date DESC
        ";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $batch_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<form id="deleteForm">';
                echo '<table id="attendanceTable" class="table table-bordered table-striped">';
                echo '<thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Student Name</th>
                            <th>Attendance Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>';
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="attendance_ids[]" value="' . htmlspecialchars($row['attendance_id']) . '"></td>';
                    echo '<td>' . htmlspecialchars($row['first_name']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['attendance_date']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                    echo '</tr>';
                }
                    echo '</tbody>';
                    echo '</table>';
                    echo '<button type="button" id="deleteSelected" class="btn btn-danger">Delete Selected</button>'; 
                    echo '</form>';
            } else {
                echo '<p>No attendance records found for this batch.</p>';
            }

            $stmt->close();
        } else {
            echo '<p>Error preparing the query.</p>';
        }
    } else {
        echo '<p>Invalid request.</p>';
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <script>
    $(document).ready(function() {
        $('#selectAll').click(function() {
            $('input[name="attendance_ids[]"]').prop('checked', this.checked);
        });

        $('#deleteSelected').click(function() {
            var selectedIds = $('input[name="attendance_ids[]"]:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length === 0) {
                alert('No records selected.');
                return;
            }

            if (confirm('Are you sure you want to delete the selected records?')) {
                $.ajax({
                    url: 'delete_attendance.php',
                    type: 'POST',
                    data: { attendance_ids: selectedIds },
                    success: function(response) {
                        alert(response);
                        location.reload(); 
                    },
                    error: function() {
                        alert('Failed to delete records.');
                    }
                });
            }
        });
    });

    </script>

    </body>
    </html>