<?php

session_start();

include '../db/db.php'; // Database connection file

// Check if admin is logged in

if (!isset($_SESSION['user_id']) ||

$_SESSION['user_role'] !== 'admin') {

header("Location: login.php");

exit();

}

// Get user ID from URL and delete the user

if (isset($_GET['id'])) {

$user_id = $_GET['id'];

$query = "DELETE FROM users WHERE id = $user_id";

if (mysqli_query($conn, $query)) {

header("Location: manage_users.php");

exit();

} else {

echo "Error deleting record: ".

mysqli_error($conn);

}

}

mysqli_close($conn);

?>