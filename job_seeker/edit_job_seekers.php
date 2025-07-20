<?php
include '../db/db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

// Fetch existing job seeker data
if ($id) {
    $result = mysqli_query($conn, "SELECT * FROM job_seekers WHERE id = '$id'");
    $job_seeker = mysqli_fetch_assoc($result);
    if (!$job_seeker) {
        echo "Job seeker not found.";
        exit;
    }
} else {
    echo "No job seeker ID provided.";
    exit;
}

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name         = $_POST['name'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $gender       = $_POST['gender'];
    $dob          = $_POST['dob'];
    $qualification = $_POST['qualification'];
    $experience   = $_POST['experience'];
    $skills       = $_POST['skills'];

    // Resume update (optional)
    $resume_update = "";
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $resume_name = basename($_FILES['resume']['name']);
        $resume_tmp  = $_FILES['resume']['tmp_name'];
        $resume_path = "../uploads/" . $resume_name;

        move_uploaded_file($resume_tmp, $resume_path);
        $resume_update = ", resume='$resume_path'";
    }

    $sql = "UPDATE job_seekers 
            SET name='$name', email='$email', phone='$phone', gender='$gender', dob='$dob',
                qualification='$qualification', experience='$experience', skills='$skills' $resume_update
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>Job seeker updated successfully!</p>";
        // Optional: Refresh data
        $result = mysqli_query($conn, "SELECT * FROM job_seekers WHERE id = '$id'");
        $job_seeker = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Job Seeker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
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

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        small {
            color: #666;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Edit Job Seeker</h2>

<form method="post" enctype="multipart/form-data">
    <label for="name">Full Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($job_seeker['name']) ?>" required>

    <label for="email">Email Address:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($job_seeker['email']) ?>" required>

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($job_seeker['phone']) ?>" required>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="">--Select--</option>
        <option value="Male" <?= $job_seeker['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $job_seeker['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= $job_seeker['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
    </select>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" value="<?= $job_seeker['dob'] ?>" required>

    <label for="qualification">Qualification:</label>
    <input type="text" name="qualification" value="<?= htmlspecialchars($job_seeker['qualification']) ?>" required>

    <label for="experience">Experience (in years):</label>
    <input type="number" name="experience" value="<?= $job_seeker['experience'] ?>" min="0" required>

    <label for="skills">Skills:</label>
    <textarea name="skills" rows="4" required><?= htmlspecialchars($job_seeker['skills']) ?></textarea>

    <label for="resume">Replace Resume (optional):</label>
    <input type="file" name="resume" accept=".pdf,.doc,.docx">
    <?php if (!empty($job_seeker['resume'])): ?>
        <small>Current resume: <a href="<?= $job_seeker['resume'] ?>" target="_blank">View</a></small><br>
    <?php endif; ?>
    <br>

    <input type="submit" value="Update">
</form>

</body>
</html>
