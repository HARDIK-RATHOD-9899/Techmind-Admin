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
</head>

<body class="g-sidenav-show bg-gray-200">
    <?php include_once('aside.php');?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps-4">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg mt-4 top-0 px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" 
             data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Attendance</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Attendance Records</h6>
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
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Attendance Management</h6>
                            </div>
                        </div>
                        <div class="card-body px-4 pb-2">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <form id="batchForm">
                                        <div class="input-group input-group-outline">
                                            <label for="batch" class="form-label">Select Batch</label>
                                            <select name="batch_id" id="batch" class="form-control" required>
                                                <option value="">--Select Batch--</option>
                                                <?php
                                                include 'db.php';
                                                $sql = "SELECT id, batch_name FROM batches";
                                                $result = $conn->query($sql);
                                                while ($batch = $result->fetch_assoc()) {
                                                    echo '<option value="' . $batch['id'] . '">' . htmlspecialchars($batch['batch_name']) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a id="exportExcel" class="btn btn-success" href="#" style="display: none;">
                                        <i class="material-icons">download</i> Export to Excel
                                    </a>
                                </div>
                            </div>
                            
                            <div id="attendance-container" class="table-responsive p-0">
                                <!-- Attendance data will be loaded here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .main-content {
            margin-left: 17.125rem;
            transition: 0.3s ease;
        }
        
        .table-responsive {
            min-height: 300px;
        }

        @media (max-width: 1199.98px) {
            .main-content {
                margin-left: 0;
            }
        }

        .card {
            margin-bottom: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#batch').change(function () {
                var batchId = $(this).val();
                if (batchId) {
                    // Enable and set the Export button link
                    $('#exportExcel').show();
                    $('#exportExcel').attr('href', 'export_attendance.php?batch_id=' + batchId);

                    // Fetch attendance records
                    $.ajax({
                        url: 'fetch_attendance.php',
                        type: 'GET',
                        data: { batch_id: batchId },
                        success: function (response) {
                            $('#attendance-container').html(response);
                            $('#attendanceTable').DataTable({
                                pageLength: 10,
                                order: [[1, 'desc']]
                            });
                        },
                        error: function () {
                            alert('Failed to fetch attendance records.');
                        }
                    });
                } else {
                    $('#attendance-container').html('');
                    $('#exportExcel').hide();
                }
            });
        });
    </script>

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>