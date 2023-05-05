<?php

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
    <!-- <link rel="stylesheet" href="assets/css/layout/style.css"> -->
    <link rel="stylesheet" href="/assets/css/admin/admin-dashboard.css">

    <!-- JQUERY -->
    <script src="/assets/javascript/component/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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

        <li class="<?php

        use app\core\Application;

        if($function=='Dashboard'){
            echo ('active');
        }
        ?>">
            <a href="/admin/OverView">
                <i class='bx bx-home' ></i>
                <span class="links_name">OverView</span>
            </a>
            <span class="tooltip">OverView</span>
        </li>
        <li class="<?php 
        if($function=='Profile'){
            echo ('active');
        }
        ?>">
            <a href="/ownerProfile">
                <i class='bx bx-user-pin'></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>
        <li class="<?php 
        if($function=='Vehicle'){
            echo ('active');
        }
        ?>">
            <a href="/admin-vehicle">
                <i class='bx bx-car' ></i>
                <span class="links_name">View Vehicles</span>
            </a>
            <span class="tooltip">view vehicles</span>
        </li>
        
        <!-- <li>
            <a href="#">
                <i class='bx bx-id-card'></i>
                <span class="links_name">Booking</span>
            </a>
            <span class="tooltip">Booking</span>
        </li> -->
        <li class="<?php 
        if($function=='Customer'){
            echo ('active');
        }
        ?>">
            <a href="/admin_customer">
                <i class="fa-regular fa-user"></i>
                <span class="links_name">view Customer</span>
            </a>
            <span class="tooltip">view Customer</span>
        </li>
        <!-- <li>
            <a href="#">
                <i class='bx bx-wallet' ></i>
                <span class="links_name">view Customer</span>
            </a>
            <span class="tooltip">view Customer</span>
        </li> -->
        <li class="<?php 
        if($function=='Vehicle Owner'){
            echo ('active');
        }
        ?>">
            <a href="/viewVehicleowner">
                <i class="fa-solid fa-person-biking"></i>
                <span class="links_name">view Vehicle Owner</span>
            </a>
            <span class="tooltip">view Vehicle Owner</span>
        </li>
        <!-- <li>
            <a href="#">
                <i class='bx bx-wallet' ></i>
                <span class="links_name">view Vehicle Owner</span>
            </a>
            <span class="tooltip">view Vehicle Owner</span>
        </li> -->
        <li class="<?php 
        if($function=='Driver'){
            echo ('active');
        }
        ?>">
            <a href="/viewownerDriver">
                <i class="fa-regular fa-address-card"></i>
                <span class="links_name">view Driver</span>
            </a>
            <span class="tooltip">view Driver</span>
        </li>
        <li class="<?php 
        if($function=='complaint'){
            echo ('active');
        }
        ?>">
            <a href="/admin/vehicleComplaint">
                <i class="fa-sharp fa-regular fa-comment"></i>
                <span class="links_name">Complaint</span>
            </a>
            <span class="tooltip">Complaint</span>
        </li>
        <li class="<?php 
        if($function=='licenseexpiring'){
            echo ('active');
        }
        ?>">
            <a href="/admin/license_Exp">
                <i class="fa-regular fa-calendar-xmark"></i>
                <span class="links_name">License Expiering</span>
            </a>
            <span class="tooltip">License Expiering</span>
        </li>
        <li class="<?php 
        if($function=='Payment'){
            echo ('active');
        }
        ?>">
            <a href="/admin/managepayment">
                <i class='bx bx-wallet' ></i>
                <span class="links_name">Payment</span>
            </a>
            <span class="tooltip">Payment</span>
        </li>
        <li class="<?php 
        if($function=='Settings'){
            echo ('active');
        }
        ?>">
            <a href="/admin/Settings">
                <i class="fa-solid fa-gear"></i>
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
            <!-- <li class="list-item 1"><a href="#">Sign in</a></li>
            <li class="list-item 2"><a href="#">Register</a></li>       -->
            <!-- <div class="vision"><p>Mobility Without Hassel</p> </div> -->
            <div class="profile-cont">
                <span class="profile-name"><?= Application::$app->user->displayName(); ?></span>
                <div class="img-cont"><img src="/assets/img/user_profile/<?= Application::$app->user->userprofile('profile_pic')?>" class="profile-image"></div>

            </div>

            <!-- This is corrected! -->
            <div class="profile-menu" style="display: none;">
                <a href="/ownerProfile">My Profile</a>
                <a href="/admin/Settings">Settings</a>
                <a href="/logout">Logout</a>
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

    <!-- <div class="banner-msg">
        <h1>FAST AND EASY WAY TO <span class="bold yellow">RENT A VEHICLE</span></h1>
    </div> -->
    <div class="dashboardRest">
        {{content}}
    </div>
    

</div>


</body>
<!-- <script src="/assets/javascript/component/navbar.js"></script>
<script src="/assets/javascript/component/sidebar.js"></script>
<script src="/assets/javascript/component/search.js"></script>
<script src="/assets/javascript/admin/adminOverview.js"></script>
<script src="/assets/javascript/admin/details.js"></script>
<script src="/assets/javascript/utils/index.js"></script>
<script src="/assets/javascript/component/Modal.js"></script>
<script src="/assets/javascript/admin/vehicle_complaint.js"></script> -->
<script type="module" src="/assets/javascript/index.js"></script>
<script type="module" src="/assets/javascript/admin/profile.js"></script>


</html>
