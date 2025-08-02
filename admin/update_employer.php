<?php
session_start();
require '../db/db.php'; // Adjust path as needed

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: new_login.php");
    exit();
}

// Check if form is submitted with required data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['name'], $_POST['email'])) {
        $id      = intval($_POST['id']);
        $name    = trim($_POST['name']);
        $email   = trim($_POST['email']);
        $phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $company = isset($_POST['company']) ? trim($_POST['company']) : '';

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit();
        }

        // Prepare update statement
        $sql = "UPDATE employers SET name = ?, email = ?, phone = ?, company_name = ?, created_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssi", $name, $email, $phone, $company, $id);
            if ($stmt->execute()) {
                // Redirect back to view page
                header("Location: view_employer.php?id=" . $id);
                exit();
            } else {
                echo "Error updating record: " . $stmt->error;
            }
        } else {
            echo "SQL error: " . $conn->error;
        }

    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
