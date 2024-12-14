<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

include('db.php');

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $sql = "SELECT first_name, last_name, email, contact_number, total_fee, paid_amount, due_amount, installment_amount 
            FROM students WHERE id = $student_id";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = [
            'success' => true,
            'student_name' => $row['first_name'] . ' ' . $row['last_name'],
            'email' => $row['email'],
            'contact_number' => $row['contact_number'],
            'total_fee' => $row['total_fee'],
            'paid_amount' => $row['paid_amount'],
            'due_amount' => $row['due_amount'],
            'installment_amount' => $row['installment_amount']
        ];
        echo json_encode($data);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
