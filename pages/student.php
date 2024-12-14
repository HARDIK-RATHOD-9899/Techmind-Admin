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
  <title>Add Student - TechMind</title>

  <!-- Material Dashboard CSS -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <style>
    .form-container {
      background-color: var(--bs-card-bg);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      margin: 20px auto;
    }

    .dark-version .form-container {
      background-color: #1a2035;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .input-group.input-group-outline {
      background-color: transparent;
    }

    .dark-version .input-group.input-group-outline .form-control {
      border-color: rgba(255, 255, 255, 0.1);
      color: #fff;
    }

    .dark-version .form-label {
      color: rgba(255, 255, 255, 0.8);
    }

    .dark-version .form-select {
      background-color: #1a2035;
      color: #fff;
      border-color: rgba(255, 255, 255, 0.1);
    }

    .custom-alert {
      background-color: rgba(209, 231, 221, 0.1);
      border: 1px solid rgba(186, 219, 204, 0.2);
      color: #0f5132;
      padding: 1rem;
      margin-bottom: 1.5rem;
      border-radius: 10px;
    }

    .dark-version .custom-alert {
      background-color: rgba(209, 231, 221, 0.05);
      color: #badbcc;
    }

    .custom-alert-close {
      float: right;
      font-size: 1.5rem;
      font-weight: bold;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .5;
      background: transparent;
      border: none;
    }

    .dark-version .custom-alert-close {
      color: #fff;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
    id="sidenav-main">
    <?php include_once('aside.php'); ?>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Student</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Student</h6>
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
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
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
                          xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
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
              <a href="#" class="nav-link text-body font-weight-bold px-0 dropdown-toggle" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <div class="container-fluid py-4">
      <div class="form-container bg-dark text-light rounded-3 p-4 shadow-lg">
        <h3 class="text-center mb-4 text-light">Add New Student</h3>

        <?php
        if (isset($_SESSION['insert'])) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
          echo '<span>' . $_SESSION['insert'] . '</span>';
          echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>';
          echo '</div>';
        }
        ?>

        <form action="insert_student.php" method="POST" enctype="multipart/form-data">
          <div class="row g-3">
            <!-- Personal Information -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control form-control-dark bg-secondary text-light" id="firstName"
                  name="first_name" required placeholder="First Name">
                <label for="firstName" class="text-light">First Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control form-control-dark bg-secondary text-light" id="lastName"
                  name="last_name" required placeholder="Last Name">
                <label for="lastName" class="text-light">Last Name</label>
              </div>
            </div>

            <!-- Contact Information -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="email" class="form-control form-control-dark bg-secondary text-light" id="email"
                  name="email" required placeholder="Email">
                <label for="email" class="text-light">Email</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control form-control-dark bg-secondary text-light" id="contactNumber"
                  name="contact_number" placeholder="Contact Number">
                <label for="contactNumber" class="text-light">Contact Number</label>
              </div>
            </div>

            <!-- Batch and Course -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select form-select-dark bg-secondary text-light" id="batchSelect" name="batch_id"
                  required>
                  <option value="" disabled selected>Choose Batch</option>
                  <?php
                  $sql = "SELECT * FROM batches WHERE 1";
                  $run = mysqli_query($conn, $sql);
                  if ($run) {
                    while ($row = mysqli_fetch_assoc($run)) {
                      echo '<option value="' . $row['id'] . '">' . $row['batch_name'] . '-' . $row['batch_timing'] . '</option>';
                    }
                  }
                  ?>
                </select>
                <label for="batchSelect" class="text-light">Batch</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <select class="form-select form-select-dark bg-secondary text-light" id="courseSelect" name="course_id"
                  required>
                  <option value="" disabled selected>Choose Course</option>
                  <?php
                  $sql = "SELECT * FROM courses WHERE 1";
                  $run = mysqli_query($conn, $sql);
                  if ($run) {
                    while ($row = mysqli_fetch_assoc($run)) {
                      echo '<option value="' . $row['id'] . '">' . $row['course_name'] . '</option>';
                    }
                  }
                  ?>
                </select>
                <label for="courseSelect" class="text-light">Course</label>
              </div>
            </div>

            <!-- Enrollment and Fee Details -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control form-control-dark bg-secondary text-light" id="enrollmentDate"
                  name="enrollment_date" required>
                <label for="enrollmentDate" class="text-light">Enrollment Date</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="number"  class="form-control form-control-dark bg-secondary text-light"
                  id="totalFee" name="total_fee" required oninput="updateDueAmount()">
                <label for="totalFee" class="text-light">Total Fee</label>
              </div>
            </div>

            <!-- Installment Details -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="number" step="0.01" class="form-control form-control-dark bg-secondary text-light"
                  id="installmentAmount" name="installment_amount" oninput="calculateInstallments()">
                <label for="installmentAmount" class="text-light">Installment Amount</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="number" class="form-control form-control-dark bg-secondary text-light" id="installments"
                  name="installments" oninput="calculateInstallments()" required>
                <label for="installments" class="text-light">Number of Installments</label>
              </div>
            </div>

            <!-- Payment Details -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="number" step="0.01" class="form-control form-control-dark bg-secondary text-light"
                  id="paidAmount" name="paid_amount" readonly>
                <label for="paidAmount" class="text-light">Paid Amount</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="number" step="0.01" class="form-control form-control-dark bg-secondary text-light"
                  id="dueAmount" name="due_amount" readonly>
                <label for="dueAmount" class="text-light">Due Amount</label>
              </div>
            </div>

            <!-- Profile Image and Submit -->
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="file" class="form-control form-control-dark bg-secondary text-light" id="profileImage"
                  name="profile_image">
                <label for="profileImage" class="text-light">Profile Image</label>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-end">
              <button type="submit" name="submit" class="btn btn-primary w-100">Add Student</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script>
    function updateDueAmount() {
      const totalFee = parseFloat(document.getElementById('totalFee').value) || 0;
      const paidAmount = parseFloat(document.getElementById('paidAmount').value) || 0;
      const dueAmount = totalFee - paidAmount;
      document.getElementById('dueAmount').value = dueAmount.toFixed(2);
    }

    function calculateInstallments() {
      const installmentAmount = parseFloat(document.getElementById('installmentAmount').value) || 0;
      const installments = parseInt(document.getElementById('installments').value) || 0;
      const paidAmount = installmentAmount * installments;
      document.getElementById('paidAmount').value = paidAmount.toFixed(2);
      updateDueAmount();
    }

  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>

</body>

</html>