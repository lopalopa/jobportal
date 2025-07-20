<?php
session_start();
include('../db/db.php');

if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'employer')) {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid application ID.";
    exit();
}

$app_id = intval($_GET['id']);

$query = "
    SELECT a.*, j.title AS job_title, u.name AS applicant_name, u.email AS applicant_email
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    JOIN users u ON a.seeker_id = u.id
    WHERE a.id = $app_id AND a.status = 'Selected'
";

$result = mysqli_query($conn, $query);
$application = mysqli_fetch_assoc($result);

if (!$application) {
    echo "Call letter cannot be generated. Either application not found or not selected.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Call Letter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Official Call Letter</h4>
        </div>
        <div class="card-body">
            <p>Dear <strong><?= htmlspecialchars($application['applicant_name']) ?></strong>,</p>

            <p>We are pleased to inform you that you have been <strong>selected</strong> for the position of 
            <strong><?= htmlspecialchars($application['job_title']) ?></strong>.</p>

            <p>Please report to our office on <strong>[Insert Date Here]</strong> at <strong>[Insert Time Here]</strong> for further procedures. 
            Bring all your original documents and identification proof.</p>

            <p>If you have any questions, feel free to contact us at <strong><?= htmlspecialchars($application['applicant_email']) ?></strong>.</p>

            <p class="mt-4">Sincerely,<br><strong>HR Department</strong><br>Your Company Name</p>

            <a href="view_all_applications.php" class="btn btn-secondary mt-3">Back to Applications</a>
        </div>
    </div>
</div>
</body>
</html>
