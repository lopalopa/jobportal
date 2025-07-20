<?php
include '../db/db.php';

// Fetch all jobs
$result = mysqli_query($conn, "SELECT * FROM jobs ORDER BY posted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Jobs - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Manage Jobs</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-white shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Posted At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while ($job = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= htmlspecialchars($job['title']) ?></td>
                            <td><?= htmlspecialchars($job['location']) ?></td>
                            <td><?= htmlspecialchars($job['job_type']) ?></td>
                            <td><?= date('F j, Y', strtotime($job['posted_at'])) ?></td>
                            <td class="text-center">
                                <a href="view_job.php?id=<?= $job['id'] ?>" class="btn btn-sm btn-info text-white">View</a>
                                <a href="edit_job.php?id=<?= $job['id'] ?>" class="btn btn-sm btn-warning text-dark">Edit</a>
                                <a href="delete_job.php?id=<?= $job['id'] ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Are you sure you want to delete this job?');">
                                   Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            No job postings available.
        </div>
    <?php endif; ?>

    <div class="mt-4 text-center">
        <a href="admin_dashboard.php" class="btn btn-secondary me-2">Back</a>
        <a href="../index.php" class="btn btn-danger">Cancel</a>
    </div>
</div>

</body>
</html>
