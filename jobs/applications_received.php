<?php
include '../db/db.php';
session_start(); 

$employer_id = $_SESSION['user_id'] ?? null;

if (!$employer_id) {
    echo "<div class='alert alert-danger'>You must be logged in to view this page.</div>";
    exit;
}

// Secure query using prepared statement
$stmt = $conn->prepare("
    SELECT a.*, j.title, u.name AS seeker_name
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    JOIN users u ON a.seeker_id = u.id
    WHERE j.employer_id = ?
    ORDER BY a.applied_at DESC
");
$stmt->bind_param("i", $employer_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applications Received</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include '../include/header.php';?>
<body class="bg-light">

<div class="container my-5">
    <div class="row">
        <div class="col-md-3">
        <?php include '../include/sidebar.php';?>
  
        </div>
        <div class="col-md-9">

    <h2 class="text-center text-primary mb-4">Applications Received</h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-dark">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </h5>
                            <p class="mb-1"><strong>Applicant:</strong> <?php echo htmlspecialchars($row['seeker_name']); ?></p>
                            <p class="mb-1"><strong>Status:</strong> <span class="badge bg-info text-dark"><?php echo htmlspecialchars($row['status']); ?></span></p>
                            <p class="mb-0"><strong>Applied At:</strong> <?php echo date('F j, Y, g:i a', strtotime($row['applied_at'])); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            No applications have been received yet.
        </div>
    <?php endif; ?>
    </div>
    </div>
    </div>

</body>
</html>
<?php include '../include/footer.php';?>
