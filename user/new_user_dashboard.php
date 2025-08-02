<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: new_login.php");
    exit();
}

// Get user data
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style1.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
        }

        .dashboard-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .dashboard-title {
            font-weight: 600;
            color: #2c3e50;
        }

        .dashboard-icon {
            font-size: 2rem;
            color: #3498db;
            margin-right: 10px;
        }

        .user-info {
            font-size: 1.1rem;
        }

    </style>
</head>

<body>

    <?php include '../include/header.php'; ?>

    <div class="container my-5">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="sidebar-wrapper">
                    <?php include '../include/sidebar.php'; ?>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="dashboard-card">
                    <h2 class="dashboard-title mb-3">
                        <i class="fas fa-user dashboard-icon"></i>
                        Welcome, <?php echo htmlspecialchars($user_name); ?>!
                    </h2>
                    <p class="user-info"><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>
                    <hr>
                    <p class="text-muted">This is your personalized dashboard where you can manage your profile, view job applications, and explore new opportunities tailored for you.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '../include/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
