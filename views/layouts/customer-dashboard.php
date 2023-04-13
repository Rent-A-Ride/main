<?php

use app\core\Application; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent A Ride</title>

    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/customer.css">


    <!-- JQUERY -->
    <script src="/assets/javascript/component/jquery-3.6.3.min.js"></script>

</head>
<body>

<!-- sidebar -->

<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Rent A Ride</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="side-list">
        <li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>

        <li>
            <a href="/Customer/Home">
                <i class='bx bx-home' ></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="/Customer/Home">
                <i class='bx bx-car' ></i>
                <span class="links_name">View Vehicles</span>
            </a>
            <span class="tooltip">view vehicles</span>
        </li>
        <li>
            <a href="/Customer/Profile">
                <i class='bx bx-user-pin'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li>
            <a href="/Customer/VehicleBookingTable">
                <i class='bx bx-id-card'></i>
                <span class="links_name">Booking</span>
            </a>
            <span class="tooltip">Booking</span>
        </li>
        <li>
            <a href="/Customer/Payment">
                <i class='bx bx-wallet' ></i>
                <span class="links_name">Payment</span>
            </a>
            <span class="tooltip">Payment</span>
        </li>
        <li>
            <a href="/Customer/Settings">
                <i class='bx bx-cog'></i>
                <span class="links_name">Settings</span>
            </a>
            <span class="tooltip">Settings</span>
        </li>

        <li class="profile">
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
            <div class="notification-cont">
                <div class="notification-icon">
                    <i class='bx bx-bell'></i></i>
                    <span class="notification-count">5</span>
                </div>

                <div class="notification-panel">
                    <div class="notification-header">
                        <h3>Notifications</h3>
                        <button class="close-btn">&times;</button>
                    </div>
                    <ul class="notification-list">
                        <li><a href="#">New message from John</a></li>
                        <li><a href="#">You have 3 new emails</a></li>
                        <li><a href="#">Today's weather forecast</a></li>
                        <li><a href="#">Upcoming event reminder</a></li>
                        <li><a href="#">New product release</a></li>
                    </ul>
                </div>

            </div>
            <!-- <li class="list-item 1"><a href="#">Sign in</a></li>
            <li class="list-item 2"><a href="#">Register</a></li>       -->
            <div class="profile-cont">
                <span class="profile-name"><?= Application::$app->user->displayName(); ?></span>
                <div class="img-cont"><img src="/assets/img/uploads/userProfile/<?= Application::$app->user->userprofile('profile_pic')?>" class="profile-image"></div>
            </div>

        </ul>
        <div id="toggle-btn" class="menu-container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </nav>
    <?php if (Application::$app->session->getFlash('profileUpdate')):?>
        <div class="flash-message success">
            <?= Application::$app->session->getFlash('profileUpdate') ?>
        </div>
    <?php endif; ?>
    <?php if (Application::$app->session->getFlash('success')):?>
        <div class="flash-message success">
            <?= Application::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?php if (Application::$app->session->getFlash('error')):?>
        <div class="flash-message error">
            <?= Application::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

    <div class="banner-msg">
        <h1>FAST AND EASY WAY TO <span class="bold yellow">RENT A VEHICLE</span></h1>
    </div>

    {{content}}

</div>


</body>
<script src="/assets/javascript/components/navbar.js"></script>
<script src="/assets/javascript/components/sidebar.js"></script>
<script src="/assets/javascript/customer/components/search.js"></script>
<script src="/assets/javascript/customer/components/details.js"></script>
<script src="/assets/javascript/customer/components/booking.js"></script>
<script src="/assets/javascript/customer/components/profile.js"></script>
<script src="/assets/javascript/customer/components/date-validation.js"></script>
</html>
