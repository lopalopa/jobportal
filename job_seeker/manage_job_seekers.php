<?php
include '../db/db.php';

// Fetch all job seekers
$result = mysqli_query($conn, "SELECT * FROM job_seekers ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Job Seekers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 40px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f4f4f4;
        }
        a.btn {
            text-decoration: none;
            padding: 6px 12px;
            color: white;
            border-radius: 4px;
            font-size: 14px;
        }
        .edit-btn {
            background-color: #28a745;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .resume-link {
            color: #007bff;
        }
    </style>
</head>
<body>

<h2>Manage Job Seekers</h2>

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
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['dob'] ?></td>
                    <td><?= htmlspecialchars($row['qualification']) ?></td>
                    <td><?= $row['experience'] ?></td>
                    <td><?= htmlspecialchars($row['skills']) ?></td>
                    <td>
                    <?php if (!empty($row['resume']) && file_exists($row['resume'])): ?>
    <a href="<?= $row['resume'] ?>" target="_blank">Download</a>
<?php else: ?>
    N/A
<?php endif; ?>                         
                    </td>
                    <td>
                        <a class="btn edit-btn" href="edit_job_seekers.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn delete-btn" href="delete_job_seeker.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this job seeker?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="11" style="text-align:center;">No job seekers found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
