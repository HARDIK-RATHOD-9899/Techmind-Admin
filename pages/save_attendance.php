<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendance_date = $_POST['attendance_date'];
    $batch_id = $_POST['batch_id'];
    $student_ids = $_POST['student_ids'];

    foreach ($student_ids as $student_id) {
        $status = $_POST["status_$student_id"];

        $stmt = $conn->prepare("INSERT INTO attendance (student_id, batch_id, attendance_date, status, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW()) ON DUPLICATE KEY UPDATE status = ?, updated_at = NOW()");
        $stmt->bind_param("iisss", $student_id, $batch_id, $attendance_date, $status, $status);
        $stmt->execute();
    }

    $_SESSION['attendance']='Attendance has been recorded.';
    $stmt->close();
    $conn->close();
    header('location:attendance.php');
}
?>
