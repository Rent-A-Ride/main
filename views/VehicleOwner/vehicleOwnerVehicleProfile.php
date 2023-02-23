<?php

?>

<div class="ownerProfile_body">
<div class="ownerProfile_container">
    
    <div class="ownerProfile_containerbox">
        <div class="vehicleProfilebox">
            <div class="vehicleProfileImage">
                <div class="vehicleProfileVehicleName">
                    <div>
                        <h2><?php echo($result[0]["model"]); ?></h2>
                    </div>
                    <div class="ownerd">

                        <h2 class="owner"><?php echo($result[0]["owner"]); ?></h2>

                    </div>
                    
                </div>
                <div class="vehicleProfileImageimg">
                    <img src="/assets/img/Vehicle_img/<?php echo($result[0]["image"]); ?>" alt="" class="vehicle_profileProfile">
                    <div class="icons">
                        <i class="fa-regular fa-user"></i>
                        <span><?php echo($result[0]["capacity"]); ?></span>
                        <i class="fa-solid fa-sliders"></i>
                        <span><?php echo($result[0]["veh_transmition"]); ?></span>
                        <i class="fa-solid fa-gas-pump"></i>
                        <span><?php echo($result[0]["fuel_type"]); ?></span>

                    </div>
                    <a href=""><i class="fa-solid fa-gauge-high"></i><small>Monthly Tour</small></a>
                </div>
            </div>
            <div class="vehicleProfileDesc ">
                <div class="vehicleProfileDesc_details">
                   <div><strong>Plate No:</strong></div>
                   <div><p><?php echo($result[0]["plate_No"]); ?></p></div> 
                </div>
                <div class="vehicleProfileDesc_details">
                    <div><strong>Model:</strong></div>
                   <div><p><?php echo($result[0]["model"]); ?></p></div>
                </div>
                <div class="vehicleProfileDesc_details">
                    <div><strong>Type:</strong></div>
                   <div><p><?php echo($result[0]["type"]); ?></p></div>
                </div>
                <div class="vehicleProfileDesc_details">
                    <div><strong>Year:</strong></div>
                   <div><p><?php echo($result[0]["year"]); ?></p></div>
                </div>
                <div class="vehicleProfileDesc_details">
                    <div><strong>Rent(Per day):</strong></div>
                   <div><p><?php echo("RS.".$result[0]["price"]); ?></p></div>   
                </div>
                <!-- <div class="vehicleProfileDesc_details">
                    <div><strong>Monthly Rental Fee:</strong></div>
                   <div><p><?php echo($result[0]["fuel_type"]); ?></p></div> 
                </div> -->

            </div>
            <div class="VehicleProfilelicenseInsuerance">
                <div class="vehicleProfileDesc_details">
                    <div><strong>License from Date:</strong></div>
                   <div><p><?php echo($result[0]["from_date"]); ?></p></div> 
                </div>
                <div class="vehicleProfileDesc_details">
                    <div><strong>License Exp. Date:</strong></div>
                   <div><p><?php echo($result[0]["ex_date"]); ?></p></div> 
                </div>
                <div class="vehicleProfileDesc_details">
                    <div><strong>Insuarance Exp. Date:</strong></div>
                   <div><p><?php echo($result[0]["ex_date"]); ?></p></div> 
                </div>
            </div>

        </div>
        <hr>
        <div class="vehicleCustomerReviews">
            <h3>Reviews</h3>
            <div>
                <ol>
                    <li>Good Vehicle</li>
                </ol>
            </div>
        </div>
    </div>

</div>
<div class="ownerProfile_rest"></div>


</div>
