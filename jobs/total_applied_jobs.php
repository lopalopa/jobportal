<?php
include '../db/db.php';
session_start();

// Optionally restrict this page to admin/employer
// if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
//     header("Location: ../auth/login.php");
//     exit;
// }

// $sql = "SELECT a.*, j.title AS job_title, e.company_name, u.name AS seeker_name
//         FROM applications a
//         JOIN jobs j ON a.job_id = j.id
//         JOIN employers e ON j.employer_id = e.id
//         JOIN users u ON a.seeker_id = u.id
//         ORDER BY a.applied_at DESC";

$sql="select * from applications ";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Job Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">All Job Applications</h2>
    <table class="table table-bordered bg-white shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Company</th>
                <th>Applicant Name</th>
                <th>Resume</th>
                <th>Cover Letter</th>
                <th>Applied On</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): 
                $count = 1;
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= htmlspecialchars($row['job_id']) ?></td>
                        <td><?= htmlspecialchars($row['seeker_id']) ?></td>
                        <td><a href="<?= htmlspecialchars($row['resume']) ?>" target="_blank">View</a></td>
                        <td><?= nl2br(htmlspecialchars(substr($row['cover_letter'], 0, 100))) ?>...</td>
                        <td><?= date("Y-m-d", strtotime($row['applied_at'])) ?></td>
                    </tr>
                <?php endwhile;
            else: ?>
                <tr>
                    <td colspan="7" class="text-center">No applications found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
