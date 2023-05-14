<?php
/*  @var $row \app\models\cusVehicle*/
/* @var $ratings veh_Reviews */

use app\models\veh_Reviews;

?>

<!-- SEARCH -->
<!--<div class="search">-->
<!--    <label class="label-l" for="search">Search</label>-->
<!--    <input type="search" id="search" placeholder="Type to search">-->
<!--    <div id='filter'>   -->
<!--        <button class='Scooter'>Bikes</button>-->
<!--        <button class='Car'>Cars</button>-->
<!--        <button class='vans'>Vans</button>-->
<!--        <button class=''>Clear</button>-->
<!--    </div>-->
<!---->
<!--</div>-->

<div class="search">
<!--    <label class="label-l" for="search">Search</label>-->
    <input type="search" id="search" placeholder="Type to search">
    <div id="filter">
        <button class="Scooter">Bikes</button>
        <button class="Car">Cars</button>
        <button class="vans">Vans</button>
        <button class="">Clear</button>
    </div>
    <form id="date-search" class="date-search" method="post">
        <div class="search-input-container">
            <label class="label-l" for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start-date" required>
        </div>
        <div class="search-input-container">
            <label class="label-l" for="end-date">End Date:</label>
            <input type="date" id="end-date" name="end-date" required>
        </div>
        <button class="search-icon" type="submit">
            <i class='bx bx-search'></i>
        </button>
    </form>


</div>

<!-- Table -->

<div class="table-container">
    <div id="table" class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Vehicle</a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Ratings</a></div>
            <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Location</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Rent(P/D)</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
<!--            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>-->
        </div>
        <div class="table-content" id="table-content" >
            <?php
            foreach ($model as $row):

                ?>
                <div class="table-row <?=$row->getVehType()?>">

                    <div class="table-data"><img src="/assets/img/uploads/vehicle/<?= $row->getFrontView()?>" width="56px"></div>
                    <div class="table-data"><?= $row->getVehBrand().' '.$row->getVehModel() ?></div>
                    <div class="table-data">
                        <form class="rating-widget" data-rating="<?= $row->getTotalRatings($row->getVehId())?>">
                            <input disabled type="checkbox" class="star-input" id="1" />
                            <label class="star-input-label" for="1">
                                1
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star orange"></i>
                            </label>
                            <input disabled type="checkbox" class="star-input" id="2" />
                            <label class="star-input-label" for="2">
                                2
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star orange"></i>
                            </label>
                            <input disabled type="checkbox" class="star-input" id="3" />
                            <label class="star-input-label" for="3">
                                3
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star orange"></i>
                            </label>
                            <input disabled type="checkbox" class="star-input" id="4" />
                            <label class="star-input-label" for="4">
                                4
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star orange"></i>
                            </label>
                            <input disabled type="checkbox" class="star-input" id="5" />
                            <label class="star-input-label" for="5">
                                5
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star orange"></i>
                            </label>
                        </form>
                    </div>
                    <div class="table-data"><?= $row->getVehLocation()?></div>
                    <div class="table-data">Rs <?= $row->getPrice().'.00' ?></div>
                    <div class="table-data"><button onclick="location.href='/VehicleInfo?id=<?=$row->getVehId()?>'" class="view-button"><i class='bx bx-show'></i> View</button></div>
<!--                    <div class="table-data"><button onclick="location.href='/VehicleBooking'" class="book-button"><i class='bx bx-book-add'></i> Book</button></div>-->
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
