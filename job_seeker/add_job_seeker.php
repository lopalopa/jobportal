<?php
include '../db/db.php';
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $gender       = $_POST['gender'];
    $dob          = $_POST['dob'];
    $qualification = $_POST['qualification'];
    $experience   = $_POST['experience'];
    $skills       = $_POST['skills'];

    // Resume upload
    $resume_path = '';
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $resume_name = basename($_FILES['resume']['name']);
        $resume_tmp  = $_FILES['resume']['tmp_name'];
        $resume_path = "uploads/" . $resume_name;

        move_uploaded_file($resume_tmp, $resume_path);
    }

    $sql = "INSERT INTO job_seekers (s_id,name, email, phone, gender, dob, qualification, experience, skills, resume)
            VALUES ('$user_id','$name', '$email', '$phone', '$gender', '$dob', '$qualification', '$experience', '$skills', '$resume_path')";

    if (mysqli_query($conn, $sql)) {
        echo "Job seeker added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Seeker Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Job Seeker Registration Form</h2>

<form method="post" enctype="multipart/form-data">
    <label for="name">Full Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email Address:</label>
    <input type="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" required>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="">--Select--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" required>

    <label for="qualification">Qualification:</label>
    <input type="text" name="qualification" required>

    <label for="experience">Experience (in years):</label>
    <input type="number" name="experience" min="0" required>

    <label for="skills">Skills:</label>
    <textarea name="skills" rows="4" required></textarea>

    <label for="resume">Upload Resume (PDF/DOC):</label>
    <input type="file" name="resume" accept=".pdf,.doc,.docx" required>

    <input type="submit" value="Submit">
</form>

</body>
</html>
