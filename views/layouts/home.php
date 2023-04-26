<?php

use app\core\Application;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="/assets/css/home/homeCard.css">
    <link rel="stylesheet" href="/assets/css/home/homeNav.css">
    <link rel="stylesheet" href="/assets/css/home/homeProfile.css">
    <link rel="stylesheet" href="/assets/css/home/homeSearch.css">
    <link rel="stylesheet" href="/assets/css/home/homeStyle.css">
    <link rel="stylesheet" href="/assets/css/home/homeTable.css">
    <title>Rent-A-Ride</title>
</head>
<body>

<section class="home-section">

<!-- Nav bar -->
    <!-- nav bar -->
    <nav class="navbar">
        <div class="container-icon">
            <a href=""><img class="logo" src="/assets/img/home_img/logo.png" alt="Rent a Ride Logo"></a>
        </div>
        <ul class="nav-list" id="nav-list">
            <?php if (Application::isGuest()):?>
            <li class="list-item 1"><a href="/login">Sign in</a></li>
            <li class="list-item 2"><a href="/selectUserType">Register</a></li>
            <?php else: ?>
                <div class="profile-cont">
                <!--  Here I used ucfirst to make the first letter of user to capital -->
                    <a href="/<?= ucfirst(Application::whoIsThis())?>/Profile">
                    <span class="profile-name"><?= Application::$app->user->displayName(); ?></span>
                    </a>
                    <div class="img-cont"><img src="/assets/img/uploads/userProfile/<?= Application::$app->user->userprofile('profile_pic')?>" class="profile-image"></div>

                    <div class="profile-menu" style="display: none;">
                        <a href="/Customer/Profile">My Profile</a>
                        <a href="/Customer/Settings">Settings</a>
                        <a href="/logout">Logout</a>
                    </div>

                </div>
                <li class="logout "><a href="/logout"><i class='bx bx-log-in-circle bx-sm'></i></a></li>
            <?php endif; ?>
        </ul>
        <div id="toggle-btn" class="menu-container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </nav>
<!--<main class="container">-->
{{content}}
<!--</main>-->

</section>


<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Rent-A-Ride is a leading provider of vehicle rental services, offering a wide selection of cars, scooters, motorcycles, and vans to customers across the country. </p>
        </div>
        <div class="footer-section">
            <h3> Contact Us</h3>
            <p><i class='bx bx-at'></i> Email: askrenaride@gmail.com</p>
            <p><i class='bx bx-phone-call' ></i> Phone: 0716894655</p>
        </div>
        <div class="footer-section">
            <h3>Follow Us</h3>
            <ul>
                <li><a href="#"><i class='bx bxl-facebook'></i> /rentAride</a></li>
                <li><a href="#"><i class='bx bxl-twitter'></i> @rentaride</a></li>
                <li><a href="#"><i class='bx bxl-instagram' ></i> @rentAride</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Made with &#10084; by CS Group 24.   Rent-A-Ride &copy; All right reserved</p>
    </div>
</footer>


</body>

<script src="/assets/js/components/navbar.js"></script>
</html>
