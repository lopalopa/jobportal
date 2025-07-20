<?php

session_start();

?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to MyWebsite</title>

   

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   

    <!-- Font Awesome for Icons -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

 

    <!-- AOS (Animate On Scroll) for Animations -->

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

   

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

   

    <!-- Custom CSS -->

    <link rel="stylesheet" href="assets/css/style.css">
<style>

    .hero{

        min-height: 120vh;
        width:100%;
    }
            .landing-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        .landing-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .landing-description {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }


        .button {
            background-color: #4CAF50;
            color: white;
            font-size: 1.1rem;
            padding: 15px 30px;
            margin: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

</style>
</head>

<body>

 

<!-- Include Navbar -->

<?php include 'include/navbar.php'; ?>

 

<!-- Hero Section with Animation -->

<header class="hero">

    <div class="container text-center">

        <h1 class="animate-text">Welcome to MyWebsite</h1>

        <p>Your one-stop solution for professional services</p>

       

        <?php if (!isset($_SESSION['user_id'])) { ?>

            <a href="login.php" class="btn btn-primary">Get Started</a>

        <?php } else { ?>

            <a href="dashboard.php" class="btn btn-success">Go to Dashboard</a>

        <?php } ?>

    </div>

</header>

 
<div class="landing-container">
        <h1 class="landing-title">Welcome to Job Portal</h1>
        <p class="landing-description">Find the best job opportunities or post your job listing here. Start your journey with us today.</p>

        <div>
            <a href="employer/list_jobs.php" class="button">Browse Job Listings</a>
            <a href="list_employers.php" class="button">Employer Listings</a>
        </div>
    </div>

<!-- Features Section -->

<section class="features">

    <div class="container text-center">

        <h2>Our Features</h2>

        <div class="row">

            <div class="col-md-4" data-aos="fade-up">

                <i class="fas fa-user-shield fa-3x"></i>

                <h3>Secure Access</h3>

                <p>We ensure your data is safe with our advanced security features.</p>

            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">

                <i class="fas fa-cogs fa-3x"></i>

                <h3>Easy Management</h3>

                <p>Manage users, content, and more with our intuitive dashboard.</p>

            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">

                <i class="fas fa-headset fa-3x"></i>

                <h3>24/7 Support</h3>

                <p>Our team is always here to help you, any time of the day.</p>

            </div>

        </div>

    </div>

</section>

 

<!-- Call to Action -->

<section class="cta">

    <div class="container text-center">

        <h2>Join Us Today</h2>

        <p>Sign up now and start experiencing the best features for free!</p>

        <a href="register.php" class="btn btn-warning">Register Now</a>

    </div>

</section>

 

<!-- Include Footer -->

<?php include 'include/footer.php'; ?>

 

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 

<!-- AOS Animation Script -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

    AOS.init();

</script>

 

<!-- Custom CSS -->

<style>

    body {

        font-family: 'Poppins', sans-serif;

    }

 

    /* Hero Section */

    .hero {

        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/hero-bg.jpg') center/cover;

        color: white;

        padding: 100px 0;

        text-align: center;

        animation: fadeIn 2s ease-in-out;

    }

 

    @keyframes fadeIn {

        from { opacity: 0; }

        to { opacity: 1; }

    }

 

    .hero h1 {

        font-size: 48px;

        font-weight: 600;

        animation: slideIn 1.5s ease-in-out;

    }

 

    @keyframes slideIn {

        from { transform: translateY(-20px); opacity: 0; }

        to { transform: translateY(0); opacity: 1; }

    }

 

    .hero p {

        font-size: 20px;

        margin-bottom: 20px;

        opacity: 0;

        animation: fadeIn 2s ease-in-out forwards 1s;

    }

 

    .btn {

        padding: 10px 20px;

        font-size: 18px;

        border-radius: 5px;

        text-decoration: none;

        transition: 0.3s;

    }

 

    .btn-primary {

        background-color: #3498DB;

        color: white;

    }

 

    .btn-primary:hover {

        background-color: #2980B9;

    }

 

    .btn-success {

        background-color: #2ECC71;

        color: white;

    }

 

    .btn-success:hover {

        background-color: #27AE60;

    }

 

    .btn-warning {

        background-color: #F39C12;

        color: white;

    }

 

    .btn-warning:hover {

        background-color: #D68910;

    }

 

    /* Features Section */

    .features {

        padding: 60px 0;

        background: #f9f9f9;

    }

 

    .features h2 {

        margin-bottom: 40px;

        font-size: 32px;

        font-weight: 600;

    }

 

    .features i {

        color: #3498DB;

        margin-bottom: 15px;

    }

 

    /* Call to Action Section */

    .cta {

        background: #2C3E50;

        color: white;

        padding: 60px 0;

    }

 

    .cta h2 {

        font-size: 36px;

        font-weight: 600;

    }

 

    .cta p {

        font-size: 20px;

        margin-bottom: 20px;

    }

</style>

</body>
</html>