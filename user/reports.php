<?php
session_start();
include('../db/db.php'); // database connection

$user_id = $_SESSION['user_id']; // assuming user_id is stored in session

// Fetch user's job applications or report data
$query = "SELECT a.id, j.title AS job_title, c.name AS company_name, a.applied_at 
          FROM applications a
          JOIN jobs j ON a.job_id = j.id
          JOIN employers c ON j.employer_id = c.id
          WHERE a.id = '$user_id'
          ORDER BY a.applied_at DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Reports - Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
    <div class="mb-3">
        <a href="new_user_dashboard.php" class="btn btn-secondary">&larr; Back</a>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Your Application Reports</h4>
        </div>
        <div class="card-body">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Date Applied</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= htmlspecialchars($row['job_title']); ?></td>
                                <td><?= htmlspecialchars($row['company_name']); ?></td>
                                <td><?= date('d M Y', strtotime($row['applied_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info">You haven't applied to any jobs yet.</div>
            <?php endif; ?>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
