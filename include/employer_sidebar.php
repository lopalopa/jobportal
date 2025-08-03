<!-- employer_sidebar.php -->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 250px; height: 100vh;">
  <a href="/jobportal/employer/dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4">Employer Panel</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="/jobportal/employer/dashboard.php" class="nav-link text-white">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="/jobportal/jobs/post_jobs.php" class="nav-link text-white">
        <i class="bi bi-briefcase-fill"></i> Post New Job
      </a>
    </li>
    <li>
      <a href="/jobportal/jobs/manage_jobs.php" class="nav-link text-white">
        <i class="bi bi-card-list"></i> Manage Posted Jobs
      </a>
    </li>
    <li>
      <a href="/jobportal/employer/applications.php" class="nav-link text-white">
        <i class="bi bi-file-earmark-person"></i> View Applications
      </a>
    </li>
    <li>
      <a href="/jobportal/employer/profile.php" class="nav-link text-white">
        <i class="bi bi-person-circle"></i> Profile
      </a>
    </li>
    <li>
      <a href="/jobportal/auth/logout.php" class="nav-link text-white">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </li>
  </ul>
  <hr>
  <div class="text-white">
    <small>&copy; 2025 JobPortal</small>
  </div>
</div>
