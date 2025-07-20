<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user information
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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style1.css">

</head>

<body>
    <?php include '../include/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
            <?php include '../include/sidebar.php'; ?>

            </div>
            <div class="col-md-9">
        <div class="card shadow p-4">
            <h2 class="mb-3 text-primary">Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user_email); ?></p>
            <p>This is your user dashboard. You can manage your profile and perform other user-specific tasks.</p>
            <a href="../auth/logout.php" class="btn btn-danger mt-3">Logout</a>
        </div>
        </div>
        </div>

    <?php include '../include/footer.php'; ?>

    <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
