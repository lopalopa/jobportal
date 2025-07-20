<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Portal</title>

    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS for Slideshow and Styles -->
    <style>
        /* General body and page settings */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Slideshow */
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .mySlides {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        /* Styling for the landing page container */
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

        /* Buttons */
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

        /* Footer */
        footer {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .landing-title {
                font-size: 2rem;
            }

            .landing-description {
                font-size: 1rem;
            }

            .button {
                font-size: 1rem;
                padding: 12px 25px;
            }
        }
    </style>

</head>
<body>

    <!-- Slideshow Container -->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="https://via.placeholder.com/1500x800/4CAF50/FFFFFF?text=Find+Your+Dream+Job" class="mySlides">
            <div class="text">Find Your Dream Job Today!</div>
        </div>

        <div class="mySlides fade">
            <img src="https://via.placeholder.com/1500x800/2196F3/FFFFFF?text=Empower+Your+Career" class="mySlides">
            <div class="text">Empower Your Career with Top Companies</div>
        </div>

        <div class="mySlides fade">
            <img src="https://via.placeholder.com/1500x800/FFC107/FFFFFF?text=Hiring+Top+Talent" class="mySlides">
            <div class="text">Hiring Top Talent Has Never Been Easier</div>
        </div>
    </div>

    <!-- Landing Page Content -->
    <div class="landing-container">
        <h1 class="landing-title">Welcome to Job Portal</h1>
        <p class="landing-description">Find the best job opportunities or post your job listing here. Start your journey with us today.</p>

        <div>
            <a href="list_jobs.php" class="button">Browse Job Listings</a>
            <a href="list_employers.php" class="button">Employer Listings</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Job Portal. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript for Slideshow -->
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            slides[slideIndex - 1].style.display = "block";  
            setTimeout(showSlides, 3000); // Change slide every 3 seconds
        }
    </script>

</body>
</html>
