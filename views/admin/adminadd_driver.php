<?php
/*  @var $row \app\models\cusVehicle*/
?>

<!-- SEARCH -->
<div class="search">
    <label class="label-l" for="search"><i class='bx bx-search'></i>Search </label>
    <input type="search" id="search" placeholder="Type to search">
   
    
</div>



<div class="table-container">
    <div id="table" class="table">
        <div class="table-header">
        <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Name</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Location</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Contact No</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Email</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
        </div>
        <div class="table-content" >
            <?php
            foreach ($driver as $row):
                ?>
                <div class="table-row <?=$row['driver_ID']?>">
                    <?php $user_id=$row["driver_ID"];   ?>
                    <div class="table-data"><img src="/assets/img/user_profile/<?php echo $row['profile_pic']?>" width="56px"></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["driver_Fname"]." ".$row["driver_Lname"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["area"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["phoneNo"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data"><?php echo ($row["email"]); ?></div>
                    <div class="table-data"></div>
                    <div class="table-data"><button onclick="location.href='/admin/driver/driverProfile?id=<?php echo $user_id; ?>'" class="book-button"><i class="fa-regular fa-eye"></i></button></div>
                    
			        <div class="table-data"><button data-driverid='<?php echo($row['driver_ID'])?>' data-drivername='<?php echo ($row["driver_Fname"]." ".$row["driver_Lname"]); ?>'class="book-button disable_driver"><i class="fa-solid fa-trash-can"></i></button></div>
                </div>
            <?php
            endforeach;
            ?>
            
        </div>
    </div>
</div>
<!-- <script src="/assets/javascript/admin/component/search.js"></script> -->
