<?php
include '../db/db.php';

$result = mysqli_query($conn, "SELECT * FROM jobs ORDER BY posted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Available Jobs</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="row g-4">
            <?php while ($job = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-dark">
                                <?= htmlspecialchars($job['title']) ?>
                            </h5>
                            <p class="card-text mb-1">
                                <strong>Location:</strong> <?= htmlspecialchars($job['location']) ?>
                            </p>
                            <p class="text-muted">
                                <small>Posted on <?= date('F j, Y', strtotime($job['posted_at'])) ?></small>
                            </p>
                            <a href="view_job.php?id=<?= $job['id'] ?>" class="btn btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            No jobs available at the moment.
        </div>
    <?php endif; ?>

    <!-- Bottom Buttons -->
    <div class="mt-5 text-center">
        <a href="javascript:history.back()" class="btn btn-secondary me-2">Back</a>
        <a href="../index.php" class="btn btn-danger">Cancel</a>
    </div>
</div>

</body>
</html>
