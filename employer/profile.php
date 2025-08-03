<?php
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

// Fetch jobs posted by this employer and related applications
$job_query = "SELECT jobs.title, applications.status
              FROM jobs
              LEFT JOIN applications ON jobs.id = applications.job_id
              WHERE jobs.id = ?";
$stmt2 = $conn->prepare($job_query);
$stmt2->bind_param("i", $employer_id);
$stmt2->execute();
$job_results = $stmt2->get_result();
?>

<?php include('../include/header.php'); ?>
<?php include('../include/employer_sidebar.php'); ?>

<div class="container mt-4">
    <h2>Welcome, <?php echo htmlspecialchars($employer['name']); ?>!</h2>

    <div class="row mt-4">
        <!-- Employer Profile -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Your Profile</h5>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($employer['name']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($employer['email']); ?></p>
                    <a href="edit_profile.php" class="btn btn-primary btn-sm">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Jobs Posted & Applications -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jobs Posted & Applications</h5>
                    <?php if ($job_results->num_rows > 0): ?>
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($job = $job_results->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($job['title']); ?></td>
                                        <td><?php echo htmlspecialchars($job['company_name']); ?></td>
                                        <td><?php echo htmlspecialchars($job['status'] ?? 'No Application'); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p class="text-muted">You haven't posted any jobs or received applications yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../include/footer.php'); ?>
