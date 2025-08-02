<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Services - Job Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style1.css">
</head>

<body>


<!-- Services Section -->
<div class="container my-5">
  <h2 class="text-center mb-4 text-primary">Our Services</h2>

  <div class="row g-4">
    <!-- Service 1 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-briefcase-fill fs-1 text-primary"></i>
          <h5 class="card-title mt-3">Job Listings</h5>
          <p class="card-text">Browse thousands of verified job postings across different industries and locations.</p>
        </div>
      </div>
    </div>

    <!-- Service 2 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-person-lines-fill fs-1 text-primary"></i>
          <h5 class="card-title mt-3">Resume Building</h5>
          <p class="card-text">Create a professional resume with our easy-to-use resume builder tools.</p>
        </div>
      </div>
    </div>

    <!-- Service 3 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-lightbulb-fill fs-1 text-primary"></i>
          <h5 class="card-title mt-3">Career Guidance</h5>
          <p class="card-text">Get expert tips on career growth, interview preparation, and skill development.</p>
        </div>
      </div>
    </div>

    <!-- Service 4 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-search fs-1 text-primary"></i>
          <h5 class="card-title mt-3">Employer Search</h5>
          <p class="card-text">Find and connect with employers actively hiring for your skillset.</p>
        </div>
      </div>
    </div>

    <!-- Service 5 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-bell-fill fs-1 text-primary"></i>
          <h5 class="card-title mt-3">Job Alerts</h5>
          <p class="card-text">Set job alerts to receive instant notifications on new job openings.</p>
        </div>
      </div>
    </div>

    <!-- Service 6 -->
    <div class="col-md-4">
      <div class="card shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-people-fill fs-1 text-primary"></i>
          <h5 class="card-title mt-3">Recruiter Services</h5>
          <p class="card-text">Post jobs, manage applications, and find the right talent easily.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons (Optional) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>
</html>
