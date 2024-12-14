<?php
session_start();
require_once('db.php');

if (isset($_REQUEST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password']; 

    $Errors = [];

    if (empty($name)) {
        $Errors[] = "Name is required.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $Errors[] = "Only letters and spaces are allowed in the name.";
    }

    if (empty($username)) {
        $Errors[] = "Username is required.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $Errors[] = "Only letters, numbers, and underscores are allowed in the username.";
    }

    if (empty($email)) {
        $Errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Errors[] = "Invalid email format.";
    }

    if (empty($contact)) {
        $Errors[] = "Contact number is required.";
    } elseif (!is_numeric($contact)) {
        $Errors[] = "Only numeric values are allowed for contact.";
    }

    if (empty($password)) {
        $Errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $Errors[] = "Password must be at least 8 characters long.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    if (count($Errors) > 0) {
        $_SESSION['Error'] = implode('<br>', $Errors);
        header('Location: register.php');
        exit();
    }

    $sql = "SELECT * FROM users WHERE `username` = '$username' OR `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['Error'] = "User already exists!!";
    } else {
        $sql = "INSERT INTO `users`(`name`, `username`, `email`, `password`, `contact`, `created_at`, `updated_at`) 
                VALUES ('$name','$username','$email','$hashedPassword','$contact', NOW(), NOW())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['success'] = "User registered!!!";
        } else {
            $_SESSION['Error'] = "Error in registration.";
        }
    }

    header('Location: register.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link href="https://bootswatch.com/5/lumen/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Register a New Account</h4>
                    </div>
                    <?php 
                    if(isset($_SESSION['success'])){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        echo $_SESSION['success'];
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    
                    if(isset($_SESSION['Error'])){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo $_SESSION['Error']; 
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>
                    <div class="card-body">
                        <form action="register.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="name">Enter Name</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    placeholder="Enter your full name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required
                                    placeholder="Choose a username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" required
                                    placeholder="Enter your email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact">Contact Number</label>
                                <input type="text" name="contact" id="contact" class="form-control" required
                                    placeholder="Enter your contact number">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required
                                    placeholder="Enter a strong password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary"><i
                                        class="fas fa-user-plus"></i> Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php" class="text-muted">Already have an account? Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
