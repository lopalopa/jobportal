<?php
session_start();
include('../db/db.php');

$user_id = $_SESSION['user_id']; // assume this is set during login

// Fetch user details
$query = "SELECT name, email, phone FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile - Job Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
  <a href="new_user_dashboard.php" class="btn btn-secondary mb-3">&larr; Back to Dashboard</a>

  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4>Your Profile</h4>
    </div>
    <div class="card-body">
      <?php if ($user): ?>
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <td><?= htmlspecialchars($user['name']); ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($user['email']); ?></td>
          </tr>
          <tr>
            <th>Phone</th>
            <td><?= htmlspecialchars($user['phone']); ?></td>
          </tr>
          
          <tr>
            <th>Resume</th>
            <td>
              <?php if (!empty($user['resume'])): ?>
                <a href="../uploads/resumes/<?= $user['resume']; ?>" target="_blank">View Resume</a>
              <?php else: ?>
                <span class="text-muted">No resume uploaded</span>
              <?php endif; ?>
            </td>
          </tr>
        </table>
      <?php else: ?>
        <div class="alert alert-danger">Profile not found.</div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include('../include/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
