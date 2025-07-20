<?php
include '../db/db.php';
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employer_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $job_type = $_POST['job_type'];

    $query = "INSERT INTO jobs (employer_id, title, description, location, salary, job_type)
              VALUES ('$employer_id', '$title', '$description', '$location', '$salary', '$job_type')";

    if (mysqli_query($conn, $query)) {
        $message = "<div class='alert alert-success'>Job Posted Successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post a Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Post a New Job</h3>
            </div>
            <div class="card-body">
                <?php if (isset($message)) echo $message; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="location">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="text" class="form-control" name="salary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Job Type</label>
                        <select class="form-select" name="job_type" required>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Internship">Internship</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Post Job</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
