<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin/admin-dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Rent-A-Ride</title>
</head>
<body>

<section id="side-bar">
    <div class="logo">
        <img src="/assets/img/logo.png" alt="" class="logo-image">
    </div>


    <ul class="side-bar-menu top">
        <li class="<?php 
        if($function=='Dashboard'){
            echo ('active');
        }
        ?>">
            <a href="/owner">
                <img src="/assets/img/admin_img/dashboard.png" class="pic4">
                <span>Dashboard</span>
            </a>

        </li>
        <li class="<?php 
        if($function=='Profile'){
            echo ('active');
        }
        ?>">
            <a href="/ownerProfile">
                <img src="/assets/img/admin_img/profile.png" class="pic">
                <span>Profile</span>
            </a>

        </li>
        <li class="<?php 
        if($function=='Vehicle'){
            echo ('active');
        }
        ?>">
            <a href="/admin-vehicle">
                <img src="/assets/img/admin_img/d.jpg" class="pic">
                <span>Vehicle</span>
            </a>

        </li>
        <li class="<?php 
        if($function=='Customer'){
            echo ('active');
        }
        ?>">
            <a href="/admin_customer">

                <img src="/assets/img/admin_img/customer.png" class="pic">
                <span>Customer</span>

            </a>

        </li>
        <li class="<?php 
        if($function=='Vehicle Owner'){
            echo ('active');
        }
        ?>">
            <a href="/viewVehicleowner">
                <img src="/assets/img/admin_img/e.jpg" class="pic">
                <span>Vehicle Owner</span>
            </a>

        </li>
        <li class="<?php 
        if($function=='Driver'){
            echo ('active');
        }
        ?>">
            <a href="/viewownerDriver">
                <img src="/assets/img/admin_img/driver.png" class="pic">
                <span>Driver</span>
            </a>

        </li>
        <li class="<?php 
        if($function=='Payment'){
            echo ('active');
        }
        ?>">
            <a href="#">
                <img src="/assets/img/admin_img/g.jpg" class="pic">
                <span>Payment</span>
            </a>

        </li>

    </ul>
    <ul class="side-bar-menu bottum">


        <li id="bottumadmin" class="<?php 
        if($function=='Settings'){
            echo ('active');
        }
        ?>">
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
                 
                <img src="/assets/img/user_profile/<?php echo ($profile_img[0]['profile_img'])?>" alt="" class="profile">

            </a>
            <p class="name"><?php echo($profile_img[0]['first_Name']." ".$profile_img[0]['last_Name']) ?></p>


        </nav>
    </div>


    <div class="admin_dashboardrest">
        {{content}}
    </div>
</section>

<script src="/assets/javascript/admin-dashboard.js"></script>
</body>
</html>
