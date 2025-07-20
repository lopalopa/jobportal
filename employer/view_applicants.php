<?php
session_start();
include('../db/db.php');

if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'employer')) {
    header("Location: ../login.php");
    exit();
}

// Update application status if action submitted
if (isset($_GET['action']) && isset($_GET['app_id'])) {
    $appId = intval($_GET['app_id']);
    $action = $_GET['action'] === 'accept' ? 'Selected' : 'Rejected';

    $update = "UPDATE applications SET status = '$action' WHERE id = $appId";
    mysqli_query($conn, $update);

    header("Location: application_report.php?id=$appId");
    exit();
}

// Fetch all applications
$query = "
    SELECT a.*, j.title AS job_title, u.name AS applicant_name, u.email AS applicant_email
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    JOIN users u ON a.seeker_id = u.id
    ORDER BY a.applied_at DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Applications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(
                          rgba(0, 0, 0, 0.5), 
                          rgba(0, 0, 0, 0.5)
                      ), 
                      url('../assets/images/bg.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            padding: 30px;
            margin-top: 50px;
            color: #000;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            font-weight: bold;
        }

        .table thead th {
            background-color: #343a40 !important;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center text-primary mb-4">All Job Applications</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Resume</th>
                        <th>Cover Letter</th>
                        <th>Status</th>
                        <th>Applied At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= htmlspecialchars($row['job_title']) ?></td>
                            <td><?= htmlspecialchars($row['applicant_name']) ?></td>
                            <td><?= htmlspecialchars($row['applicant_email']) ?></td>
                            <td>
                                <?= $row['resume'] ? "<a href='../uploads/".urlencode($row['resume'])."' class='btn btn-sm btn-primary' target='_blank'>View</a>" : "N/A"; ?>
                            </td>
                            <td>
                                <?= $row['cover_letter'] ? "<a href='../uploads/".urlencode($row['cover_letter'])."' class='btn btn-sm btn-secondary' target='_blank'>View</a>" : "N/A"; ?>
                            </td>
                            <td>
                                <?php if ($row['status'] === 'Pending'): ?>
                                    <a href="?action=accept&app_id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Accept</a>
                                    <a href="?action=reject&app_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
                                <?php else: ?>
                                    <span class="badge bg-<?= $row['status'] === 'Selected' ? 'success' : 'danger' ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                    <a href="<?= $row['status'] === 'Selected' ? 'call_letter.php' : 'rejection_letter.php' ?>?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-dark ms-2">View Letter</a>
                                <?php endif; ?>
                            </td>
                            <td><?= date('F j, Y, g:i a', strtotime($row['applied_at'])) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            No applications found.
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
