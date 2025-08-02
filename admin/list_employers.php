<?php
include('../db/db.php');

$alertMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $image = $_FILES['image'];

    if (!empty($name) && !empty($company_name) && !empty($email) && !empty($image['name'])) {
        $email_check_query = "SELECT id FROM employers WHERE email = '$email'";
        $result = $conn->query($email_check_query);

        if ($result->num_rows > 0) {
            $alertMessage = "<div class='alert alert-danger'>Error: Email already exists!</div>";
        } else {
            $folder_name = strtolower(str_replace(" ", "_", $company_name));
            $target_dir = "uploads/$folder_name/";

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($image["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($image["tmp_name"]);
            if (!$check) {
                $alertMessage = "<div class='alert alert-warning'>File is not an image.</div>";
                $uploadOk = 0;
            }

            if (file_exists($target_file)) {
                $alertMessage = "<div class='alert alert-warning'>File already exists.</div>";
                $uploadOk = 0;
            }

            if ($image["size"] > 5000000) {
                $alertMessage = "<div class='alert alert-warning'>File is too large (max 5MB).</div>";
                $uploadOk = 0;
            }

            if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                $alertMessage = "<div class='alert alert-warning'>Only JPG, JPEG, PNG, and GIF files are allowed.</div>";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($image["tmp_name"], $target_file)) {
                $sql = "INSERT INTO employers (name, company_name, email, industry, logo)
                        VALUES ('$name', '$company_name', '$email', '$industry', '$target_file')";

                if ($conn->query($sql) === TRUE) {
                    $alertMessage = "<div class='alert alert-success'>Employer added successfully!</div>";
                } else {
                    $alertMessage = "<div class='alert alert-danger'>Database error: " . $conn->error . "</div>";
                }
            } else if ($uploadOk) {
                $alertMessage = "<div class='alert alert-danger'>Error uploading file.</div>";
            }
        }
    } else {
        $alertMessage = "<div class='alert alert-warning'>All fields except industry are required.</div>";
    }
}

// Fetch employers list
$employers = $conn->query("SELECT * FROM employers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Employers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, rgb(91, 105, 211), #feb47b);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            margin-top: 70px;
            margin-bottom: 50px;
        }

        .form-card {
            background: #fff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        h2 {
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .form-control,
        .btn {
            border-radius: 25px;
        }

        .btn-primary {
            background-color: #5c67f2;
            border-color: #5c67f2;
        }

        .btn-primary:hover {
            background-color: #4e56d4;
        }

        .alert {
            border-radius: 10px;
        }

        table img {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }

        th, td {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
<div class="container main-container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

        </div>
    </div>

    <!-- Display Employers Table -->
    <div class="row justify-content-center">
        <div class="col-lg-10 table-container">
            <h2 class="text-center">Manage Employers List</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Industry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($employers->num_rows > 0) {
                            $i = 1;
                            while ($row = $employers->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$i}</td>
                                    <td><img src='{$row['logo']}' alt='Logo'></td>
                                    <td>" . htmlspecialchars($row['name']) . "</td>
                                    <td>" . htmlspecialchars($row['company_name']) . "</td>
                                    <td>" . htmlspecialchars($row['email']) . "</td>
                                    <td>" . htmlspecialchars($row['industry']) . "</td>
                                </tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='6'>No employers found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
