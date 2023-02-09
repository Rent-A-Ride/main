
<?php

use \app\controllers\VehicleController;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<div class="body">
<div class="ownerVehicleContainer">

    <div class="admin-vehicle-first">
        <header class="header">

            <!-- <div class="owner-addvehicleheader">
                <div>
                    <form action="">
                        <div class="form-input">
                            <div class="form-input-input"><input type="search"></div>
                            <div class="form-input-search"><button class="vehicle-search"><i class="fa-solid fa-magnifying-glass"></i>Search..</button></div>
                        </div>
                    </form>
                </div>

                <div class="form-input-add"><a href="/add-vehicle" class="add-vehicle"><i class="fa-solid fa-plus"></i>Add New</a></div>

            </div> -->
            <div class="ownervehicleownerdsearchform">
                <div class="ownervehicleownerdsearchform1">
                    <form action="" method="">
                        <!-- <input type="search" class="VehicleownerSearch"> -->
                        <select class="VehicleownerSearch" id="veh_type">
                            <option value="All">All</option>
                            <option value="Scooter">Scooter</option>
                            <option value="Motorcycle">Motor Cycle</option>
                            <option value="Car">Car</option>
                            <option value="Van">Van</option>
                        </select>
                        <input type="submit" class="VehicleownerSearchbtn" value="Search">
                    </form>
                </div>

            <div class="ownervehicleownerdsearchform1">
                <form>
                    <select id="distrct">
                        <option value="All">All</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambatota">Hambatota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kaluthara">Kaluthara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Moneragala">Moneragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalama">Puttalama</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya" >Vavuniya</option>
                    </select>
                    <input type="submit" class="VehicleownerSearchbtn VehicleownerSearchbtn2" value="Location">

                </form>
        

            </div>

            <!-- <div class="form-input-addvehicleowner"><a href="/admin/add-vehicle" class="add-vehicleowner"><i class="fa-solid fa-plus"></i>ADD NEW</a></div> -->
    
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
                                    <?php $vehicle_id=$row["veh_Id"] ?>
                                    
                                    <button class="button_adminvehicle" onclick="location.href='/viewVehicleProfile?id=<?php echo $vehicle_id; ?>'"><i class="fa-regular fa-eye"></i> View</button>
                                    <button class="button_adminvehicle" onclick="location.href='/admin/accept_vehicle?id=<?php echo $vehicle_id; ?>'"><i class="fa-regular fa-circle-check"></i> Accept</button>
                                    <button class="button_adminvehicle"><i class="fa-solid fa-trash-can"></i>Decline</button>
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
                                        <!-- <div class="vehicle-availability-show">
                                            <?php
                                            if($row["availability"]===0){

                                            }
                                            else{

                                            }
                                            ?>
                                        </div> -->
                                        <!-- <div>
                                            <?php
                                            if($row["availability"]===1){
                                                echo "Availabe";
                                            }
                                            else{
                                                echo "Booked";
                                            }
                                            ?>

                                        </div> -->
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