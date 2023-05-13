
<?php

/* @var $vehicles vehicle */

use app\models\vehicle;

?>





<!-- Table -->

<div class="disabled-table-container">
    <div id="table" class="disabled-table">
        <div class="disabled-table-header">
            <div class="header__item"><a id="name" class="filter__link" href="#"></a></div>
            <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#"> Plate No.</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Vehicle</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Rent(P/D)</a></div>
            <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Action</a></div>












        </div>
        <div class="disabled-table-content" >
            <?php
            foreach ($vehicles as $vehicle):
            ?>

            <div class="disabled-table-row">

                <div class="table-data"><img src="/assets/img/uploads/vehicle/<?= $vehicle->getFrontView()?>" width="56px"></div>
                <div class="table-data"><?php echo $vehicle->getPlateNo()?></div>
                <div class="table-data"><?php echo $vehicle->getVehBrand().' '.$vehicle->getVehModel()?></div>
                <div class="table-data"><?php echo $vehicle->getPrice()?></div>
                <div class="disabled-table-data">
                    <form method="post" onsubmit="return confirm('Are you sure you want to enable this vehicle?');">
                        <input type="hidden" name="id" value="<?= $vehicle->getVehId() ?>">
                        <button  type="submit" name="enable" class="enable-button" value="true"><i class='bx bx-edit bx-sm'></i> Enable</button>
                    </form>
                </div>


                <!-- <div class="table-data"><button onclick="location.href='/vehicleOwner/UpdateVehicle?id=<?= $vehicle->getVehId()?>'" class="update-doc-button"><i class='bx bx-edit bx-sm'></i> Renew</button></div> -->

            </div>
             <?php
            endforeach;
            ?>


        </div>
    </div>
</div>
