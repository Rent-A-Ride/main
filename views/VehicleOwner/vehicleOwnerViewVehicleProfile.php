<?php
/*  @var $vehInfo VehInfo*/
/*  @var $vehicle cusVehicle*/
/*  @var $vehBooking VehBooking*/


use app\models\cusVehicle;
use app\models\VehInfo;

?>




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
                    <p class="bold">Description: <?= $vehInfo->getDescription()?></p>
                </div>

                <div class="vehicle-rent-price">
                    <p class="bold">Rent Price (Per/ Day):<?= $vehicle->getPrice()?>.00 </p><br>
                </div>

                <div class="editVehProfileBtn">
                    <button id="editVehInfobutton" onclick="location.href='/vehicleOwner/editVehicleProfile?id=<?= $vehicle->getVehId() ?>'" class="editVehInfobutton" role="button">Edit Details</button>

                </div>
                </div>


            </div>



            </div>

        </div>




    



<!--Vehicle Review added -->
<div class="reviews-container-2">
    <h2>Ratings and Reviews</h2>
    <div class="rating" id="overall-rating">
        <div class="stars-container">
            <div class="star">&#9733;</div>
            <div class="star">&#9733;</div>
            <div class="star">&#9733;</div>
            <div class="star">&#9733;</div>
            <div class="star">&#9733;</div>
<!--            --><?php
//            for ($i = 1; $i <= 5; $i++) {
//                if ($i <= $avgReview%5) {
//                    echo '<div class="star">&#9733;</div>';
//                } else {
//                    echo '<div class="star">&#9734;</div>';
//                }
//            }
//            ?>
        </div>
        <div class="rating-text">
            <span class="average"></span>
            <span class="out-of">out of 5</span>
        </div>
    </div>
    <ul class="reviews-list" id="reviews-list" style="display:none">
<!--        --><?php //foreach ($vehReviews as $review): ?>
            <li class="review">
                <div class="review-header">
                    <span class="reviewer-name">buddhi</span>
                    <span class="review-date">55555</span>
                </div>
                <div class="rating">
                    <div class="stars-container">
                        <div class="star">&#9733;</div>
                        <div class="star">&#9733;</div>
                        <div class="star">&#9733;</div>
                        <div class="star">&#9733;</div>
                        <div class="star">&#9733;</div>
<!--                        --><?php
//                        for ($i = 1; $i <= 5; $i++) {
//                            if ($i <= $review->getRating()%5) {
//                                echo '<div class="star">&#9733;</div>';
//                            } else {
//                                echo '<div class="star">&#9734;</div>';
//                            }
//                        }
//                        ?>
                    </div>
                    <div class="rating-text">
                        <span class="rating-value"></span>
                        <span class="out-of">out of 5</span>
                    </div>
                </div>
                <p class="review-text"></p>
            </li>

<!--        --><?php //endforeach; ?>

            </ul>
</div>







<script>
    // Get the overall rating element and the reviews list element
    const overallRating = document.getElementById('overall-rating');
    const reviewsList = document.getElementById('reviews-list');

    // Add a click event listener to the overall rating element
    overallRating.addEventListener('click', function() {
        // Toggle the display of the reviews list element
        if (reviewsList.style.display === 'none') {
            reviewsList.style.display = 'block';
        } else {
            reviewsList.style.display = 'none';
        }
    });


</script>

