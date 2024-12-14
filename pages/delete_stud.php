<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
require_once('db.php');
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM `students` WHERE `id` = '$id'";
    $run = mysqli_query($conn,$sql);

    if($run){
        $_SESSION['delete']='User Deleted Successfully!!';
        header('location:display_student.php');
        exit();
    }
}
$conn->close();
?>