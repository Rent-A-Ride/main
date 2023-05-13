<?php
/*  @var $vehInfo VehInfo*/
/*  @var $vehicle cusVehicle*/
/*  @var $vehBooking VehBooking*/
/*  @var $vehOwner \app\models\vehicleowner*/

use app\models\cusVehicle;
use app\models\VehInfo;

?>

<div class="vehicle-card">
    <h2 class="vehicle-name"><?= $vehicle->getVehBrand().' '.$vehicle->getVehModel()?><span> • <?= $vehOwner->getOwnerFname().' '.$vehOwner->getOwnerLname() ?></span></h2>
    <div class="details-cont">
        <div id="gallery">
            <div class="row">
                <div class="large-image">
                    <img src="/assets/img/vehicle/<?= $vehicle->getFrontView() ?>">
                </div>
            </div>
            <div class="row">
                <div class="thumbnails">
                    <img src="/assets/img/vehicle/<?= $vehicle->getFrontView() ?>" data-large="/assets/img/vehicle/<?= $vehicle->getFrontView() ?>">
                    <img src="/assets/img/vehicle/<?= $vehicle->getSideView() ?>" data-large="/assets/img/vehicle/<?= $vehicle->getSideView() ?>">
                    <img src="/assets/img/vehicle/<?= $vehicle->getBackView() ?>" data-large="/assets/img/vehicle/<?= $vehicle->getBackView() ?>">
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
                            <li class="bold">Plate No: <?= substr($vehicle->getPlateNo(), 0, -3) . '***' ?></li>
                            <li class="bold">Year: <?= $vehInfo->getYear()?></li>
                        </ul>
                    </div>
                    <div class="right-column">
                        <ul>
                            <li class="bold">Color:  <?= $vehInfo->getVehColor()?></li>
                            <li class="bold">Seats:  <?= $vehInfo->getSeatsCount()?></li>
                            <li class="bold">Transmission:  <?= $vehInfo->getTransmission()?></li>
                            <li class="bold">Fuel:  <?= $vehInfo->getFuelType()?></li>
                        </ul>
                    </div>
                </div>
                <div class="vehicle-description">
                    <p class="bold">Description</p>
                    <p><?= $vehInfo->getDescription()?></p>
                </div>
                <div class="vehicle-price">
                    <span>Vehicle Rent Price (Per/ Day):</span>
                    <span class="price">Rs. <?= $vehicle->getPrice()?>.00 </span>
                </div>

            </div>

        </div>

    </div>


    <form action="" method="get">
        <div class="set-date-loc">


            <input name="id" value="<?=$vehicle->getVehId()?>" hidden>
            <input name="type" value="submit" hidden>

            <div class="set-loc">
                <label for="set-loc">Pick-up Location</label>
                <select id="location" name="location" required>
                    <option value="" disabled selected hidden>location</option>
                    <option value="<?= $vehicle->getVehLocation()?>"><?= $vehicle->getVehLocation()?></option>

                </select>
            </div>
            <div class="date-input">
                <label for="start-date">Start Date</label>
                <input class="input-field-booking" type="date" id="start-date" name="startDate" oninput="setToDateLimits()">
            </div>
            <div class="date-input">
                <label for="end-date">End Date</label>
                <input class="input-field-booking" type="date" id="end-date" name="endDate" oninput="setToDateLimits()" >
            </div>


        </div>
        <input onclick="calculatePrice()" value="Book Now" type="submit" class="book-btn"/>
    </form>


</div>

<div class="reviews-container-2">
    <h2>Ratings and Reviews</h2>
    <div class="rating" id="overall-rating">
        <div class="stars-container">
            <?php
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $avgReview%5) {
                    echo '<div class="star">&#9733;</div>';
                } else {
                    echo '<div class="star">&#9734;</div>';
                }
            }
            ?>
        </div>
        <div class="rating-text">
            <span class="average"><?= $avgReview%5 ?></span>
            <span class="out-of">out of 5</span>
        </div>
    </div>
    <ul class="reviews-list" id="reviews-list" style="display:none">
        <?php foreach ($vehReviews as $review): ?>
        <li class="review">
            <div class="review-header">
                <span class="reviewer-name"><?= $customerById[$review->getCusId()]->getFirstname().' '.$customerById[$review->getCusId()]->getLastname()?></span>
                <span class="review-date"><?=$review->created_at?></span>
            </div>
            <div class="rating">
                <div class="stars-container">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $review->getRating()%5) {
                            echo '<div class="star">&#9733;</div>';
                        } else {
                            echo '<div class="star">&#9734;</div>';
                        }
                    }
                    ?>
                </div>
                <div class="rating-text">
                    <span class="rating-value"> <?= $review->getRating()%5?></span>
                    <span class="out-of">out of 5</span>
                </div>
            </div>
            <p class="review-text"><?= $review->getComments()?></p>
        </li>

        <?php endforeach; ?>

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
