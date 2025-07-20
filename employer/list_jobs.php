<?php
include('../db/db.php');

// Fetch all employers
$query = "SELECT * FROM employers";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employer List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .logo-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: 15px;
        }

        .card {
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center text-primary mb-4">Employer Directory</h2>

    <div class="row g-4">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php
                    $logo_path = $row['logo'] ? $row['logo'] : 'uploads/default_logo.png';
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm bg-white">
                        <div class="text-center">
                            <img src="<?= $logo_path ?>" class="logo-img" alt="Company Logo">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($row['company_name']) ?></h5>
                            <p class="card-text"><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></p>
                            <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
                            <p class="card-text"><strong>Industry:</strong> <?= htmlspecialchars($row['industry']) ?></p>
                            <p class="card-text"><strong>Created:</strong> <?= date('F j, Y', strtotime($row['created_at'])) ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center pb-3">
                            <a href="edit_employer.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm me-2">Edit</a>
                            <a href="delete_employer.php?id=<?= $row['id'] ?>"
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this employer?');">
                               Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No employers found.
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="text-center mt-5">
        <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
