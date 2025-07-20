<?php
include('../db/db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM employers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("Employer not found!");
    }
} else {
    die("Invalid employer ID.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $industry = $_POST['industry'];

    if (!empty($name) && !empty($company_name) && !empty($email)) {
        $stmt = $conn->prepare("UPDATE employers SET name=?, company_name=?, email=?, industry=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $company_name, $email, $industry, $id);

        if ($stmt->execute()) {
            $message = "Employer updated successfully.";
        } else {
            $message = "Error updating employer: " . $conn->error;
        }
    } else {
        $message = "All fields except industry are required.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Employer Details</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($message)): ?>
                        <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company_name" value="<?= htmlspecialchars($row['company_name']) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Industry</label>
                            <input type="text" name="industry" value="<?= htmlspecialchars($row['industry']) ?>" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Update Employer</button>
                            <a href="manage_employers.php" class="btn btn-secondary ms-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
