<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Nav CSS -->
    <link rel="stylesheet" href="<?php echo \app\core\Application::$ROOT_DIR?>/public/assets/css/main.css">

    <title>Rent A Ride</title>


    <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>

    <nav class="navbar">
        <div class="container-icon">
            <a href=""><img class="logo" src="/assets/img/logo.png" alt="Rent a Ride Logo"></a>
        </div>
        <ul class="nav-list" id="nav-list">
            <li class="list-item 1"><a href="/login">Sign in</a></li>
            <li class="list-item 2"><a href="/register">Register</a></li>
        </ul>
        <div id="toggle-btn" class="menu-container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </nav>


    {{content}}

</body>

</html>
