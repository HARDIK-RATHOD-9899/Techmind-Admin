<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
require_once('db.php');

if(isset($_REQUEST['submit'])){
$first_name         =   $_REQUEST['first_name'];
$last_name          =   $_REQUEST['last_name'];
$email              =   $_REQUEST['email'];
$contact_number     =   $_REQUEST['contact_number'];
$batch_id           =   $_REQUEST['batch_id'];
$course_id          =   $_REQUEST['course_id'];
$enrollment_date    =   $_REQUEST['enrollment_date'];
$total_fee          =   $_REQUEST['total_fee'];
$paid_amount        =   $_REQUEST['paid_amount'];
$due_amount	        =   $_REQUEST['due_amount'];
$installment_amount =   $_REQUEST['installment_amount'];
$installments       =   $_REQUEST['installments'];
$profile_image = null;
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $image_dir = 'uploads/';
        $image_name = time() . '_' . basename($_FILES['profile_image']['name']);
        $target_file = $image_dir . $image_name;

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
            $profile_image = $image_name;
        }
    }

    $sql = "INSERT INTO students (first_name, last_name, email, contact_number, batch_id, course_id, enrollment_date , total_fee, paid_amount,due_amount,installment_amount, installments, profile_image) 
            VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$batch_id', '$course_id', '$enrollment_date', '$total_fee', '$paid_amount','$due_amount', '$installment_amount' , '$installments' ,'$profile_image')";
           
    $run = mysqli_query($conn,$sql);

    if($run){
       $_SESSION['insert'] = 'Data Inserted Successfully!!';
       header('location:student.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>