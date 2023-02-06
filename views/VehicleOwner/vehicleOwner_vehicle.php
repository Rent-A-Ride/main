
<?php

use \app\controllers\VehicleController;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<div class="body">
<div class="ownerVehicleContainer">

    <div class="admin-vehicle-first">
        <header class="header">

            <div class="owner-addvehicleheader">
                <div>
                    <form action="">
                        <div class="form-input">
                            <div class="form-input-input"><input type="search"></div>
                            <div class="form-input-search"><button class="vehicle-search"><i class="fa-solid fa-magnifying-glass"></i>Search..</button></div>
                        </div>
                    </form>
                </div>

                <div class="form-input-add"><a href="/add-vehicle" class="add-vehicle"><i class="fa-solid fa-plus"></i>Add New</a></div>

            </div>

        </header>
    </div>

    <div class="toggle-btns">

        <i class="fa-solid fa-list-ul btns" ></i>
        <i class="fa-solid fa-table-cells-large btns"></i>
    </div>

    <div class="project-container">

        <?php

           if ($result){
               foreach ($result as $row){

//                       print_r($row);
                   ?>
                    <div class="project">
                            <div class="veh_type">
                                <h2><?php echo $row["model"] ?></h2>

                            </div>
                            <div>

                                <div><img src="/assets/img/Vehicle_img/<?php echo $row['image']?>" alt="" class="vehicle-profile-image"></div>
                                <div class="top-menu">

                                    <button onclick="location.href='viewVehicleProfile'"><i class="fa-regular fa-eye"></i> View</button>
                                    <button><i class="fa-regular fa-pen-to-square"></i>Update</button>
                                    <button><i class="fa-solid fa-trash-can"></i>Delete</button>
                                </div>


                                <div class="vehicle-intro">
                                    <div class="vehicle-desc">

                                        <div>
                                            <i class="fa-regular fa-user"></i><?php echo $row["capacity"]?>
                                            <i class="fa-solid fa-sliders"></i><?php echo $row["veh_transmition"]?>
                                            <i class="fa-solid fa-gas-pump"></i><?php echo $row["fuel_type"]?>
                                        </div>

                                    </div>
                                    <div class="vehicle-fee">
                                        <?php  echo "RS:"?>
                                        <?php echo $row["price"] ?>
                                        <?php echo "(Per day)" ?>
                                    </div>
                                    <div class="vehicle-availability">
                                        <div class="vehicle-availability-show">
                                            <?php
                                            if($row["availability"]===0){

                                            }
                                            else{

                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            if($row["availability"]===1){
                                                echo "Availabe";
                                            }
                                            else{
                                                echo "Booked";
                                            }
                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
<!--                                <div class="top-menu">-->
<!---->
<!--                                    <button><i class="fa-regular fa-eye"></i> View</button>-->
<!--                                    <button><i class="fa-regular fa-pen-to-square"></i>Update</button>-->
<!--                                    <button><i class="fa-solid fa-trash-can"></i>Delete</button>-->
<!--                                </div>-->
<!---->
<!--                                <div><img src="/assests/img/Vehicle_img/--><?php //echo $row['image']?><!--" alt="" class="vehicle-profile-image"></div>-->
<!--                                <div class="vehicle-intro">-->
<!--                                    <div class="vehicle-desc">-->
<!---->
<!--                                        <div>-->
<!--                                            <i class="fa-regular fa-user"></i>--><?php //echo $row["capacity"]?>
<!--                                            <i class="fa-solid fa-sliders"></i>--><?php //echo $row["veh_transmition"]?>
<!--                                            <i class="fa-solid fa-gas-pump"></i>--><?php //echo $row["fuel_type"]?>
<!--                                        </div>-->
<!---->
<!--                                    </div>-->
<!--                                    <div class="vehicle-fee">-->
<!--                                        --><?php // echo "RS:"?>
<!--                                        --><?php //echo $row["price"] ?>
<!--                                        --><?php //echo "(Per day)" ?>
<!--                                    </div>-->
<!--                                    <div class="vehicle-availability">-->
<!--                                        <div class="vehicle-availability-show">-->
<!--                                            --><?php
//                                                if($row["availability"]===0){
//
//                                                }
//                                                else{
//
//                                                }
//                                            ?>
<!--                                        </div>-->
<!--                                        <div>-->
<!--                                            --><?php
//                                            if($row["availability"]===1){
//                                                echo "Availabe";
//                                            }
//                                            else{
//                                                echo "Booked";
//                                            }
//                                            ?>
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
                        </div>

    <?php
               }

            }

     ?>

<!--            <div class="project">-->
<!---->
<!--                <div class="top-menu">-->
<!---->
<!--                    <button><i class="fa-regular fa-eye"></i> View</button>-->
<!--                    <button><i class="fa-regular fa-pen-to-square"></i>Update</button>-->
<!--                    <button><i class="fa-solid fa-trash-can"></i>Delete</button>-->
<!--                </div>-->
<!---->
<!--                <img src="vehicle-profile-1.png" alt="" class="vehicle-profile-image">-->
<!--                <div class="vehicle-intro">-->
<!--                    <div class="vehicle-desc">-->
<!--                        <p>-->
<!--                            What’s the first thing buyers do when they decide it’s time to purchase a vehicle? Nine times out of ten they start looking online. Once buyers decide on the make and model of a vehicle they want to purchase, their attention turns to finding vehicles that are for sale. That’s when they start reading vehicle descriptions.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="vehicle-fee">-->
<!--                        RS:350-->
<!--                    </div>-->
<!--                    <div class="vehicle-availability">Availability</div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="project">-->
<!---->
<!--                <div class="top-menu">-->
<!---->
<!--                    <button><i class="fa-regular fa-eye"></i> View</button>-->
<!--                    <button><i class="fa-regular fa-pen-to-square"></i>Update</button>-->
<!--                    <button><i class="fa-solid fa-trash-can"></i>Delete</button>-->
<!--                </div>-->
<!---->
<!--                <img src="vehicle-profile-1.png" alt="" class="vehicle-profile-image">-->
<!--                <div class="vehicle-intro">-->
<!--                    <div class="vehicle-desc">-->
<!--                        <p>-->
<!--                            What’s the first thing buyers do when they decide it’s time to purchase a vehicle? Nine times out of ten they start looking online. Once buyers decide on the make and model of a vehicle they want to purchase, their attention turns to finding vehicles that are for sale. That’s when they start reading vehicle descriptions.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="vehicle-fee">-->
<!--                        RS:350-->
<!--                    </div>-->
<!--                    <div class="vehicle-availability">Availability</div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="project">-->
<!---->
<!--                <div class="top-menu">-->
<!---->
<!--                    <button><i class="fa-regular fa-eye"></i> View</button>-->
<!--                    <button><i class="fa-regular fa-pen-to-square"></i>Update</button>-->
<!--                    <button><i class="fa-solid fa-trash-can"></i>Delete</button>-->
<!--                </div>-->
<!---->
<!--                <img src="vehicle-profile-1.png" alt="" class="vehicle-profile-image">-->
<!--                <div class="vehicle-intro">-->
<!--                    <div class="vehicle-desc">-->
<!--                        <p>-->
<!--                            What’s the first thing buyers do when they decide it’s time to purchase a vehicle? Nine times out of ten they start looking online. Once buyers decide on the make and model of a vehicle they want to purchase, their attention turns to finding vehicles that are for sale. That’s when they start reading vehicle descriptions.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="vehicle-fee">-->
<!--                        RS:350-->
<!--                    </div>-->
<!--                    <div class="vehicle-availability">Availability</div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="project">-->
<!---->
<!--                <div class="top-menu">-->
<!---->
<!--                    <button><i class="fa-regular fa-eye"></i> View</button>-->
<!--                    <button><i class="fa-regular fa-pen-to-square"></i>Update</button>-->
<!--                    <button><i class="fa-solid fa-trash-can"></i>Delete</button>-->
<!--                </div>-->
<!---->
<!--                <img src="vehicle-profile-1.png" alt="" class="vehicle-profile-image">-->
<!--                <div class="vehicle-intro">-->
<!--                    <div class="vehicle-desc">-->
<!--                        <p>-->
<!--                            What’s the first thing buyers do when they decide it’s time to purchase a vehicle? Nine times out of ten they start looking online. Once buyers decide on the make and model of a vehicle they want to purchase, their attention turns to finding vehicles that are for sale. That’s when they start reading vehicle descriptions.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                    <div class="vehicle-fee">-->
<!--                        RS:350-->
<!--                    </div>-->
<!--                    <div class="vehicle-availability">Availability</div>-->
<!---->
<!--                </div>-->
<!---->
<!---->
<!--            </div>-->
    </div>
</div>

</div>