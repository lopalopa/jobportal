<?php

// Database Connection

include '../db/db.php';

 

$message = "";

 

// Handle password reset form

if (isset($_POST['reset_password'])) {

    $email = $_POST['email'];

    $new_password = $_POST['new_password'];

    $confirm_password = $_POST['confirm_password'];

 

    // Check if new passwords match

    if ($new_password !== $confirm_password) {

        $message = "New password and confirm password do not match!";

    } else {

        // Check if email exists

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

 

        if (mysqli_num_rows($result) > 0) {

            // Hash new password

            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

 

            // Update password

            $update_sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";

            if (mysqli_query($conn, $update_sql)) {

                $message = "Password updated successfully!";

            } else {

                $message = "Error updating password!";

            }

        } else {

            $message = "No user found with that email address!";

        }

    }

}

?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Reset Password - EventMaster</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="card p-4" style="width: 350px; margin: 100px auto;">

    <h3 class="text-center mb-3">Reset Password</h3>

 

    <?php if (!empty($message)): ?>

        <div class="alert alert-info"><?php echo $message; ?></div>

    <?php endif; ?>

 

    <form method="POST">

        <div class="mb-3">

            <label>Email Address:</label>

            <input type="email" name="email" class="form-control" required />

        </div>

        <div class="mb-3">

            <label>New Password:</label>

            <input type="password" name="new_password" class="form-control" required />

        </div>

        <div class="mb-3">

            <label>Confirm New Password:</label>

            <input type="password" name="confirm_password" class="form-control" required />

        </div>

        <button type="submit" name="reset_password" class="btn btn-primary w-100">Reset Password</button>

    </form>

 

    <p class="mt-3 text-center"><a href="new_login.php">Back to Login</a></p>

</div>

 

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>