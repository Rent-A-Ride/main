<?php

?>

<div class="admin_overView-top-container">
        <div class="admin_overView-card admin_overView-card_1 ">
            <div><span>No Of Vehicle Owners</span></div>
            <div><span><?=$vowner_count[0]['veho_count']?></span></div>
        </div>
        <div class="admin_overView-card">
            <div><span>No Of Vehicles</span></div>
            <div><span><?=$vehicle_count[0]['veh_count'] ?></span></div>
        </div>
        <div class="admin_overView-card">
            <div><span>No Of Drivers</span></div>
            <div><span><?=$driver_count[0]['driver_count'] ?></span></div>
        </div>
        <div class="admin_overView-card">
            <div><span>No Of Customers</span></div>
            <div><span><?=$customer_count[0]['customer_count'] ?></span></div>
        </div>
</div>
    <div class="admin_overView-bottum-container">
        <div class="admin_overView-card admin_overView-card_1 ">
            <canvas id="myChart" ></canvas>
        </div>
        <div class="admin_overView-card">
            <canvas id="test1" ></canvas>
        </div>
    </div>
    
    