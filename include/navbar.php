<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/css/style.css">

<title>Navbar</title>

<!-- Google Fonts & Icons -->

<link href="https://fonts.googleapis.com/css2? family=Poppins:wght@300;400;600&display=swap"rel="stylesheet">

<script
src="https://kit.fontawesome.com/a076d05399.js"

crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navigation Bar -->

<nav class="navbar">

<div class="nav-container">

<a href="index.php"class="logo">MyWebsite</a>

<ul class="nav-links">

<li><a href="index.php">Home</a></li>

<li><a href="about.php">About</a></li>

<li><a href="services.php">Services</a></li>

<li><a href="contact.php">Contact</a></li>

<?php if (isset($_SESSION['user_id'])) { ?>

<li><a href="dashboard.php">Dashboard</a></li>

<li><a href="/jobportal/auth/logout.php" class="btn-logout">Logout</a></li>

<?php } else { ?>

<li><a href="/jobportal/auth/new_login.php" class="btn-login">Login</a></li>

<li><a href="/jobportal/auth/new_register.php" class="btn-register">Register</a></li>

<?php } ?>

</ul>

<button class="menu-toggle"onclick="toggle Menu()">=</button>

</div>

</nav>

<!-- JavaScript for Mobile Menu -->

<script>

function toggle Menu() {

document.querySelector(".nav-links").classList.toggle("active");

}

</script>

<!-- Navbar Styles -->

<style>

*{
margin: 0;

padding: 0;

box-sizing: border-box;

font-family: 'Poppins', sans-serif;

}

.navbar {

width: 100%;

background: #2C3E50;

position: fixed;

top: 0;

left: 0;

display: flex;

justify-content: center;

padding: 15px 0;

z-index: 1000;

}
.nav-container {

width: 90%;

max-width: 1200px;

display: flex;

justify-content: space-between;

align-items: center;
}

logo {

font-size: 24px;

font-weight: bold;

color: white;

text-decoration: none;

}

.nav-links {

list-style: none;

display: flex;

}
.nav-links li {

margin: 0 15px;

}

.nav-links a {

color: white;

text-decoration: none;

font-size: 16px;

transition: 0.3s;

}

.nav-links a:hover {

color: #1ABC9C;

}

.btn-login, .btn-register {

padding: 8px 15px;

border-radius: 5px;

text-decoration: none;

transition: 0.3s;
}

.btn-login {

background-color: #3498DB;

color: white;

}

.btn-register {

background-color: #E74C3C;

color: white;

}

.btn-login:hover {

background-color: #2980B9;

}
.btn-register:hover {

background-color: #C0392B;

}

.btn-logout {

background-color: #E74C3C;

color: white;

padding: 8px 15px;

border-radius: 5px;

transition: 0.3s;

text-decoration: none;

}

.btn-logout:hover {

background-color: #C0392B;

}

.menu-toggle {
display: none;

background: none;

border: none;

font-size: 24px;

color: white;

cursor: pointer;

}

@media (max-width: 768px) {

.nav-links {

position: absolute;

top: 60px;

left: 0;

width: 100%;

background: #2C3E50;

display: none;

flex-direction: column;
text-align: center;

padding: 10px 0;

}

.nav-links.active {

display: flex;

}

.nav-links li {

margin: 10px 0;
}

.menu-toggle {

display: block;

}

}

</style>

</body>

</html>  
