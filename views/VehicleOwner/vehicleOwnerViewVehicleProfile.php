<?php
/*  @var $vehInfo VehInfo*/
/*  @var $vehicle cusVehicle*/
/*  @var $vehBooking VehBooking*/


use app\models\cusVehicle;
use app\models\VehInfo;

?>
<!--<link rel="stylesheet" type="text/css" href="cus_vehview.css">-->
<!--<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>-->



<div class="vehicle-card">
    <h2 class="vehicle-name"><?= $vehicle->getVehBrand().' '.$vehicle->getVehModel()?><span> </span></h2>
    <div class="details-cont">
        <div id="gallery">
            <div class="row">
                <div class="large-image">
                    <img src="/assets/img/uploads/vehicle/<?= $vehicle->getFrontView() ?>">
                </div>
            </div>
            <div class="row">
                <div class="thumbnails">
                    <img src="/assets/img/uploads/vehicle/<?= $vehicle->getFrontView() ?>" data-large="<?= $vehicle->getFrontView() ?>">
                    <img src="/assets/img/uploads/vehicle/<?= $vehicle->getSideView() ?>" data-large="<?= $vehicle->getSideView() ?>">
                    <img src="/assets/img/uploads/vehicle/<?= $vehicle->getBackView() ?>" data-large="<?= $vehicle->getBackView() ?>">
                </div>
            </div>

        </div>


        <div class="vehicle-details">
            <div class="vehicle-features">
                <span class="vehicle-seats"><i class='bx bx-user'></i> <?= $vehInfo->getSeatsCount()?> seats</span>
                <span class="vehicle-fuel"><i class='bx bxs-gas-pump' ></i><?= $vehInfo->getFuelType()?></span>
                <span class="vehicle-transmission"><i class='bx bx-slider bx-rotate-90' ></i> <?= $vehInfo->getTransmission()?></span>
                <span class="vehicle-fpd"><i class='bx bx-tachometer' ></i> <?= $vehInfo->getAvgfuel()?> km/l</span>
            </div>

            <div class="vehicle-info">

                <div class="two-column-layout">
                    <div class="left-column">
                        <ul>
                            <li class="bold">Brand: <?= $vehicle->getVehBrand()?></li>
                            <li class="bold">Model: <?= $vehicle->getVehModel()?></li>
                            <li class="bold">Type: <?= $vehicle->getVehType()?></li>
                            <li class="bold">Plate No: <?= $vehicle->getPlateNo()?></li>
                        </ul>
                    </div>
                    <div class="right-column">
                        <ul>
                            <li class="bold">Year: <?= $vehInfo->getYear()?></li>

                            <li class="bold">Color:  <?= $vehInfo->getVehColor()?></li>
<!--                            <li class="bold">Seats:  --><?php //= $vehInfo->getSeatsCount()?><!--</li>-->
                            <li class="bold">Transmission:  <?= $vehInfo->getTransmission()?></li>
                            <li class="bold">Fuel:  <?= $vehInfo->getFuelType()?></li>
                        </ul>
                    </div>
                </div>

                <div class="lic-ex-date">
                    <p class="bold">License Expiry Date: <?= $vehLicense->getLicExDate()?></p>
                </div>

                <div class="ins-ex-date">
                    <p class="bold">Insurance Expiry Date: <?= $vehInsurance->getInsExDate()?></p>
                </div>

                <div class="vehicle-description">
                    <p class="bold">Description: <?= $vehInfo->getDescription()?></p><br>
                </div>



                <div class="vehicle-price">
                    <span>Vehicle Rent Price (Per/ Day):</span>
                    <span class="price">Rs. <?= $vehicle->getPrice()?>.00 </span>
                </div>

            </div>

        </div>

    </div>


    
</div>



<!--<script>-->
<!--    // const bookBtn = document.querySelector('.book-btns');-->
<!--    //-->
<!--    // bookBtn.addEventListener('click', function() {-->
<!--    //     confirm('Are you sure you want to book this vehicle?');-->
<!--    // });-->
<!--    //-->
<!--    // $(document).ready(function() {-->
<!--    //     $('.thumbnails img').click(function() {-->
<!--    //         var largeImage = $(this).data('large');-->
<!--    //         $('.large-image img').attr('src', largeImage);-->
<!--    //     });-->
<!--    // });-->
<!---->
<!---->
<!--</script>-->

