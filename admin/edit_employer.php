<?php
session_start();
require '../db/db.php'; // Make sure you have a DB connection file

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: new_login.php");
    exit();
}

// Check if ID is provided
if (!isset($_GET['id'])) {
    echo "Employer ID is missing.";
    exit();
}

$employer_id = $_GET['id'];

// Fetch employer details
$sql = "SELECT * FROM employers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Employer not found.";
    exit();
}

$employer = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style1.css">
</head>
<body>

            <div class="card shadow p-4">
                <h3 class="text-primary mb-4">Edit Employer</h3>

                <form action="update_employer.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $employer['id']; ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Employer Name</label>
                        <input type="text" name="name" id="name" class="form-control" required
                               value="<?php echo htmlspecialchars($employer['name']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Employer Email</label>
                        <input type="email" name="email" id="email" class="form-control" required
                               value="<?php echo htmlspecialchars($employer['email']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                               value="<?php echo htmlspecialchars($employer['phone']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" name="company" id="company" class="form-control"
                               value="<?php echo htmlspecialchars($employer['company_name']); ?>">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="view_employer.php?id=<?php echo $employer_id; ?>" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Update Employer</button>
                    </div>
                </form>
            </div>
       

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
