<?php

use app\core\Application;

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent A Ride</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/driver/driver-dashboard.css">
    

    <!-- JQUERY -->
    <script src="assets/javascript/jquery-3.6.3.min.js"></script>

</head>
<body>

<!-- sidebar -->

<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Rent A Ride</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="side-list">
        <!-- <li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li> -->

        <!-- <li>
            <a href="/home">
                <i class='bx bx-home' ></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li> -->
        <!-- <li>
            <a href="#">
                <i class='bx bx-car' ></i>
                <span class="links_name">View Vehicles</span>
            </a>
            <span class="tooltip">view vehicles</span>
        </li> -->
        <li>
            <a href="/driver/driver_profile">
                <i class='bx bx-user-pin'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li>
            <a href="/driver/availability">
                <i class='bx bx-calendar'></i>
                <span class="links_name">Availability</span>
            </a>
            <span class="tooltip">Availability</span>
        </li>
        <li>
            <a href="/driver/requests">
                <i class='bx bxs-user-plus' ></i>
                <span class="links_name">Request</span>
            </a>
            <span class="tooltip">Request</span>
        </li>
        <li>
            <a href="/driver/review">
                <i class='bx bx-star' ></i>
                <span class="links_name">Reviews</span>
            </a>
            <span class="tooltip">Reviews</span>
        </li>
        <li>
            <a href="/driver/payments">
                <i class='bx bx-wallet' ></i>
                <span class="links_name">Finance</span>
            </a>
            <span class="tooltip">Finance</span>
        </li>

        <li class="/logout">
            <a href="/logout" class="logout">
                <i class='bx bx-log-out' ></i>
                <span class="links_name">log out</span>
            </a>
        </li>

    </ul>
</div>


<div class="home-section">
    <!-- nav bar -->
    <nav class="navbar">
        <div class="container-icon">
            <a href=""><img class="logo" src="/assets/img/logo.png" alt="Rent a Ride Logo"></a>
        </div>
        <ul class="nav-list" id="nav-list">
            <!-- <li class="list-item 1"><a href="#">Sign in</a></li>
            <li class="list-item 2"><a href="#">Register</a></li>       -->
            <!-- <div class="vision"><p>Mobility Without Hassel</p> </div> -->
            <div class="profile-cont">
                <span class="profile-name"><?= Application::$app->user->displayName(); ?></span>
                <div class="img-cont"><img src="/assets/img/user_profile/<?= Application::$app->user->userprofile('profile_pic')?>" class="profile-image"></div>
                <div class="profile-menu" style="display: none;">
                    <a href="/ownerProfile">My Profile</a>
                    <a href="/admin/Settings">Settings</a>
                    <a href="/logout">Logout</a>
                </div>
            </div>

        </ul>
        <div id="toggle-btn" class="menu-container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </nav>

    <div class="dashboardRest">
        {{content}}
    </div>

    

</div>


</body>
<script src="/assets/javascript/component/navbar.js"></script>
<script src="/assets/javascript/component/sidebar.js"></script>
<script src="/assets/javascript/component/search.js"></script>
<script>
//     document.getElementById("edit-button").addEventListener("click", function(){
//     document.getElementById("profile-photo").style.display = "block";
//   });

        const modal = document.getElementById("profileModal");

        // Get the button that opens the modal
        const btn = document.getElementById("button28");

        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        function openModal() {
            console.log(modal)
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>
</html>
