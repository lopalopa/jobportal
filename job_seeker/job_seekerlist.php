<?php
include '../db/db.php';

$sql = "SELECT * FROM job_seekers ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Seekers List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        h3 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 15px;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                top: 12px;
                font-weight: bold;
                text-align: left;
            }

            th {
                display: none;
            }
        }
    </style>
</head>
<body>

<h3>Job Seekers List</h3>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Qualification</th>
            <th>Experience</th>
            <th>Skills</th>
            <th>Resume</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td data-label="ID"><?= $row['id'] ?></td>
                <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
                <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
                <td data-label="Phone"><?= htmlspecialchars($row['phone']) ?></td>
                <td data-label="Gender"><?= $row['gender'] ?></td>
                <td data-label="DOB"><?= $row['dob'] ?></td>
                <td data-label="Qualification"><?= htmlspecialchars($row['qualification']) ?></td>
                <td data-label="Experience"><?= $row['experience'] ?></td>
                <td data-label="Skills"><?= htmlspecialchars($row['skills']) ?></td>
                <td data-label="Resume"><a href="<?= $row['resume'] ?>" target="_blank">View</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
