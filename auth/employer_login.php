<?php
session_start();
include('../db/db.php');

$alertMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM employers WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION['employer_id'] = $row['id'];
            $_SESSION['employer_name'] = $row['name'];

            // Redirect to employer dashboard (you can change this file name)
            header("Location: ../employer/dashboard.php");
            exit;
        } else {
            $alertMessage = "<div class='alert alert-danger'>Invalid password.</div>";
        }
    } else {
        $alertMessage = "<div class='alert alert-danger'>Username not found.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employer Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #2c3e50;
            font-family: Arial, sans-serif;
            padding-top: 80px;
        }

        .login-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Employer Login</h2>
    
    <?php if (!empty($alertMessage)) echo $alertMessage; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
</div>

</body>
</html>
