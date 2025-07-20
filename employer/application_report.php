<?php
session_start();
include('../db/db.php');

// Ensure employer or admin is logged in
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'employer')) {
    header("Location: ../login.php");
    exit();
}

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid application ID.";
    exit();
}

$app_id = intval($_GET['id']);

// Fetch application details
$query = "
    SELECT a.*, j.title AS job_title, u.name AS applicant_name, u.email AS applicant_email,u.name as name
    FROM applications a
    JOIN jobs j ON a.job_id = j.id
    JOIN users u ON a.seeker_id = u.id
    WHERE a.id = $app_id
";

$result = mysqli_query($conn, $query);
$application = mysqli_fetch_assoc($result);

if (!$application) {
    echo "Application not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Appointment Letter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
        }
        .letter-header, .letter-footer {
            text-align: center;
        }
        .letter-body {
            margin-top: 30px;
            line-height: 1.6;
        }
        .letter-body p {
            margin-bottom: 15px;
        }
        .signature {
            margin-top: 50px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="letter-header">
        <h2>Company Name</h2>
        <p>Company Address | Phone Number | Email</p>
        <p><strong>Job Appointment Letter</strong></p>
    </div>

    <div class="letter-body">
        <p>Date: <?= date('F j, Y') ?></p>

        <p>Dear <?= htmlspecialchars($application['applicant_name']) ?>,</p>

        <p>We are pleased to inform you that you have been selected for the position of <strong><?= htmlspecialchars($application['job_title']) ?></strong> at our company. Below are the details of your appointment:</p>

        <ul>
            <li><strong>Position:</strong> <?= htmlspecialchars($application['job_title']) ?></li>
            <li><strong>Job Description:</strong> [Brief description of the job role]</li>
            <li><strong>Start Date:</strong> [Proposed start date]</li>
            <li><strong>Working Hours:</strong> [Working hours details]</li>
            <li><strong>Salary:</strong> [Salary details]</li>
            <li><strong>Benefits:</strong> [List of benefits]</li>
        </ul>

        <p>Please review the terms and conditions outlined in the attached employment agreement. If you accept the offer, kindly sign and return the agreement by [Date].</p>

        <p>We look forward to welcoming you to our team.</p>

        <p>Sincerely,</p>

        <div class="signature">
            <p><?php echo $application['name'];?></p>
            <p><?php echo $application['job_title'];?></p>
            <p>[Company Name]</p>
        </div>
    </div>

    <div class="letter-footer">
        <p>For any queries, please contact us at [Phone Number] or [Email Address].</p>
    </div>
</div>

</body>
</html>
