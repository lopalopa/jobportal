<?php
include '../db/db.php';

$job = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM jobs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $job = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <?php if ($job): ?>
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-primary"><?php echo htmlspecialchars($job['title']); ?></h2>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item"><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></li>
                    <li class="list-group-item"><strong>Salary:</strong> <?php echo htmlspecialchars($job['salary']); ?></li>
                    <li class="list-group-item"><strong>Type:</strong> <?php echo htmlspecialchars($job['job_type']); ?></li>
                </ul>

                <a href="apply_job.php?job_id=<?php echo $job['id']; ?>" class="btn btn-success w-100">Apply Now</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">
            Job not found.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
