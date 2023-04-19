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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/vehicleOwner/vehicleOwner-dashboard.css">


    <!-- JQUERY -->
    <script src="assets/javascript/jquery-3.6.3.min.js"></script>

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

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
            <a href="/vehicleOwner/Profile">
                <i class='bx bx-user-pin'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li>
            <a href="/vehicleowner_vehicle">
                <i class='bx bx-car' ></i>
                <span class="links_name">Vehicles</span>
            </a>
            <span class="tooltip">Vehicles</span>
        </li>
        <li>
            <a href="/CustomerPendingRequest">
                <i class="fa-regular fa-address-card"></i>
                <span class="links_name">Requests</span>
            </a>
            <span class="tooltip">Requests</span>
        </li>
        <li>
            <a href="/Customer/ExpieringNotification">
                <i class="fa-regular fa-bell"></i>
                <span class="links_name">Notification</span>
            </a>
            <span class="tooltip">Notification</span>
        </li>
        <li>
            <a href="/vehicleOwner/Payments">
                <i class='bx bx-wallet' ></i>
                <span class="links_name">Payment</span>
            </a>
            <span class="tooltip">Payment</span>
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
                <span class="profile-name">Buddhi Yapa</span>
                <div class="img-cont"><img src="" class="profile-image"></div>
            </div>

        </ul>
        <div id="toggle-btn" class="menu-container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </nav>
<!--    --><?php //if (Application::$app->session->getFlash('profileUpdate')):?>
<!--        <div class="flash-message success">-->
<!--            --><?php //= Application::$app->session->getFlash('profileUpdate') ?>
<!--        </div>-->
<!--    --><?php //endif; ?>

    <div class="dashboardRest">
        {{content}}
    </div>



</div>


</body>
<script src="/assets/javascript/component/navbar.js"></script>
<script src="/assets/javascript/component/sidebar.js"></script>
<script src="/assets/javascript/component/search.js"></script>
<script src="/assets/javascript/vehicleOwner/popup.js"></script>
<script src="/assets/javascript/adminaddVehicle.js"></script>
<script src="/assets/javascript/vehicleOwner/dateValidation/datevalidation.js"></script>
<script src="/assets/javascript/vehicleOwner/components/popup.js"></script>
<script src="/assets/javascript/vehicleOwner/components/CustomerReq.js"></script>
<script src="/assets/javascript/vehicleOwner/profile.js"></script>
<script src="/assets/javascript/vehicleOwner/AddNewVehicle.js"></script>
</html>
