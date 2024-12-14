<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
}
require_once('db.php');
$row = [];
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM students WHERE id = $id";
  $run = mysqli_query($conn, $sql);

  if ($run) {
    $row = mysqli_fetch_assoc($run);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 3 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <?php include_once('aside.php');?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="display_student.php">Pages</a>
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

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add Student</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        body {
          background-color: #f5f5f5;
          /* Light background for contrast */
          color: #333;
          /* Dark text for readability */
        }

        .form-container {
          background-color: #ffffff;
          border-radius: 8px;
          padding: 20px;
          box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
          max-width: 600px;
          margin: 40px auto;
        }

        .form-label {
          color: #000;
        }

        .btn-custom {
          background-color: #000;
          color: #fff;
        }

        .btn-custom:hover {
          background-color: #444;
        }

        .custom-alert {
          background-color: #d1e7dd;
          /* Light green background similar to Bootstrap's success alert */
          color: #0f5132;
          /* Dark green text */
          padding: 0.75rem 1.25rem;
          /* Similar padding to Bootstrap */
          margin: 10px 0;
          border: 1px solid #badbcc;
          border-radius: 0.25rem;
          position: relative;
          font-family: Arial, sans-serif;
          font-size: 16px;
          display: flex;
          align-items: center;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          /* Subtle shadow for depth */
        }

        .custom-alert-text {
          flex-grow: 1;
        }

        .custom-alert-close {
          background: none;
          border: none;
          color: #0f5132;
          font-size: 1.25rem;
          cursor: pointer;
          padding: 0 8px;
          line-height: 1;
        }

        .custom-alert-close:hover {
          color: #0a3622;
          /* Darker green on hover */
        }
      </style>
    </head>

    <body>

      <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 600px;">
          <h2 class="text-center mb-4">Update Student</h2>
          <form action="update_student_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">

            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name"
                value="<?php echo $row['first_name']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name"
                value="<?php echo $row['last_name']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>"
                required>
            </div>

            <div class="mb-3">
              <label for="contact_number" class="form-label">Contact Number</label>
              <input type="text" class="form-control" id="contact_number" name="contact_number"
                value="<?php echo $row['contact_number']; ?>">
            </div>

            <div class="mb-3">
              <label for="batch_id" class="form-label">Batch</label>
              <select class="form-select" id="batch_id" name="batch_id">
                <option selected disabled>Choose Batch</option>
                <?php
                $batchQuery = "SELECT * FROM batches";
                $batchResult = mysqli_query($conn, $batchQuery);
                while ($batch = mysqli_fetch_assoc($batchResult)) {
                  $selected = ($row['batch_id'] == $batch['id']) ? 'selected' : '';
                  echo "<option value='{$batch['id']}' {$selected}>{$batch['batch_name']} - {$batch['batch_timing']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="course_id" class="form-label">Course</label>
              <select class="form-select" id="course_id" name="course_id">
                <option selected disabled>Choose Course</option>
                <?php
                $courseQuery = "SELECT * FROM courses";
                $courseResult = mysqli_query($conn, $courseQuery);
                while ($course = mysqli_fetch_assoc($courseResult)) {
                  $selected = ($row['course_id'] == $course['id']) ? 'selected' : '';
                  echo "<option value='{$course['id']}' {$selected}>{$course['course_name']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="enrollment_date" class="form-label">Enrollment Date</label>
              <input type="date" class="form-control" id="enrollment_date" name="enrollment_date"
                value="<?php echo $row['enrollment_date']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="total_fee" class="form-label">Total Fee</label>
              <input type="number" step="0.01" class="form-control" id="total_fee" name="total_fee"
                value="<?php echo $row['total_fee']; ?>" required>
            </div>

            <div class="mb-3">
              <label for="paid_amount" class="form-label">Paid Amount</label>
              <input type="number" step="0.01" class="form-control" id="paid_amount" name="paid_amount"
                value="<?php echo $row['paid_amount']; ?>">
            </div>

            <div class="mb-3">
              <label for="due_amount" class="form-label">Due Amount (Auto-calculated)</label>
              <input type="number" step="0.01" class="form-control" id="due_amount" name="due_amount"
                value="<?php echo $row['due_amount']; ?>" readonly>
            </div>

            <div class="mb-3">
              <label for="profile_image" class="form-label">Profile Image</label>
              <?php if (!empty($row['profile_image'])): ?>
                <img src="uploads/<?php echo $row['profile_image']; ?>" alt="Profile Image" width="100" class="mb-2">
              <?php endif; ?>
              <input type="file" class="form-control" id="profile_image" name="profile_image">
            </div>

            <button type="submit" name="submit" class="btn btn-custom w-100">Update Student</button>
          </form>
        </div>
      </div>

      <!-- Include Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["M", "T", "W", "T", "F", "S", "S"],
          datasets: [{
            label: "Views",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#43A047",
            data: [50, 45, 22, 28, 50, 60, 76],
            barThickness: 'flex'
          },],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                color: '#e5e5e5'
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 10,
                font: {
                  size: 14,
                  lineHeight: 2
                },
                color: "#737373"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                  size: 14,
                  lineHeight: 2
                },
              }
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
          datasets: [{
            label: "Sales",
            tension: 0,
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "#43A047",
            pointBorderColor: "transparent",
            borderColor: "#43A047",
            backgroundColor: "transparent",
            fill: true,
            data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              callbacks: {
                title: function (context) {
                  const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                  return fullMonths[context[0].dataIndex];
                }
              }
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [4, 4],
                color: '#e5e5e5'
              },
              ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                  size: 12,
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                  size: 12,
                  lineHeight: 2
                },
              }
            },
          },
        },
      });

      var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

      new Chart(ctx3, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Tasks",
            tension: 0,
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "#43A047",
            pointBorderColor: "transparent",
            borderColor: "#43A047",
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [4, 4],
                color: '#e5e5e5'
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#737373',
                font: {
                  size: 14,
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [4, 4]
              },
              ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                  size: 14,
                  lineHeight: 2
                },
              }
            },
          },
        },
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