<?php
include '../db/db.php';
session_start();

$seeker_id = $_SESSION['user_id'] ?? null;

if (!$seeker_id) {
    echo "<div class='alert alert-danger'>You must be logged in to view this page.</div>";
    exit;
}

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("
    SELECT a.*, j.title
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    WHERE a.seeker_id = ?
    ORDER BY a.applied_at DESC
");
$stmt->bind_param("i", $seeker_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">My Job Applications</h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text">
                                <strong>Status:</strong> <?php echo htmlspecialchars($row['status']); ?><br>
                                <strong>Applied At:</strong> <?php echo date('F j, Y, g:i a', strtotime($row['applied_at'])); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            You haven't applied to any jobs yet.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
