<?php

include '../db/db.php';

 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

 

    $sql = "DELETE FROM job_seekers WHERE id='$id'";

 

    if (mysqli_query($conn, $sql)) {

        echo "Job seeker deleted successfully!";

    } else {

        echo "Error: " . mysqli_error($conn);

    }

}

?>
<?php
include '../db/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Job Seeker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8f8f8;
            color: #333;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .message {
            font-size: 1.2rem;
            margin-top: 20px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Job Seeker</h2>
        <div class="message">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Sanitize input
                $id = mysqli_real_escape_string($conn, $id);

                $sql = "DELETE FROM job_seekers WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "Job seeker deleted successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "No ID provided.";
            }
            ?>
        </div>
        <a href="job_seekers_list.php">Back to List</a>
    </div>
</body>
</html>
