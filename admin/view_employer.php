<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: new_login.php");
    exit();
}

// Database connection
require_once '../db/db.php';

// Get employer ID from URL
$employer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch employer details from the database
$stmt = $conn->prepare("SELECT * FROM employers WHERE id = ?");
$stmt->bind_param("i", $employer_id);
$stmt->execute();
$result = $stmt->get_result();

// If employer not found
if ($result->num_rows === 0) {
    echo "<div class='alert alert-danger m-4'>Employer not found!</div>";
    exit();
}

$employer = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>

    <div class="container mt-5">
           

                    <h3 class="mb-4 text-success">Employer Details</h3>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%">Name</th>
                                <td><?= htmlspecialchars($employer['name']) ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= htmlspecialchars($employer['email']) ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= htmlspecialchars($employer['phone']) ?></td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td><?= htmlspecialchars($employer['company_name']) ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?= htmlspecialchars($employer['phone']) ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= htmlspecialchars($employer['email']) ?></td>
                            </tr>
                            <tr>
                                <th>Industry</th>
                                <td><?= htmlspecialchars($employer['industry']) ?></td>
                            </tr>
                            <tr>
                                <th>Logo</th>
                                <td><?= htmlspecialchars($employer['logo']) ?></td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td><?= htmlspecialchars($employer['created_at']) ?></td>
                            </tr>
                         
                        </tbody>
                    </table>

                    <a href="manage_employers.php" class="btn btn-secondary mt-3">← Back to Employer List</a>
         
    </div>

  
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
