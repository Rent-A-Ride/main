<?php
/** @var $vehicle vehicle */

use app\models\vehicle;

?>

<h2 class="renew-page-name">Renew Vehicle Documents</h2>

<div class="doc-update-container">

    <div class="documents">
        <div class="doc-update-buttons">

            <button class="update-button">Renew Eco Test Document</button>
            <button class="update-button">Renew Revenue Licence  Document</button>

            <button class="update-button">Renew Insurance Document</button>
        </div>
    </div>


    <div class="wrapper-container">
        <div  class="wrapper">
            <form method="post" class="form_1" enctype="multipart/form-data">
                <h4>Renew Revenue Licence Details</h4>
                <div class="inputBox">

                    <label for="vehicleno">Vehicle No:</label>
                    <input type="text" id="vehicleno" name="vehicleno" value="<?= $vehicle->getPlateNo() ?>" disabled>
                    <input hidden type="text" name="veh_Id" value="<?= $vehicle->getVehId()?>" >

                    <label for="Revenue-Licence-Number">License Number</label>

                    <input type="text" id="license_No" name="license_No" required>


                    <label for="Revenue-Licence-receipt">Scanned Copy of Revenue Licence</label>

                    <input type="file" id="scan_copy" name="scan_copy" required>


                    <label for="modified_date">Valid From</label>

                    <input type="date" id="from_date" name="from_date" required>

                    <label for="modified_date">Valid To</label>

                    <input type="date" id="ex_date" name="ex_date" required>
                </div>





                <div>
                    <input class="btn" type="submit" name="submit" value="Submit">
                </div>

            </form>
        </div>


    </div>

    <script>

         const fromDateInput = document.getElementById('modified_date');
    const toDateInput = document.getElementById('ex_date');
    const today = new Date();
    fromDateInput.min = today.toISOString().slice(0, 10);

    fromDateInput.addEventListener('change', function() {
    toDateInput.min = fromDateInput.value;
    toDateInput.disabled = false;
    });

    toDateInput.addEventListener('change', function() {
    fromDateInput.max = toDateInput.value;
    });


    function setToDateLimits() {
    toDateInput.min = fromDateInput.value;
    fromDateInput.max = toDateInput.value;

    var maxDate = new Date(fromDateInput.value);
    maxDate.setFullYear(maxDate.getFullYear() + 1);
    toDateInput.max = maxDate.toISOString().split("T")[0];
    }

    </script>
