
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

           
            <!-- <div class="form-input-addvehicleowner"><a href="/admin/vehicle/add_vehicle" class="add-vehicleowner"><i class="fa-solid fa-plus"></i>ADD NEW</a></div> -->
        </div>

        </header>
    </div>

    <div class="toggle-btns">
        <div class="form-input-addvehicleowner"></div>
        <!-- <i class="fa-solid fa-list-ul btns" ></i>
        <i class="fa-solid fa-table-cells-large btns"></i> -->
    </div>

    <div class="project-container">

        <?php
          
            // var_dump($result);
            // die();
           if ($result){
               foreach ($result as $row){

                    // var_dump($row['plate_No']);
                    // die();
                   ?>
                    <div class="project">
                            <div class="veh_type">
                                <h2 style="color:#FAB84C ;"><?php echo $row["veh_model"] ?></h2>

                            </div>
                            <div>

                                <div><img src="/assets/img/Vehicle_img/<?php echo $row['front_view']?>" alt="" class="vehicle-profile-image"></div>
                                <div class="top-menu">
                                    <?php $vehicle_id=$row["veh_Id"] ?> 
                                    
                                    <button class="button_adminvehicle" onclick="location.href='/viewVehicleProfile?id=<?php echo $vehicle_id; ?>'"><i class="fa-regular fa-eye"></i> View</button>
                                    <!-- <button class="button_adminvehicle" onclick="location.href='/admin/vehicle/update?id=<?php echo $vehicle_id; ?>'"><i class="fa-regular fa-pen-to-square"></i>Update</button> -->
                                    <button class="button_adminvehicle enable_vehicle" data-vehId='<?php echo($row['veh_Id'])?>' data-vehNo='<?php echo($row['plate_No'])?>'><i class="fa-regular fa-thumbs-up"></i>Enable</button>
                                </div>


                                <div class="vehicle-intro">
                                    <div class="vehicle-desc">
                                        <div class="vehicle-fee">
                                            <?php  echo "RS:"?>
                                            <?php echo $row["price"] ?>
                                        </div>
                                        <?php echo "(Per/Day)" ?>
                                        <div>
                                            <i class="fa-regular fa-user"></i><?php echo $row["seatsCount"]?>
                                            <i class="fa-solid fa-sliders"></i><?php echo $row["transmission"]?>
                                            <i class="fa-solid fa-gas-pump"></i><?php echo $row["fuel_type"]?>
                                        </div>

                                    </div>
                                    
                                    </div>

                                </div>
                            </div>






                        </div>

    <?php
               }

            }

     ?>


    </div>
</div>

</div>