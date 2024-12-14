<?php
include 'db.php';

if (isset($_GET['batch_id'])) {
    $batch_id = $_GET['batch_id'];

    $query = "
        SELECT 
            a.attendance_date, 
            s.first_name, 
            a.status
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
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="attendance_batch_' . $batch_id . '.csv"');

            $output = fopen('php://output', 'w');

            fputcsv($output, ['Student Name', 'Attendance Date', 'Status']);

            while ($row = $result->fetch_assoc()) {
                fputcsv($output, [
                    $row['first_name'],
                    $row['attendance_date'],
                    $row['status']
                ]);
            }

            fclose($output);
        } else {
            echo 'No attendance records found for this batch.';
        }

        $stmt->close();
    } else {
        echo 'Error preparing the query.';
    }
} else {
    echo 'Invalid request.';
}

$conn->close();
?>
