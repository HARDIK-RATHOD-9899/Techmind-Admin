<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

include('db.php');

$sql = "SELECT id, CONCAT(first_name, ' ', last_name) AS full_name FROM students";
$result = mysqli_query($conn, $sql);
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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        .receipt-container {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            margin: 1.5rem auto;
            max-width: 600px;
        }

        .receipt-header {
            background: linear-gradient(195deg, #66BB6A 0%, #43A047 100%);
            border-radius: 0.75rem 0.75rem 0 0;
            padding: 1.5rem;
            text-align: center;
            color: #fff;
        }

        .receipt-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0.5rem 0;
        }

        .receipt-header h4 {
            font-size: 1rem;
            font-weight: 400;
            opacity: 0.8;
        }

        .company-logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
            background: white;
            padding: 8px;
            border-radius: 8px;
        }

        .receipt-body {
            padding: 2rem;
        }

        .receipt-body h4 {
            color: #344767;
            font-size: 1rem;
            font-weight: 600;
            margin: 1.5rem 0 1rem;
        }

        .receipt-body p {
            color: #67748e;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .receipt-body strong {
            color: #344767;
            font-weight: 600;
        }

        .receipt-table {
            width: 100%;
            margin: 1rem 0;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 1rem;
            font-size: 0.875rem;
        }

        .receipt-table th {
            color: #344767;
            font-weight: 600;
            background-color: #f8f9fa;
            text-align: left;
            border-radius: 0.5rem 0 0 0.5rem;
        }

        .receipt-table td {
            color: #67748e;
            background-color: #fff;
            border-radius: 0 0.5rem 0.5rem 0;
            box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1), 0 1px 2px 0 rgba(0,0,0,0.06);
        }

        .receipt-footer {
            padding: 1.5rem;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .btn-download {
            background: linear-gradient(195deg, #66BB6A 0%, #43A047 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            border: none;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 3px 3px 0 rgba(67, 160, 71, 0.15), 
                       0 3px 1px -2px rgba(67, 160, 71, 0.2), 
                       0 1px 5px 0 rgba(67, 160, 71, 0.15);
        }

        .btn-download:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 26px -12px rgba(67, 160, 71, 0.4), 
                       0 4px 23px 0 rgba(67, 160, 71, 0.15), 
                       0 8px 10px -5px rgba(67, 160, 71, 0.2);
        }

        /* Student selection styling */
        .student-select-container {
            padding: 1rem 2rem;
            text-align: center;
        }

        .form-select {
            width: 50%;
            padding: 0.75rem;
            border: 1px solid #d2d6da;
            border-radius: 0.375rem;
            color: #495057;
            font-size: 0.875rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            margin: 0 auto;
            display: inline-block;
        }

        .form-select:focus {
            border-color: #43A047;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(67, 160, 71, 0.25);
        }

        .form-label {
            color: #344767;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
    </style>
</head>

<body>

    <?php include_once('aside.php');?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="display_student.php">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Display Students</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-3 d-flex align-items-center">
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                       <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown d-flex align-items-center">
                            <a href="#" class="nav-link text-body font-weight-bold px-0 dropdown-toggle"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        
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
        
        <div class="container mt-5">
            <h2 class="text-center">Installment Receipt</h2>

            <!-- Dropdown to select student -->
            <div class="mb-3 text-center">
                <label for="student" class="form-label">Select Student</label>
                <div class="d-flex justify-content-center">
                    <select class="form-select" id="student" onchange="fetchReceiptDetails()" style="width: 300px;">
                        <option value="">Select a Student</option>
                        <?php
                        // Loop through the result to populate the dropdown
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['full_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Receipt Container -->
            <div id="receipt" class="receipt-container" style="display:none;">
                <div class="receipt-header">
                    <img src="../assets/img/TechMind.png" class="company-logo" alt="Company Logo">
                    <h2>Installment Receipt</h2>
                    <h4>Payment Confirmation</h4>
                </div>
                <div class="receipt-body">
                    <h4>Student Details</h4>
                    <p><strong>Student Name:</strong> <span id="student_name"></span></p>
                    <p><strong>Email:</strong> <span id="student_email"></span></p>
                    <p><strong>Contact Number:</strong> <span id="student_contact"></span></p>

                    <h4>Payment Details</h4>
                    <table class="receipt-table">
                        <tr>
                            <th>Total Fee</th>
                            <td>₹<span id="total_fee"></span></td>
                        </tr>
                        <tr>
                            <th>Paid Amount</th>
                            <td>₹<span id="paid_amount"></span></td>
                        </tr>
                        <tr>
                            <th>Due Amount</th>
                            <td>₹<span id="due_amount"></span></td>
                        </tr>
                        <tr>
                            <th>Installment Amount</th>
                            <td>₹<span id="installment_amount"></span></td>
                        </tr>
                    </table>
                </div>

                <div class="receipt-footer">
                    <button class="btn-download" id="downloadPDF">
                        <i class="fas fa-download me-2"></i> Download Receipt
                    </button>
                </div>
            </div>
        </div>

        <script>
            // Function to fetch receipt details when a student is selected
            function fetchReceiptDetails() {
                var student_id = $('#student').val();
                if (student_id != "") {
                    $.ajax({
                        url: 'fetch_receipt.php',
                        method: 'GET',
                        data: {
                            student_id: student_id
                        },
                        success: function (response) {
                            var data = JSON.parse(response);
                            if (data.success) {
                                $('#student_name').text(data.student_name);
                                $('#student_email').text(data.email);
                                $('#student_contact').text(data.contact_number);
                                $('#total_fee').text(data.total_fee);
                                $('#paid_amount').text(data.paid_amount);
                                $('#due_amount').text(data.due_amount);
                                $('#installment_amount').text(data.installment_amount);
                                $('#receipt').show();
                            } else {
                                alert('No data found!');
                                $('#receipt').hide();
                            }
                        }
                    });
                } else {
                    $('#receipt').hide();
                }
            }

            // Function to download the receipt as PDF
            $('#downloadPDF').click(function () {
                var element = document.getElementById('receipt');
                var opt = {
                    margin: 1,
                    filename: 'installment_receipt.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 4
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(element).set(opt).save();
            });
        </script>

</body>

</html>