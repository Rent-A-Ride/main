
<?php

/* @var $vehicle vehicle */

use app\models\vehicle;

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<!--<button class="add-new-veh-button" onclick="location.href='/vehicleOwner/addNewVehicle'"> <i class='bx bx-plus  ' ></i> Add New <i class='bx bx-car'></i></button>-->

<!-- Search -->

<div class="search">
    <label class="label-l" for="search"><i class='bx bx-search'></i>Search </label>
    <input type="search" id="search" placeholder="Type to search">


    <div id='filter'>
        <button class='scooter'>Scooter</button>
        <button class='Car'>Cars</button>
        <button class='vans'>Vans</button>
        <button class=''>Clear</button>
    </div>
</div>

<div class="add-disables-buttons">
    <button class="add-new-veh-button" onclick="location.href='/vehicleOwner/addNewVehicle'">
        <i class='bx bx-plus bx-sm'></i> Add New
        <i class='bx bx-car bx-sm'></i>
    </button>
    <button class="disabled-veh-button">
        <i class='bx bx-low-vision bx-sm'></i> Disabled List
        <i class='bx bx-list-ul bx-sm' ></i>
    </button>
</div>


<!-- Table -->

<div class="table-container">
    <div id="table" class="table">
        <div class="table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#"> Plate No.</a></div>

            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Vehicle</a></div>
<!--             <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#"></a></div>-->
<!--            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Status</a></div>-->

            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Rent(P/D)</a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
            <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#"></a></div>
        </div>
        <div class="table-content" >
            <?php
                 foreach ($vehicles as $vehicle):
                ?>
                <div class="table-row">

                    <div class="table-data"><img src="/assets/img/uploads/vehicle/<?= $vehicle->getFrontView()?>" width="56px"></div>
                    <div class="table-data"><?= $vehicle->getPlateNo()?></div>
                    <div class="table-data"><?= $vehicle->getVehBrand()." ".$vehicle->getVehModel()?></div>

                    <div class="table-data">Rs <?= $vehicle->getPrice()?></div>
                    <div class="table-data"><button onclick="location.href='/vehicleOwner/viewVehicleProfile'" class="view-button"><i class='bx bx-show bx-sm'></i> View</button></div>


                    <div class="table-data"><button onclick="location.href='/vehicleOwner/UpdateVehicle?id=<?= $vehicle->getVehId()?>'" class="update-doc-button"><i class='bx bx-edit bx-sm'></i> Renew</button></div>

                    <div class="table-data"><button onclick="location.href='/Vehicledisable'" class="disable-button"><i class='bx bx-low-vision bx-sm'></i> Disable</button></div>
                </div>
            <?php
            endforeach;
//            ?>


        </div>
    </div>
</div>
