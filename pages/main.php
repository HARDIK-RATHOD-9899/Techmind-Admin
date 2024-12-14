
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
 Techmind Admin
  </title>
  <!--     Fonts and icons     -->
  <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" /> -->
  <!-- Nucleo Icons -->
  <!-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" /> -->
  <!-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
  <!-- Font Awesome Icons -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
  <!-- Material Icons -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" /> -->
  <!-- CSS Files -->
  <!-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" /> -->
<!-- <style>
  /* Dark Theme Variables with Enhanced Text Colors */
  :root {
    --primary: #764BA2;      /* Purple */
    --secondary: #667EEA;    /* Blue-Purple */
    --dark-bg: #1A1C1E;      /* Dark Background */
    --card-bg: #2D2F31;      /* Card Background */
    --darker-card-bg: #242628; /* Darker Card Background */
    --text-primary: #FFFFFF; /* Pure White for Primary Text */
    --text-secondary: #E4E6EB; /* Light Gray for Secondary Text */
    --text-muted: #B0B3B8;   /* Muted Text Color */
    --border-color: rgba(255,255,255,0.1);
    --hover-color: rgba(118, 75, 162, 0.2);
  }

  /* Text Color Overrides */
  body, 
  .card,
  .card-header,
  .card-body,
  .card-footer,
  .nav-link,
  .navbar-brand,
  h1, h2, h3, h4, h5, h6,
  .h1, .h2, .h3, .h4, .h5, .h6 {
    color: var(--text-primary) !important;
  }

  /* Secondary Text Colors */
  .text-secondary,
  .text-sm,
  .text-xs,
  .text-muted,
  .description,
  .card small,
  .text-dark {
    color: var(--text-secondary) !important;
  }

  /* Table Text Colors */
  .table {
    color: var(--text-primary) !important;
  }

  .table thead th {
    color: var(--text-secondary) !important;
    font-weight: 600 !important;
  }

  /* Input Text Colors */
  .form-control,
  .input-group-outline input,
  .input-group-outline textarea {
    color: var(--text-primary) !important;
  }

  .input-group-outline label {
    color: var(--text-secondary) !important;
  }

  /* Sidebar Navigation */
  .sidenav .nav-link {
    color: var(--text-secondary) !important;
  }

  .sidenav .nav-link.active {
    color: white !important;
  }

  .sidenav .nav-link:hover:not(.active) {
    color: var(--text-primary) !important;
  }

  /* Breadcrumb */
  .breadcrumb-item,
  .breadcrumb-item a,
  .breadcrumb-item + .breadcrumb-item::before {
    color: var(--text-secondary) !important;
  }

  /* Global Dark Theme */
  body, 
  .g-sidenav-show, 
  .g-sidenav-show .g-sidenav-pinned {
    background-color: var(--dark-bg) !important;
    color: var(--text-primary) !important;
  }

  /* Navbar */
  .navbar-main,
  .navbar-vertical,
  .navbar {
    background-color: var(--card-bg) !important;
    border-color: var(--border-color) !important;
  }

  /* Sidebar */
  .sidenav,
  .sidenav.bg-white,
  #sidenav-main {
    background-color: var(--card-bg) !important;
    border-color: var(--border-color) !important;
  }

  .sidenav .navbar-brand,
  .sidenav .navbar-heading {
    color: var(--text-primary) !important;
  }

  .sidenav .nav-link,
  .sidenav .nav-link .material-symbols-rounded,
  .sidenav .nav-link .nav-link-text {
    color: var(--text-secondary) !important;
  }

  .sidenav .nav-link.active,
  .sidenav .nav-link.active .material-symbols-rounded,
  .sidenav .nav-link.active .nav-link-text {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white !important;
  }

  .sidenav hr.horizontal {
    background-color: var(--border-color) !important;
  }

  /* Cards */
  .card,
  .card-header,
  .card-body,
  .card-footer {
    background-color: var(--card-bg) !important;
    border-color: var(--border-color) !important;
    color: var(--text-primary) !important;
  }

  /* Tables */
  .table,
  .table thead th,
  .table tbody td {
    color: var(--text-primary) !important;
    border-color: var(--border-color) !important;
  }

  .table thead tr {
    background-color: var(--darker-card-bg) !important;
  }

  /* Inputs */
  .input-group,
  .input-group-outline,
  .form-control {
    background-color: var(--darker-card-bg) !important;
    border-color: var(--border-color) !important;
    color: var(--text-primary) !important;
  }

  .input-group-outline label {
    color: var(--text-secondary) !important;
  }

  .input-group-outline .form-control:focus {
    border-color: var(--primary) !important;
  }

  /* Buttons */
  .btn-outline-dark {
    color: var(--text-primary) !important;
    border-color: var(--border-color) !important;
  }

  .btn-outline-dark:hover {
    background-color: var(--primary) !important;
    color: white !important;
  }

  .fixed-plugin .btn {
    background: var(--card-bg) !important;
    color: var(--text-primary) !important;
  }

  /* Dropdowns */
  .dropdown-menu {
    background-color: var(--darker-card-bg) !important;
    border-color: var(--border-color) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
  }

  .dropdown-item {
    color: var(--text-primary) !important;
  }

  .dropdown-item:hover {
    background-color: var(--hover-color) !important;
  }

  /* Charts */
  .chart-canvas {
    filter: brightness(0.8) !important;
  }

  /* Timeline */
  .timeline-block {
    border-left-color: var(--primary) !important;
  }

  .timeline-step {
    background-color: var(--darker-card-bg) !important;
    border-color: var(--primary) !important;
  }

  /* Breadcrumb */
  .breadcrumb-item,
  .breadcrumb-item a,
  .breadcrumb-item + .breadcrumb-item::before {
    color: var(--text-secondary) !important;
  }

  /* Fixed Plugin */
  .fixed-plugin .card {
    background-color: var(--card-bg) !important;
  }

  /* Progress Bars */
  .progress {
    background-color: var(--darker-card-bg) !important;
  }

  .progress-bar {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
  }

  /* Icons */
  .material-symbols-rounded,
  .fa,
  .fas,
  .far,
  .fab {
    color: var(--text-primary) !important;
  }

  /* Avatar Groups */
  .avatar-group .avatar {
    border-color: var(--card-bg) !important;
  }

  /* Footer */
  .footer {
    background-color: var(--card-bg) !important;
    border-top: 1px solid var(--border-color) !important;
  }

  .footer .copyright {
    color: var(--text-secondary) !important;
  }

  /* Scrollbar */
  ::-webkit-scrollbar {
    width: 8px;
    height: 8px;
  }

  ::-webkit-scrollbar-track {
    background: var(--dark-bg);
  }

  ::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 4px;
  }

  /* Tooltips */
  .tooltip .tooltip-inner {
    background-color: var(--darker-card-bg) !important;
    color: var(--text-primary) !important;
  }

  /* Badge */
  .badge {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
  }

  /* Links */
  a {
    color: var(--primary) !important;
  }

  a:hover {
    color: var(--secondary) !important;
  }

  /* Stats Cards Icons */
  .icon-shape {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
    box-shadow: 0 4px 10px rgba(118, 75, 162, 0.3) !important;
  }

  /* Transitions */
  .card,
  .btn,
  .nav-link,
  .dropdown-item {
    transition: all 0.3s ease !important;
  }

  /* Hover Effects */
  .card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  }

  .nav-link:hover .material-symbols-rounded {
    transform: scale(1.1);
  }
</style> -->
</head>

<body class="g-sidenav-show  bg-gray-100">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
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
 
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="material-symbols-rounded">account_circle</i>
              </a>
            </li>
          </ul> 
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-2">
      <div class="row">
        <div class="ms-3">
          <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
          <p class="mb-4">
            Check the sales, value and bounce rate by country.
          </p>
        </div>
   
      </div>
 
    </div>
  </main>


  <!--   Core JS Files   -->
  <!-- <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script> -->
  <!-- <script>
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
        }, ],
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
              title: function(context) {
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
  </script> -->
  <!-- <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> -->
  <!-- Github buttons -->
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script> -->
</body>

</html>