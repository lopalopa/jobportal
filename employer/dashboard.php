<?php
session_start();
if (!isset($_SESSION['employer_id'])) {
    header("Location: ../auth/employer_login.php");
    exit();
}

include '../db/db.php'; // database connection
$employer_id = $_SESSION['employer_id'];

// Fetch employer details
$query = "SELECT * FROM employers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $employer_id);
$stmt->execute();
$result = $stmt->get_result();
$employer = $result->fetch_assoc();

// Fetch jobs posted by this employer
$job_query = "SELECT j.id, j.title, COUNT(a.id) AS total_applications
              FROM jobs j
              LEFT JOIN applications a ON j.id = a.job_id
              WHERE j.employer_id = ?
              GROUP BY j.id";
$stmt2 = $conn->prepare($job_query);
$stmt2->bind_param("i", $employer_id);
$stmt2->execute();
$job_results = $stmt2->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employer Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<?php include('../include/employer_header.php'); ?>

<div class="container mt-4">
    <div class="row mt-4">
        <div class="col-md-3"><?php include('../include/employer_sidebar.php'); ?>
</div>
<div class="col-md-9">
       <h2>Welcome, <?php echo htmlspecialchars($employer['name']); ?>!</h2>

 
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($employer['email']); ?></p>
                    <a href="edit_profile.php" class="btn btn-primary btn-sm">Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jobs You Have Posted</h5>
                    <?php if ($job_results->num_rows > 0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Applications</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($job = $job_results->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($job['title']); ?></td>
                                        <td><?php echo $job['total_applications']; ?></td>
                                        <td><a href="view_applications.php?job_id=<?php echo $job['id']; ?>" class="btn btn-info btn-sm">View Applications</a></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>You haven't posted any jobs yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('../include/employer_footer.php'); ?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
