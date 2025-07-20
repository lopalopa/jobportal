<?php
include '../db/db.php';
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $job_id = $_POST['job_id'];
    $seeker_id = $_SESSION['user_id'];

    $cover_letter = mysqli_real_escape_string($conn, $_POST['cover_letter']);

    // Handle file upload
    $resume_name = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_target = "uploads/" . basename($resume_name);

    if (move_uploaded_file($resume_tmp, $resume_target)) {
        $stmt = $conn->prepare("INSERT INTO applications (job_id, seeker_id, resume, cover_letter) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $job_id, $seeker_id, $resume_target, $cover_letter);

        if ($stmt->execute()) {
            $message = "Application Submitted Successfully!";
            $alert_class = "success";
            echo "<script>
            setTimeout(function(){
                window.location.href = 'total_applied_jobs.php';
            }, 2000);
        </script>";
    
        } else {
            $message = "Database Error: " . $stmt->error;
            $alert_class = "danger";
        }
    } else {
        $message = "Failed to upload resume.";
        $alert_class = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apply for Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if (isset($message)): ?>
                <div class="alert alert-<?= $alert_class ?>"><?= $message ?></div>
            <?php endif; ?>
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Apply for Job</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                    <?php
$job_id = isset($_GET['job_id']) && is_numeric($_GET['job_id']) ? (int)$_GET['job_id'] : null;
if (!$job_id) {
    die("Invalid or missing job ID.");
}
?>

<input type="hidden" name="job_id" value="<?= $job_id ?>">

                        <div class="mb-3">
                            <label for="resume" class="form-label">Upload Resume</label>
                            <input type="file" class="form-control" name="resume" id="resume" required>
                        </div>

                        <div class="mb-3">
                            <label for="cover_letter" class="form-label">Cover Letter</label>
                            <textarea name="cover_letter" id="cover_letter" rows="6" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
