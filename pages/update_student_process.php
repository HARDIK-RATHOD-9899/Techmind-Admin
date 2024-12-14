<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $batch_id = $_POST['batch_id'];
    $course_id = $_POST['course_id'];
    $enrollment_date = $_POST['enrollment_date'];
    $total_fee = $_POST['total_fee'];
    $paid_amount = $_POST['paid_amount'];
    $due_amount = $total_fee - $paid_amount;

    $profile_image = $_FILES['profile_image'];
    $upload_dir = 'uploads/'; 
    $profile_image_name = '';

    if (!empty($profile_image['name'])) {
        $profile_image_name = time() . '_' . basename($profile_image['name']);
        $target_file = $upload_dir . $profile_image_name;

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($profile_image['type'], $allowed_types) && $profile_image['size'] <= 2 * 1024 * 1024) {
            if (!move_uploaded_file($profile_image['tmp_name'], $target_file)) {
                die('Error uploading file.');
            }
        } else {
            die('Invalid file type or file too large.');
        }
    }

    $sql = "UPDATE students 
            SET 
                first_name = ?, 
                last_name = ?, 
                email = ?, 
                contact_number = ?, 
                batch_id = ?, 
                course_id = ?, 
                enrollment_date = ?, 
                total_fee = ?, 
                paid_amount = ?, 
                due_amount = ?, 
                profile_image = IF(? != '', ?, profile_image)
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'sssssssdddssi', 
        $first_name, 
        $last_name, 
        $email, 
        $contact_number, 
        $batch_id, 
        $course_id, 
        $enrollment_date, 
        $total_fee, 
        $paid_amount, 
        $due_amount, 
        $profile_image_name, 
        $profile_image_name, 
        $id
    );

    if ($stmt->execute()) {
        echo "Student record updated successfully.";
        header('Location: display_student.php'); 
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
