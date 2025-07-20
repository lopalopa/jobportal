<?php
include '../db/db.php';
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid job ID.");
}

$job_id = (int)$_GET['id'];

// Fetch existing job details
$stmt = $conn->prepare("SELECT * FROM jobs WHERE id = ?");
$stmt->bind_param("i", $job_id);
$stmt->execute();
$result = $stmt->get_result();
$job = $result->fetch_assoc();

if (!$job) {
    die("Job not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $job_type = $_POST['job_type'];
    $description = $_POST['description'];

    $update = $conn->prepare("UPDATE jobs SET title = ?, location = ?, salary = ?, job_type = ?, description = ? WHERE id = ?");
    $update->bind_param("sssssi", $title, $location, $salary, $job_type, $description, $job_id);

    if ($update->execute()) {
        $message = "Job updated successfully.";
    } else {
        $message = "Failed to update job: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Edit Job Posting</h2>

    <?php if (isset($message)): ?>
        <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" class="card p-4 shadow-sm bg-white">
        <div class="mb-3">
            <label for="title" class="form-label">Job Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= htmlspecialchars($job['title']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" value="<?= htmlspecialchars($job['location']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" class="form-control" name="salary" id="salary" value="<?= htmlspecialchars($job['salary']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="job_type" class="form-label">Job Type</label>
            <select class="form-select" name="job_type" id="job_type" required>
                <option <?= $job['job_type'] === 'Full-time' ? 'selected' : '' ?>>Full-time</option>
                <option <?= $job['job_type'] === 'Part-time' ? 'selected' : '' ?>>Part-time</option>
                <option <?= $job['job_type'] === 'Remote' ? 'selected' : '' ?>>Remote</option>
                <option <?= $job['job_type'] === 'Internship' ? 'selected' : '' ?>>Internship</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <textarea class="form-control" name="description" id="description" rows="6" required><?= htmlspecialchars($job['description']) ?></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Job</button>
            <a href="manage_jobs.php" class="btn btn-secondary ms-2">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
