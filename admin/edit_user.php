<?php
session_start();

include'../db/db.php'; // Database connection file

//Check if admin is logged in

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') { 
    header("Location: login.php");
     exit();
}

// Get user ID from URL

if (isset($_GET['id'])) {

$user_id=$_GET['id'];

$query = "SELECT * FROM users WHERE id =$user_id";

$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);
}

// Update user details.

if ($_SERVER["REQUEST_METHOD"] = "POST") {

$name=mysqli_real_escape_string($conn, $_POST['name']);

$email=mysqli_real_escape_string($conn, $_POST['email']);

$role=mysqli_real_escape_string($conn,$_POST['role']);

$updateQuery = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id=$user_id";

if (mysqli_query($conn, $updateQuery)) {

header("Location: manage_users.php");
 exit();
} else {
echo "Error updating record: ".

mysqli_error($conn);

}

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit User</title>

</head>

<body>

<h2>Edit User</h2>

<form method="post">

<label>Name:</label>

<input type="text" name="name" value="<?php echo $user['name']; ?>" required>

<br>

<label>Email:</label>

<input type="email" name="email" value="<?

php echo $user['email']; ?>" required>

<br>

<label>Role:</label>

<select name="role">

<option value="user" <?php if ($user['role'] =='user') echo 'selected'; ?>>User</option>

<option value="admin" <?php if ($user['role']== 'admin') echo 'selected'; ?>>Admin</option>

</select>

<br>

<button type="submit">Update</button>

</form>

<a href="manage_users.php">Back to Users</a>

</body>

</html>

<?php

mysqli_close($conn);

?>