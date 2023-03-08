<?php

?>

<!-- <div class="ownerProfile_body"> -->
<!-- <div class="ownerProfile_container">
    
    <div class="ownerProfile_containerbox">
        

        
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

<<<<<<< HEAD
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
=======
</div>
<div class="ownerProfile_rest"></div> -->

>>>>>>> 56414bcd1d4147a7006689d173b7108d0f41941c

<div class="vehicle-card">
    <h2 class="vehicle-name"><?php echo($veh_info[0]['veh_brand'].' '.$veh_info[0]['veh_model'])?><span style="color:#FAB84C ;"> •<?php echo($veh_info[0]['owner_Fname'].' '.$veh_info[0]['owner_Lname'])?> </span></h2>
    <div class="details-cont">
        <div id="gallery">
            <div class="row">
                <div class="large-image">
                    <img src="assets/img/Vehicle_img/gallery/front.jpg">
                </div>
            </div>
            <div class="row">
                <div class="thumbnails">
                    <img src="assets/img/Vehicle_img/gallery/front.jpg" data-large="assets/img/vehicle/gallery/front.jpg">
                    <img src="assets/img/Vehicle_img/gallery/side.jpg" data-large="assets/img/vehicle/gallery/side.jpg">
                    <img src="assets/img/Vehicle_img/gallery/inside.jpg" data-large="assets/img/vehicle/gallery/inside.jpg">
                </div>
            </div>

        </div>


        <div class="vehicle-details">
            <div class="vehicle-features">
                <span class="vehicle-seats"><i class='bx bx-user'></i> <?php echo($veh_info[0]['seatsCount'])?> seats</span>
                <span class="vehicle-fuel"><i class='bx bxs-gas-pump' ></i><?php echo($veh_info[0]['fuel_type'])?></span>
                <span class="vehicle-transmission"><i class='bx bx-slider bx-rotate-90' ></i> <?php echo($veh_info[0]['transmission'])?></span>
                <span class="vehicle-fpd"><i class='bx bx-tachometer' ></i>  <?php echo($veh_info[0]['avgfuel'])?> km/l</span>
            </div>

            <div class="vehicle-info">

                <div class="two-column-layout">
                    <div class="left-column">
                        <ul>
                            <li class="bold">Brand: <?php echo($veh_info[0]['veh_brand'])?></li>
                            <li class="bold">Model: <?php echo($veh_info[0]['veh_model']) ?></li>
                            <li class="bold">Type: <?php echo($veh_info[0]['veh_type'])?></li>
                            <li class="bold">Plate No: <?php echo($veh_info[0]['plate_No']) ?></li>
                            <li class="bold">Year: <?php echo($veh_info[0]['year'])?></li>
                        </ul>
                    </div>
                    <div class="right-column">
                        <ul>
                            <li class="bold">Color:  <?php echo($veh_info[0]['vehColor'])?></li>
                            <li class="bold">Seats:  <?php echo($veh_info[0]['seatsCount'])?></li>
                            <li class="bold">Transmission:  <?php echo($veh_info[0]['transmission'])?></li>
                            <li class="bold">Fuel:  <?php echo($veh_info[0]['fuel_type'])?></li>
                        </ul>
                    </div>
                </div>
                <div class="vehicle-description">
                    <p class="bold">Description</p>
                    <p><?php echo($veh_info[0]['Description'])?></p>
                </div>
                <div class="vehicle-price">
                    <span>Vehicle Rent Price (Per/ Day):</span>
                    <span class="price">Rs. <?php echo($veh_info[0]['price'])?>.00 </span>
                </div>

            </div>

        </div>

    </div>


    


</div>







<!-- </div> -->
