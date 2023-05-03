<?php
/*  @var $row \app\models\cusVehicle*/
/* @var $ratings veh_Reviews */

use app\models\veh_Reviews;

?>

<!-- SEARCH -->
<div class="search">
    <label class="label-l" for="search"><i class='bx bx-search'></i>Search </label>
    <input type="search" id="search" placeholder="Type to search">
    <div class="location-select">
        <select id="location" name="location">
            <option value="" disabled selected hidden>location</option>
            <option value="Galle">Galle</option>
            <option value="Negombo">Negombo</option>
            <option value="Mathale">Mathale</option>
            <option value="Kandy">Kandy</option>
        </select>
    </div>
    <div class="date-select">
        <label class="lable-sm" for="date">Date</label>
        <input type="date" id="date" name="date">
    </div>
    <div id='filter'>
        <button class='scooter'>Scooter</button>
        <button class='Car'>Cars</button>
        <button class='vans'>Vans</button>
        <button class=''>Clear</button>
    </div>
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
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
        </div>
        <div class="table-content" >
            <?php
            foreach ($model as $row):

                ?>
                <div class="table-row <?=$row->getVehType()?>">

                    <div class="table-data"><img src="/assets/img/vehicle/<?= $row->getFrontView()?>" width="56px"></div>
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
                    <div class="table-data"><button onclick="location.href='/VehicleBooking'" class="book-button"><i class='bx bx-book-add'></i> Book</button></div>
                </div>
            <?php
            endforeach;
            ?>
            <!--            <div class="table-row scooter">-->
            <!--                <div class="table-data"><img src="assets/img/cusHome/table/scooter.jpg" width="56px"></div>-->
            <!--                <div class="table-data">Wego</div>-->
            <!--                <div class="table-data">-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star"></span>-->
            <!--                </div>-->
            <!--                <div class="table-data">Negombo</div>-->
            <!--                <div class="table-data">Rs 4500.00</div>-->
            <!--                <div class="table-data"><button onclick="location.href='/VehicleInfo'" class="view-button"><i class='bx bx-show'></i> View</button></div>-->
            <!--                <div class="table-data"><button onclick="location.href='/VehicleBooking'" class="book-button"><i class='bx bx-book-add'></i> Book</button></div>-->
            <!--            </div>-->
            <!--            <div class="table-row scooter">-->
            <!--                <div class="table-data"><img src="assets/img/cusHome/table/scooter1.jpg" width="56px"></div>-->
            <!--                <div class="table-data">Scooty pep</div>-->
            <!--                <div class="table-data">-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star "></span>-->
            <!--                    <span class="fa fa-star"></span>-->
            <!--                    <span class="fa fa-star"></span>-->
            <!--                </div>-->
            <!--                <div class="table-data">Mathale</div>-->
            <!--                <div class="table-data">Rs 5500.00</div>-->
            <!--                <div class="table-data"><button onclick="location.href='/VehicleInfo'" class="view-button"><i class='bx bx-show'></i> View</button></div>-->
            <!--                <div class="table-data"><button onclick="location.href='/VehicleBooking'" class="book-button" onclick="location.href='/VehicleBooking'"><i class='bx bx-book-add'></i> Book</button></div>-->
            <!--            </div>-->
            <!--            <div class="table-row cars">-->
            <!--                <div class="table-data"><img src="assets/img/cusHome/table/scooter2.jpg" width="56px"></div>-->
            <!--                <div class="table-data">Toyota Prius</div>-->
            <!--                <div class="table-data">-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star checked"></span>-->
            <!--                    <span class="fa fa-star "></span>-->
            <!--                    <span class="fa fa-star"></span>-->
            <!--                    <span class="fa fa-star"></span>-->
            <!--                </div>-->
            <!--                <div class="table-data">Kandy</div>-->
            <!--                <div class="table-data">Rs 25000.00</div>-->
            <!--                <div class="table-data"><button onclick="location.href='/VehicleInfo'" class="view-button"><i class='bx bx-show'></i> View</button></div>-->
            <!--                <div class="table-data"><button onclick="location.href='/VehicleBooking'" class="book-button"><i class='bx bx-book-add'></i> Book</button></div>-->
            <!--            </div>-->
        </div>
    </div>
</div>
