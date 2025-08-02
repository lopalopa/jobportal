<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Job Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styles (optional) -->
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .hero {
      background-color: #007bff;
      color: white;
      padding: 60px 0;
      text-align: center;
    }
    .section {
      padding: 40px 0;
    }
    .footer {
      background-color: #f8f9fa;
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->

  <!-- Hero Section -->
  <div class="hero">
    <h1>About Our Job Portal</h1>
    <p>Your bridge between talent and opportunity.</p>
  </div>

  <!-- Main Content -->
  <div class="container section">
    <div class="row">
      <div class="col-md-6">
        <h3>Our Mission</h3>
        <p>
          Our mission is to connect employers with the best talents in the industry and help job seekers find meaningful and rewarding employment. We believe in creating a platform that makes hiring simple, efficient, and effective.
        </p>
        <h3>Why Choose Us?</h3>
        <ul>
          <li>Easy and free job posting for employers</li>
          <li>Instant job alerts for candidates</li>
          <li>Secure and user-friendly interface</li>
          <li>Fast-growing job portal with thousands of users</li>
        </ul>
      </div>
      <div class="col-md-6">
        <img src="images/job_portal_about.jpg" alt="Job Portal" class="img-fluid rounded">
      </div>
    </div>
  </div>

  <!-- Meet the Team (Optional) -->
  <div class="bg-light section">
    <div class="container">
      <h3 class="text-center mb-4">Meet the Team</h3>
      <div class="row text-center">
        <div class="col-md-4">
          <img src="images/team1.jpg" class="rounded-circle mb-2" width="100" height="100" alt="Founder">
          <h5>Rashmi Prava Mishra</h5>
          <p>Founder & Lead Developer</p>
        </div>
        <div class="col-md-4">
          <img src="images/team2.jpg" class="rounded-circle mb-2" width="100" height="100" alt="Designer">
          <h5>Priya Sharma</h5>
          <p>UI/UX Designer</p>
        </div>
        <div class="col-md-4">
          <img src="images/team3.jpg" class="rounded-circle mb-2" width="100" height="100" alt="Marketing">
          <h5>Rahul Sen</h5>
          <p>Marketing Manager</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; <?php echo date("Y"); ?> Job Portal. All rights reserved.</p>
  </div>

  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
