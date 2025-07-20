<?php
include '../db/db.php';
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid job ID.");
}

$job_id = (int)$_GET['id'];

// Check if job exists
$check = $conn->prepare("SELECT id FROM jobs WHERE id = ?");
$check->bind_param("i", $job_id);
$check->execute();
$check_result = $check->get_result();

if ($check_result->num_rows === 0) {
    die("Job not found or already deleted.");
}

// Delete the job
$stmt = $conn->prepare("DELETE FROM jobs WHERE id = ?");
$stmt->bind_param("i", $job_id);

if ($stmt->execute()) {
    // Redirect to manage_jobs.php with success message
    header("Location: manage_jobs.php?msg=Job+deleted+successfully");
    exit;
} else {
    echo "Error deleting job: " . $conn->error;
}
?>
