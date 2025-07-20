<?php

session_start();

 // Check if user is logged in

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit();

}

 

// Get user role

$user_role = $_SESSION['user_role'];

$user_name = $_SESSION['user_name'];
 // Assuming the session stores the user’s name

?>


<header>

    <nav class="navbar">

        <div class="nav-logo">

        </div>

        <ul class="nav-links">

            <li><a href="index.php">Home</a></li>

            <?php if ($user_role === 'admin') { ?>

                <li><a href="manage_users.php">Manage Users</a></li>

                <li><a href="reports.php">Reports</a></li>

                <li><a href="settings.php">Settings</a></li>

            <?php }else { ?>

                <li><a href="profile.php">My Profile</a></li>

                <li><a href="user_dashboard.php">Dashboard</a></li>

            <?php } ?>

            <li class="user-info">Welcome, <strong><?php echo htmlspecialchars($user_name); ?></strong></li>

            <li><a href="logout.php" class="logout-btn">Logout</a></li>

        </ul>

        <button class="menu-toggle" onclick="toggleMenu()">☰</button>

    </nav>

</header>

 

<!-- JavaScript for Mobile Menu -->

<script>

    function toggleMenu() {

        document.querySelector(".nav-links").classList.toggle("active");

    }

</script>

 

<!-- Header Styles -->

<style>

    /* Header Styles */

    header {

        background-color: #2C3E50;

        padding: 10px 0;

        width: 100%;

        position: fixed;

        top: 0;

        left: 0;

        z-index: 1000;

    }

 

    .navbar {

        display: flex;

        justify-content: space-between;

        align-items: center;

        max-width: 1200px;

        margin: auto;

        padding: 0 20px;

    }

 

    .nav-logo a {

        color: white;

        font-size: 22px;

        font-weight: bold;

        text-decoration: none;

    }

 

    .nav-links {

        list-style: none;

        display: flex;

        align-items: center;

        margin: 0;

        padding: 0;

    }

 

    .nav-links li {

        margin: 0 15px;

    }

 

    .nav-links a {

        text-decoration: none;

        color: white;

        font-size: 16px;

        padding: 8px 12px;

        transition: 0.3s;

    }

 

    .nav-links a:hover {

        background-color: #1ABC9C;

        border-radius: 5px;

    }

 

    .user-info {

        color: #1ABC9C;

        font-weight: bold;

    }

 

    .logout-btn {

        background-color: #E74C3C;

        color: white;

        padding: 8px 12px;

        border-radius: 5px;

        text-decoration: none;

        transition: 0.3s;

    }

 

    .logout-btn:hover {

        background-color: #C0392B;

    }

 

    /* Mobile Navigation */

    .menu-toggle {

        display: none;

        font-size: 24px;

        background: none;

        border: none;

        color: white;

        cursor: pointer;

    }

 

    @media (max-width: 768px) {

        .nav-links {

            display: none;

            flex-direction: column;

            width: 100%;

            background: #2C3E50;

            position: absolute;

            top: 50px;

            left: 0;

            padding: 10px 0;

        }

 

        .nav-links.active {

            display: flex;

        }

 

        .nav-links li {

            text-align: center;

            margin: 10px 0;

        }

 

        .menu-toggle {

            display: block;

        }

    }

</style>