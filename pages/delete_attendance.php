<?php
include 'db.php';

if (isset($_POST['attendance_ids']) && is_array($_POST['attendance_ids'])) {
    $attendance_ids = $_POST['attendance_ids'];

    $placeholders = implode(',', array_fill(0, count($attendance_ids), '?'));
    $query = "DELETE FROM attendance WHERE id IN ($placeholders)";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param(str_repeat('i', count($attendance_ids)), ...$attendance_ids);
        if ($stmt->execute()) {
            echo 'Selected records deleted successfully.';
        } else {
            echo 'Failed to delete records.';
        }
        $stmt->close();
    } else {
        echo 'Error preparing the query.';
    }
} else {
    echo 'No records selected.';
}

$conn->close();
?>
