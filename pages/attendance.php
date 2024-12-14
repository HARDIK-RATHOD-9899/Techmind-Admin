<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TechMind</title>
    
    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <style>
        .g-sidenav-show:not(.g-sidenav-hidden) .main-content {
            margin-left: 17.125rem !important;
        }
        
        .navbar.navbar-main {
            margin-top: 1rem;
            z-index: 100;
        }

        .sidenav {
            z-index: 1000;
        }

        @media (max-width: 1200px) {
            .g-sidenav-show:not(.g-sidenav-hidden) .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <?php include_once('aside.php'); ?>
    </aside>
    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown d-flex align-items-center">
                            <a href="#" class="nav-link text-body font-weight-bold px-0 dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-rounded">account_circle</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?></a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Take Attendance</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Batch Selection Form -->
                            <div class="row justify-content-center mb-4">
                                <div class="col-md-8">
                                    <form id="batchForm">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="batch" class="ms-0">Select Batch</label>
                                            <select name="batch_id" id="batch" class="form-control" required>
                                                <option value="">--Select Batch--</option>
                                                <?php 
                                                $sql = "SELECT id, batch_name FROM batches";
                                                $result = $conn->query($sql);
                                                while ($batch = $result->fetch_assoc()) { 
                                                ?>
                                                    <option value="<?php echo $batch['id']; ?>">
                                                        <?php echo $batch['batch_name']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Attendance Form -->
                            <div id="attendanceForm" style="display:none;">
                                <form action="save_attendance.php" method="POST">
                                    <input type="hidden" name="batch_id" id="batch_id">
                                    
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0" id="studentsTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student ID</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Students will be loaded here -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label for="attendance_date">Attendance Date</label>
                                                <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn bg-gradient-primary">
                                                <i class="fas fa-save me-2"></i>Submit Attendance
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Core JS Files -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Your custom scripts -->
    <script>
        $(document).ready(function () {
            $('#batch').change(function () {
                const batchId = $(this).val();

                if (batchId) {
                    $.ajax({
                        url: 'fetch_students.php',
                        type: 'POST',
                        data: { batch_id: batchId },
                        success: function (response) {
                            $('#studentsTable').find("tr:gt(0)").remove();
                            $('#studentsTable').append(response);
                            $('#attendanceForm').show();
                            $('#batch_id').val(batchId);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error occurred:", status, error);
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#attendanceForm').hide();
                }
            });
        });

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // Sidenav toggle for mobile
        document.addEventListener('DOMContentLoaded', function() {
            const iconNavbarSidenav = document.getElementById('iconNavbarSidenav');
            const body = document.getElementsByTagName('body')[0];
            
            if (iconNavbarSidenav) {
                iconNavbarSidenav.addEventListener('click', function() {
                    body.classList.toggle('g-sidenav-pinned');
                    body.classList.toggle('g-sidenav-hidden');
                });
            }
        });
    </script>

    <!-- Control Center for Material Dashboard -->
    <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>
</html>