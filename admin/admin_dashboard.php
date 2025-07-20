<?php
session_start();

// Redirect if not admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Admin Info
$admin_name = $_SESSION['user_name'];
$admin_email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dashboard-card:hover {
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }
        .dashboard-card {
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-light">

<?php include '../include/navbar.php'; ?>

<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <?php include '../include/sidebar.php'; ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 mt-5">
            <div class="mb-4">
                <h2 class="text-primary">Welcome, <?= htmlspecialchars($admin_name) ?></h2>
                <p class="text-muted">Email: <?= htmlspecialchars($admin_email) ?></p>
            </div>

            <div class="row g-4">
                <!-- Manage Users -->
                <div class="col-md-6 col-lg-4">
                    <div class="card dashboard-card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Manage Users</h5>
                            <p class="card-text">Add, update, or delete platform users.</p>
                            <a href="manage_users.php" class="btn btn-outline-primary w-100">Go</a>
                        </div>
                    </div>
                </div>

                <!-- Manage Jobs -->
                <div class="col-md-6 col-lg-4">
                    <div class="card dashboard-card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Manage Jobs</h5>
                            <p class="card-text">Post and manage job listings.</p>
                            <a href="manage_jobs.php" class="btn btn-outline-success w-100">Go</a>
                        </div>
                    </div>
                </div>

                <!-- Manage Employers -->
                <div class="col-md-6 col-lg-4">
                    <div class="card dashboard-card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Manage Employers</h5>
                            <p class="card-text">Oversee registered employers.</p>
                            <a href="manage_employers.php" class="btn btn-outline-info w-100">Go</a>
                        </div>
                    </div>
                </div>

                <!-- View Applications -->
                <div class="col-md-6 col-lg-4">
                    <div class="card dashboard-card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">View Applications</h5>
                            <p class="card-text">Review all job applications.</p>
                            <a href="view_applications.php" class="btn btn-outline-warning w-100">Go</a>
                        </div>
                    </div>
                </div>

                <!-- Logout -->

        </div> <!-- /col -->
    </div> <!-- /row -->
</div> <!-- /container -->

<?php include '../include/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
