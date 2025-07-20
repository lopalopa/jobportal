<?php

require_once '../db/db.php';

session_start();

 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);

    $password = trim($_POST['password']);

    $errors = [];

 

    // Validate input fields

    if (empty($email) || empty($password)) {

        $errors[] = "Email and Password are required!";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Invalid email format!";

    }

 

    if (empty($errors)) {

        // Fetch user details from the database

        $query = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $query);

 

        if ($row = mysqli_fetch_assoc($result)) {

            // Verify the hashed password

            if (password_verify($password, $row['password'])) {

                $_SESSION['user_id'] = $row['id'];

                $_SESSION['user_name'] = $row['name'];

                $_SESSION['user_email'] = $row['email'];

                $_SESSION['user_role'] = $row['role'];

 

                // Redirect user based on role

                if ($row['role'] === 'admin') {

                    header("Location: /onlinejobportal/admin/admin_dashboard.php");

                } else {

                    header("Location: /onlinejobportal/user/new_user_dashboard.php");

                }

                exit();

            } else {

                $errors[] = "Incorrect password!";

            }

        } else {

            $errors[] = "No account found with this email!";

        }

    }

}

?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        /* Page Styling */

        body {

            font-family: Arial, sans-serif;

            background-color: #f8f9fa;

            margin: 0;

            padding: 0;

            display: flex;

            flex-direction: column;

            min-height: 100vh;

        }

 

        .container {

            flex-grow: 1; /* Push footer to the bottom */

            display: flex;

            justify-content: center;

            align-items: center;

            height: calc(100vh - 120px); /* Adjust height between navbar & footer */

            padding: 20px;

        }

 

        .login-box {

            background: white;

            padding: 30px;

            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);

            border-radius: 8px;

            width: 100%;

            max-width: 400px;

            text-align: center;

        }

 

        h2 {

            margin-bottom: 20px;

            color: #333;

        }

 

        .error {

            color: red;

            margin-bottom: 15px;

        }

 

        form {

            display: flex;

            flex-direction: column;

        }

 

        label {

            text-align: left;

            font-weight: bold;

            margin: 10px 0 5px;

        }

 

        input {

            padding: 10px;

            border: 1px solid #ccc;

            border-radius: 5px;

            width: 100%;

        }

 

        button {

            background: #007bff;

            color: white;

            border: none;

            padding: 10px;

            border-radius: 5px;

            cursor: pointer;

            margin-top: 15px;

            font-size: 16px;

        }

        button:hover {

            background: #0056b3;

        }

        p {

            margin-top: 10px;

        }

        a {

            color: #007bff;

            text-decoration: none;

        }

        a:hover {

            text-decoration: underline;

        }

    </style>

</head>

<body>

<?php include '../include/navbar.php'; ?>

<div class="container">

    <div class="login-box">

        <h2>Login</h2>

        <?php if (!empty($errors)) { ?>

            <div class="error">

                <?php foreach ($errors as $error) {

                    echo "<p>$error</p>";

                } ?>

            </div>

        <?php } ?>

        <form action="" method="POST">

            <label for="email">Email:</label>

            <input type="email" name="email" required>

            <label for="password">Password:</label>

            <input type="password" name="password" required>

            <button type="submit">Login</button>

        </form>

        <p>Don't have an account? <a href="new_register.php">Register here</a>.</p>
        <p class="mt-2 text-center"><a href="forgot_password.php">Forgot Password?</a></p>  <!-- Forgot password link -->


    </div>

</div>

<?php include '../include/footer.php'; ?>

</body>

</html>