<?php
/** @var $vehicle vehicle */

use app\models\vehicle;

?>

<h2 class="renew-page-name">Renew Vehicle Documents</h2>

<div class="doc-update-container">

    <div class="documents">
        <div class="doc-update-buttons">
            <button class="update-button">Renew License Document</button>

            <button class="update-button">Renew Eco Test Document</button>

            <button class="update-button">Renew Insurance Document</button>
        </div>
    </div>


    <div class="wrapper-container">
        <div  class="wrapper">
            <form method="post" class="form_1" enctype="multipart/form-data">
                <h3>Renew Eco Test Details</h3>
                <div class="inputBox">

                    <label for="vehicleno">Vehicle No:</label>
                    <input type="text" id="vehicleno" name="vehicleno" value="<?= $vehicle->getPlateNo() ?>" disabled>
                    <input hidden type="text" name="veh_Id" value="<?= $vehicle->getVehId()?>" >

                    <label for="Ecotestreceipt">Scanned Copy of Eco Test Receipt</label>

                    <input type="file" id="scan_copy" name="scan_copy" required>

                    <label for="modified_date">Valid From</label>

                    <input type="date" id="modified_date" name="modified_date" required>

                    <label for="modified_date">Valid To</label>

                    <input type="date" id="ex_date" name="ex_date" required>
                </div>





                <div>
                    <input class="btn" type="submit" name="submit" value="Submit">
                </div>

            </form>
        </div>


    </div>

</div>