<?php

require_once '../db/db.php';

session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, trim($_POST['name']));

    $email = mysqli_real_escape_string($conn, trim($_POST['email']));

    $password = trim($_POST['password']);

    $confirm_password = trim($_POST['confirm_password']);

    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));



    $role = mysqli_real_escape_string($conn, trim($_POST['role']));

  $errors = [];

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($role)) {

        $errors[] = "All fields except phone are required!";

    }

     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Invalid email format!";

    }

     if (!empty($phone) && !preg_match("/^[0-9]{10,15}$/", $phone)) {

        $errors[] = "Invalid phone number!";

    }

     if (strlen($password) < 6) {

        $errors[] = "Password must be at least 6 characters!";

    }

     if ($password !== $confirm_password) {

        $errors[] = "Passwords do not match!";

    }

     if ($role === "admin") {

        $admin_check_query = "SELECT id FROM users WHERE role = 'admin'";

        $admin_result = mysqli_query($conn, $admin_check_query);

        if (mysqli_num_rows($admin_result) > 0) {

            $errors[] = "Only one admin is allowed!";

        }

    }

     $email_check_query = "SELECT id FROM users WHERE email = '$email'";

    $email_result = mysqli_query($conn, $email_check_query);

    if (mysqli_num_rows($email_result) > 0) {

        $errors[] = "Email already registered!";

    }

 

    if (empty($errors)) {

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $insert_query = "INSERT INTO users (name, email, password, phone, role)



                         VALUES ('$name', '$email', '$hashed_password', '$phone', '$role')";

 

        if (mysqli_query($conn, $insert_query)) {

            $_SESSION['success'] = "Registration successful! You can now log in.";

            header("Location: new_login.php");

            exit();

        } else {

            $errors[] = "Registration failed! Please try again.";

        }

    }

}

?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <style>

        body {

            font-family: 'Arial', sans-serif;

            background: url('../assets/images/1.jpeg') no-repeat center center/cover;

            margin: 0;

            padding: 0;

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

        }

        .container {

            width: 420px;

            background: #fff;

            padding: 25px;

            border-radius: 10px;

            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);

        }

        h2 {

            text-align: center;

            margin-bottom: 15px;

            color: #333;

        }

        .form-container {

            max-height: 350px;

            overflow-y: auto;

            padding-right: 5px;

        }

        .form-group {

            display: flex;

            align-items: center;

            margin-bottom: 15px;

        }

        .form-group label {

            flex: 1;

            font-weight: 600;

            font-size: 14px;

            color: #555;

        }

        .form-group input,

        .form-group select {

            flex: 2;

            padding: 8px;

            border: 1px solid #ccc;

            border-radius: 5px;

            font-size: 14px;

        }

        .error, .success {

            padding: 10px;

            margin-bottom: 10px;

            font-size: 14px;

            border-radius: 5px;

        }

        .error {

            background: #ffcccc;

            border-left: 5px solid red;

            color: #a00;

        }

        .success {

            background: #ccffcc;

            border-left: 5px solid green;

            color: #060;

        }

        .form-group input:focus {

            border-color: #007bff;

            outline: none;

        }

        button {

            width: 100%;

            padding: 10px;

            background: #007bff;

            color: white;

            border: none;

            font-size: 16px;

            border-radius: 5px;

            cursor: pointer;

            margin-top: 10px;

        }

        button:hover {

            background: #0056b3;

        }

        .login-link {

            text-align: center;

            margin-top: 15px;

            font-size: 14px;

        }

        .login-link a {

            color: #007bff;

            text-decoration: none;

        }

        .login-link a:hover {

            text-decoration: underline;

        }

    </style>

</head>

<body>

 <div class="container">

    <h2>Register</h2>

     <?php if (!empty($errors)): ?>

        <div class="error">

            <?php foreach ($errors as $error): ?>

                <p><?= $error ?></p>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

 

    <?php if (isset($_SESSION['success'])): ?>

        <div class="success">

            <p><?= $_SESSION['success'] ?></p>

        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>

 

    <div class="form-container">

        <form action="new_register.php" method="POST">

            <div class="form-group">

                <label for="name">Full Name:</label>

                <input type="text" name="name" required>

            </div>

 

            <div class="form-group">

                <label for="email">Email:</label>

                <input type="email" name="email" required>

            </div>

 

            <div class="form-group">

                <label for="password">Password:</label>

                <input type="password" name="password" required>

            </div>

 

            <div class="form-group">

                <label for="confirm_password">Confirm Password:</label>

                <input type="password" name="confirm_password" required>

            </div>

 

            <div class="form-group">

                <label for="phone">Phone:</label>

                <input type="text" name="phone">

            </div>

 

            <div class="form-group">

                <label for="role">Select Role:</label>

                <select name="role" required>

                    <option value="user">User</option>

                    <option value="admin">Admin</option>

                </select>

            </div>

 

            <button type="submit">Register</button>

        </form>

    </div>

 

    <p class="login-link">Already have an account? <a href="new_login.php">Login here</a>.</p>

</div>

 

</body>

</html>