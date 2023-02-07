<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/driver/driver-dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Rent-A-Ride</title>
</head>
<body>

<section id="side-bar">
    <div class="logo">
        <img src="/assets/img/logo.png" alt="" class="logo-image">
    </div>


    <ul class="side-bar-menu top">
        <li class="active">
            <a href="/driver/driver_profile">
            <img src="/assets/img/admin_img/profile.png" class="pic">
                <span>Profile</span>
            </a>

        </li>
        <li >
            <a href="/driver/requests">
            <img src="/assets/img/admin_img/profile.png" class="pic">
            
                <span>Requests</span>
            </a>

        </li>
        <!-- <li >
            <a href="admin-vehicle">
            <img src="/assests/img/driver.png" class="pic">
                <span>Drivers</span>
            </a>

        </li> -->
        <li>
            <a href="#">

                <img src="/assets/img/admin_img/g.jpg" class="pic">
                <span>Payments</span>

            </a>

        </li>
        <li>
            <a href="/driver/review">
                <i class="fa-regular fa-star"></i>
                <span>Reviews</span>
            </a>

        </li>
        <!-- <li>
            <a href="viewownerDriver">
                <img src="/assests/img/driver.png" class="pic">
                <span>Driver</span>
            </a>

        </li>
        <li>
            <a href="#">
                <img src="/assests/img/g.jpg" class="pic">
                <span>Payment</span>
            </a>

        </li> -->

    </ul>
    <ul class="side-bar-menu bottum1">


        <li id="bottum1">
            <a href="#">
                <img src="/assets/img/admin_img/settings.jpg" class="pic">
                <span>Settings</span>
            </a>

        </li>
        <li>
            <a href="/logout" class="logout">
                <img src="/assets/img/admin_img/logout.png" class="pic">
                <span>Logout</span>
            </a>

        </li>

    </ul>
</section>

<section id="content">
    <div class="admin-nav">
        <nav>
            <img src="/assets/img/admin_img/menu.png" alt="" class="pic1 bx">
            <a href="#" class="nav-link">Mobility without Hassle</a>
            <!-- <form action="">
                    <div class="form-input">
                        <input type="search">
                        <img src="./search.png" alt="" class="pic">
                    </div>
            </form> -->
            <a href="#" class="notification">
                <img src="/assets/img/admin_img/notification.png" alt="" class="pic3">
                <span class="num">8</span>
            </a>

            <a href="#">
                <img src="/assets/img/admin_img/my pic.jpeg" alt="" class="profile">

            </a>
            <p class="name">Mr.Kalana Weranga</p>


        </nav>
    </div>


    <div class="admin_dashboardrest">
        {{content}}
    </div>
</section>

<script src="/assets/javascript/admin-dashboard.js"></script>
</body>
</html>
