<?php
session_start();
require_once('db.php');

if(isset($_REQUEST['submit'])){
$username   =   $_REQUEST['username'];
$password   =   $_REQUEST['password'];
$Errors     =   [];

if(empty($username)){
    $Errors[]='Empty Username!!';
}

if(empty($password)){
    $Errors[]='Empty Password!!';
}

if(count($Errors) > 0){
    $_SESSION['Error'] = implode('<br>',$Errors);
}

$sql        = "SELECT * FROM `users` WHERE username = '$username'";
$run        =  mysqli_query($conn,$sql);

if($run->num_rows > 0){
    $row = $run->fetch_assoc();
    if(password_verify($password,$row['password'])){
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit();
    }else{
        $_SESSION['Error']='Invalid Password!!';
    }
}else{
    $_SESSION['Error'] = 'Username Not Found!!';
}
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootswatch Theme (Litera) -->
    <link href="https://bootswatch.com/5/lumen/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Login to Your Account</h4>
                    </div>
                    <?php 
                        if(isset($_SESSION['Error'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                            echo $_SESSION['Error']; 
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                        }
                    ?>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required placeholder="Enter your username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password">
                            </div>
        
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="register.php" class="text-muted">Don't have an account? Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
