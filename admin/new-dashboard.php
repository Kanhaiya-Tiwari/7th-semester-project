<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// Get total students count
$result = $mysqli->query("SELECT COUNT(*) as total FROM registration");
$studentCount = $result->fetch_assoc()['total'];

// Get total rooms count
$result = $mysqli->query("SELECT COUNT(*) as total FROM rooms");
$roomCount = $result->fetch_assoc()['total'];

// Get total courses count
$result = $mysqli->query("SELECT COUNT(*) as total FROM courses");
$courseCount = $result->fetch_assoc()['total'];

// Get new complaints count
$result = $mysqli->query("SELECT COUNT(*) as total FROM complaint WHERE status = 'pending'");
$newComplaintCount = $result->fetch_assoc()['total'];

// Get recent activities
$recentActivities = [];
$result = $mysqli->query("SELECT * FROM adminlog ORDER BY id DESC LIMIT 5");
while ($row = $result->fetch_assoc()) {
    $recentActivities[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hostel Management System</title>
    
    <!-- Include the new header -->
    <?php include('includes/new-header.php'); ?>
    
    <style>
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(58, 59, 69, 0.15);
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.25rem;
            font-weight: 700;
            color: #4e73df;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
        
        .stat-card {
            border-left: 0.25rem solid #4e73df;
            border-radius: 0.5rem;
            background-color: #fff;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card.primary {
            border-left-color: #4e73df;
        }
        
        .stat-card.success {
            border-left-color: #1cc88a;
        }
        
        .stat-card.info {
            border-left-color: #36b9cc;
        }
        
        .stat-card.warning {
            border-left-color: #f6c23e;
        }
        
        .stat-card .stat-card-title {
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            color: #858796;
            margin-bottom: 0.25rem;
            letter-spacing: 0.5px;
        }
        
        .stat-card .stat-card-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #5a5c69;
            margin-bottom: 0.5rem;
        }
        
        .stat-card .stat-card-icon {
            font-size: 2rem;
            opacity: 0.3;
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
        }
        
        .activity-item {
            position: relative;
            padding: 0.5rem 0 0.5rem 2rem;
            border-left: 1px solid #e3e6f0;
            margin-left: 1rem;
        }
        
        .activity-item:before {
            content: '';
            position: absolute;
            left: -0.5rem;
            top: 1.25rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            background-color: #e3e6f0;
            border: 0.25rem solid #fff;
        }
        
        .activity-item:first-child:before {
            background-color: #4e73df;
        }
        
        .activity-time {
            font-size: 0.75rem;
            color: #b7b9cc;
        }
    </style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('includes/new-sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include('includes/new-topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                        </a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Total Students Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="stat-card primary h-100">
                                <div class="stat-card-title">Total Students</div>
                                <div class="stat-card-value"><?php echo $studentCount; ?></div>
                                <div class="stat-card-icon text-primary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="manage-students.php" class="small text-primary text-decoration-none">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Total Rooms Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="stat-card success h-100">
                                <div class="stat-card-title">Total Rooms</div>
                                <div class="stat-card-value"><?php echo $roomCount; ?></div>
                                <div class="stat-card-icon text-success">
                                    <i class="fas fa-door-open"></i>
                                </div>
                                <a href="manage-rooms.php" class="small text-success text-decoration-none">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Total Courses Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="stat-card info h-100">
                                <div class="stat-card-title">Total Courses</div>
                                <div class="stat-card-value"><?php echo $courseCount; ?></div>
                                <div class="stat-card-icon text-info">
                                    <i class="fas fa-book"></i>
                                </div>
                                <a href="manage-courses.php" class="small text-info text-decoration-none">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- New Complaints Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="stat-card warning h-100">
                                <div class="stat-card-title">New Complaints</div>
                                <div class="stat-card-value"><?php echo $newComplaintCount; ?></div>
                                <div class="stat-card-icon text-warning">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <a href="new-complaints.php" class="small text-warning text-decoration-none">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Recent Activities -->
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Recent Activities</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="access-log.php">View All</a></li>
                                            <li><a class="dropdown-item" href="#">Export</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($recentActivities)): ?>
                                        <?php foreach ($recentActivities as $activity): ?>
                                            <div class="activity-item">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="mb-1">Admin Login</h6>
                                                    <small class="activity-time">
                                                        <?php echo date('M d, Y h:i A', strtotime($activity['loginTime'])); ?>
                                                    </small>
                                                </div>
                                                <p class="mb-1 small">IP: <?php echo htmlspecialchars($activity['ip']); ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-center text-muted my-4">No recent activities found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Quick Links</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <a href="registration.php" class="btn btn-light btn-block text-start p-3 border">
                                                <i class="fas fa-user-plus fa-2x text-primary mb-2"></i>
                                                <h6 class="font-weight-bold mb-1">Register Student</h6>
                                                <p class="small text-muted mb-0">Add new student to the hostel</p>
                                            </a>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <a href="create-room.php" class="btn btn-light btn-block text-start p-3 border">
                                                <i class="fas fa-plus-circle fa-2x text-success mb-2"></i>
                                                <h6 class="font-weight-bold mb-1">Add Room</h6>
                                                <p class="small text-muted mb-0">Create new room allocation</p>
                                            </a>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <a href="new-complaints.php" class="btn btn-light btn-block text-start p-3 border">
                                                <i class="fas fa-comment-medical fa-2x text-warning mb-2"></i>
                                                <h6 class="font-weight-bold mb-1">View Complaints</h6>
                                                <p class="small text-muted mb-0">Check new complaints</p>
                                            </a>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <a href="feedbacks.php" class="btn btn-light btn-block text-start p-3 border">
                                                <i class="fas fa-comment-alt fa-2x text-info mb-2"></i>
                                                <h6 class="font-weight-bold mb-1">View Feedback</h6>
                                                <p class="small text-muted mb-0">Check student feedback</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?php echo date('Y'); ?> Hostel Management System</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom scripts for all pages-->
    <script>
        // Toggle the side navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar when button is clicked
            document.getElementById('sidebarToggle').addEventListener('click', function(e) {
                e.preventDefault();
                document.body.classList.toggle('sidebar-toggled');
                document.querySelector('.sidebar').classList.toggle('toggled');
                
                if (document.querySelector('.sidebar').classList.contains('toggled')) {
                    document.querySelector('.sidebar .collapse').classList.remove('show');
                }
            });

            // Close any open menu when clicking outside
            window.addEventListener('click', function(e) {
                if (!e.target.matches('.dropdown-toggle')) {
                    const dropdowns = document.getElementsByClassName('dropdown-menu');
                    for (let i = 0; i < dropdowns.length; i++) {
                        const openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });

        // Sample chart for dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            if (ctx) {
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Students",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 35],
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            },
                            y: {
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                },
                                grid: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            },
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyColor: "#858796",
                                titleMarginBottom: 10,
                                titleColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10,
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
