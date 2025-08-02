<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Job Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style1.css"> <!-- Optional custom styling -->

    <style>
        .contact-container {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
        }
        .contact-info h5 {
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="contact-container shadow p-5">
                    <h2 class="text-center mb-4 text-primary">Contact Us</h2>
                    <div class="row">
                        <div class="col-md-6 contact-info">
                            <h5>Job Portal Office</h5>
                            <p><strong>Address:</strong> 123 , Bhubaneswar, India</p>
                            <p><strong>Phone:</strong> +91-9876543210</p>
                            <p><strong>Email:</strong> support@jobportal.com</p>
                            <h5 class="mt-4">Working Hours</h5>
                            <p>Monday - Friday: 9:00 AM to 6:00 PM</p>
                            <p>Saturday: 10:00 AM to 2:00 PM</p>
                        </div>
                        <div class="col-md-6">
                            <form action="contact_process.php" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'include/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
