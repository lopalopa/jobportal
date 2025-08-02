<?php

if (session_status() === PHP_SESSION_NONE) {

    session_start();

}

// Check if user is logged in

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit();

}

 

// Get user role

$user_role = $_SESSION['user_role'];

?>
<aside class="sidebar">

    <div class="sidebar-header">

        <h2>Dashboard</h2>

        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

    </div>

    <ul class="sidebar-menu">

        <li><a href="index.php">Home</a></li>

        <?php if ($user_role === 'admin') { ?>

            <li><a href="../admin/manage_users.php">Manage Users</a></li>
            <li><a href="../employer/add_employer.php">Add Employer</a></li>
            <li><a href="../jobs/manage_jobs.php">Job details</a></li>
            <li><a href="../employer/view_applicants.php">View Applicants</a></li>


            <li><a href="reports.php">Reports</a></li>

            <li><a href="settings.php">Settings</a></li>

        <?php } else { ?>
                        <li><a href="new_user_dashboard.php">Dashboard</a></li>


            <li><a href="profile.php">My Profile</a></li>
            <li><a href="../jobs/job_list.php">view jobs</a></li>
            


        <?php } ?>

        <li><a href="../auth/logout.php" class="logout-btn">Logout</a></li>

    </ul>

</aside>

 

<!-- JavaScript for Sidebar Toggle -->

<script>

    function toggleSidebar() {
document.querySelector(".sidebar").classList.toggle("collapsed");
}


</script>

 

<!-- Sidebar Styles -->

<style>

    /* Sidebar Styles */

    .sidebar {

        position: fixed;

        left: 0;

        top: 0;

        width: 250px;

        height: 100%;

        background-color: #2C3E50;

        color: white;

        transition: 0.3s;

        padding-top: 20px;

    }

 

    .sidebar-header {

        text-align: center;

        padding: 10px;

        font-size: 20px;

        font-weight: bold;

        background-color: #1ABC9C;

        color: white;

        position: relative;

    }

 

    .toggle-btn {

        position: absolute;

        right: 10px;

        top: 10px;

        background: none;

        border: none;

        color: white;

        font-size: 24px;

        cursor: pointer;

    }

 

    .sidebar-menu {

        list-style: none;

        padding: 0;

        margin: 0;

    }

 

    .sidebar-menu li {

        padding: 15px 20px;

    }

 

    .sidebar-menu a {

        color: white;

        text-decoration: none;

        display: block;

        transition: 0.3s;

    }

 

    .sidebar-menu a:hover {

        background-color: #1ABC9C;

        border-radius: 5px;

    }

 

    .logout-btn {

        background-color: #E74C3C;

        color: white;

        padding: 10px;

        display: block;

        text-align: center;

        margin: 20px;

        border-radius: 5px;

        transition: 0.3s;

    }

 

    .logout-btn:hover {

        background-color: #C0392B;

    }

 

    /* Collapsed Sidebar */

    .collapsed {

        width: 60px;

    }

 

    .collapsed .sidebar-menu li {

        text-align: center;

        padding: 15px 0;

    }

 

    .collapsed .sidebar-menu a {

        font-size: 0;

    }

 

    @media (max-width: 768px) {

        .sidebar {

            width: 60px;

        }

 

        .sidebar-menu li {

            text-align: center;

            padding: 15px 0;

        }

 

        .sidebar-menu a {

            font-size: 0;

        }

 

        .collapsed {

            width: 250px;

        }

 

        .collapsed .sidebar-menu a {

            font-size: 16px;

        }

    }

</style>