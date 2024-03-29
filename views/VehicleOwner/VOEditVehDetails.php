<?php
/* @var $vehicle Vehicle */
/* @var $vehInfo VehInfo */
/* @var $vehLicense veh_license */
/* @var $vehInsurance veh_insurance */
/* @var $vehEcoTest veh_ecotest */
/* @var $vehRates VehRates */

use app\models\veh_ecotest;
use app\models\veh_insurance;
use app\models\veh_license;
use app\models\vehicle;
use app\models\VehInfo;
use app\models\VehRates;

?>
<h1>Add New Vehicle</h1>
<div class="wrapper-addveh">
    <form method="post" enctype="multipart/form-data">
        <div class="header">
            <ul style="list-style-type: none">
                <li class="active form_1_progessbar">
                    <div>
                        <p>1</p>
                    </div>
                </li>
                <li class="form_2_progessbar">
                    <div>
                        <p>2</p>
                    </div>
                </li>
                <li class="form_3_progessbar">
                    <div>
                        <p>3</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="form_wrap">
            <div class="form_1 data_info">
                <h2>Basic Details</h2>

                <div class="form_container">



                    <div class="input_wrap">

                        <input hidden name="veh_Id" value="<?= $vehicle->getVehId()?> ">
                        <input hidden name="id" value="<?= $vehicle->getVehId()?> ">

                        <label for="vehicle_type">Type</label>

                        <select disabled id="vehicle-type" class = "select-item" name = "veh_type">
                            <option  disabled class="item" value ="">--SELECT YOUR VEHICLE TYPE--</option>
                            <option  class="item" value ="car">Car</option>
                            <option class="item" value ="van">Van</option>
                            <option class="item" value ="scooter">Scooter</option>
                            <option class="item" value ="bike">Bike</option>


                            <option selected  value="<?= $vehicle->getVehType() ?>"class="item"><?= $vehicle->getVehType() ?></option>


                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="user_name">Vehicle Brand</label>
                        <input disabled type="text" value="<?= $vehicle->getVehBrand() ?>" name="veh_brand" class="input" id="brand">
                    </div>
                    <div class="input_wrap">
                        <label for="user_name">Vehicle Model</label>
                        <input disabled type="text" value="<?= $vehicle->getVehModel() ?>" name="veh_model" class="input" id="model">
                    </div>
                    <div class="input_wrap">
                        <label for="user_name">Plate No.</label>
                        <input disabled type="text"  value="<?= $vehicle->getPlateNo() ?>" name="plate_No" class="input" id="plateno">
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Location</label>
                        <input type="text" value="<?= $vehicle->getVehLocation() ?>" name="veh_location" class="input">
                    </div>

                    <div class="input_wrap">
                        <label for="range-slider">Vehicle Rent Price Rate:</label>
                        <input type="number" value="<?= $vehicle->getPrice() ?>" min="<?= $vehRates->getMinPrice()?>" max="<?= $vehRates->getMaxPrice()?>"  name="price" class="input" step="50">

                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Front View</label>
                        <input type="file" value="<?= $vehicle->getFrontView() ?>" name="front_view" class="input" id="front_view" max="1000000">
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Back View</label>
                        <input type="file" value="<?= $vehicle->getBackView() ?>"  name="back_view" class="input" id="back_view" max="1000000">
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Side View</label>
                        <input type="file" value="<?= $vehicle->getSideView() ?>" name="side_view" class="input" id="side_view" max="1000000">
                    </div>




                </div>
            </div>
            <div class="form_2 data_info" style="display: none;">
                <h2>Vehicle Info</h2>

                <div class="form_container">
                    <div class="input_wrap">
                        <label for="user_name">Year</label>
                        <input disabled type="text" value="<?=$vehInfo->getYear() ?>" name="year" class="input">
                    </div>
                    <div class="input_wrap">
                        <label for="first_name">Capacity</label>
                        <input disabled type="text" value="<?= $vehInfo->getCapacity() ?>" name="capacity" class="input">
                    </div>
                    <div class="input_wrap">
                        <label for="last_name">Transmission</label>

                        <select  disabled  class = "select-item" name = "transmission">
                            <option class="item" value = "Auto" >Auto</option>
                            <option class="item" value = "Manual">Manual</option>

                            <option  selected  value="<?= $vehInfo->getTransmission() ?>"class="item"><?= $vehInfo->getTransmission() ?></option>

                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="last_name">Fuel Type</label>

                        <select  disabled  class ="select-item" name = "fuel_type">
                            <option value = "Petrol" >Petrol</option>
                            <option value = "Diesel">Diesel</option>

                            <option  selected  value="<?= $vehInfo->getFuelType() ?>"class="item"><?= $vehInfo->getFuelType() ?></option>

                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="vehColor">Color</label>
                        <input type="text" value="<?= $vehInfo->getVehColor() ?>"name="vehColor" class="input">
                    </div>
                    <div class="input_wrap">
                        <label for="seatsCount">No of Seats</label>
                        <input type="text" value="<?= $vehInfo->getSeatsCount() ?>"name="seatsCount" class="input">
                    </div>
                    <div class="input_wrap">
                        <label for="avgfuel">Average Fuel Consumption</label>
                        <input type="number" value="<?= $vehInfo->getAvgfuel() ?>" name="avgfuel" class="input" id="first_name">
                    </div>
                    <div class="input_wrap">
                        <label for="Description">Description</label>
                        <!-- 						<input type="text" name="First Name" class="input" id="first_name"> -->
                        <textarea  value="<?= $vehInfo->getDescription() ?>" name="Description" class ="input" style="resize: none;" maxlength="100"><?= $vehInfo->getDescription() ?></textarea>
                    </div>

                </div>
            </div>
            <div class="form_3 data_info" style="display: none;">
                <h2>Docs</h2>

                <div class="form_container">


                    <div class="column">
                        <h3>License Details</h3>
                        <div class="form-group input_wrap">
                            <label for="license-no">License Number:</label>
                            <input  disabled type="text" value="<?= $vehLicense->getlicense_No() ?>"id="license-no" name="license_No" class="input">
                        </div>


                        <div class="form-group input_wrap">
                            <label for="valid-from">Valid From:</label>
                            <input disabled type="date" value="<?= $vehLicense->getLicFromDate() ?>"  id="valid-from" name="lic_from_date" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="valid-to">Valid To:</label>
                            <input disabled type="date"  value="<?= $vehLicense->getLicExDate() ?>" id="valid-to" name="lic_ex_date" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="license-scan">Scanned Copy:</label>
                            <input  type="file" accept="image/png,image/jpeg" id="license-scan" name="lic_scan_copy" class="input">
                        </div>
                    </div>

                    <div class="column">
                        <h3>Insurance Details</h3>
                        <div class="form-group input_wrap">
                            <label for="insurance-no">Insurance Number:</label>
                            <input disabled type="text"  value="<?= $vehInsurance->getInsNo() ?>" id="insurance-no" name="ins_No" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-valid-from">Valid From:</label>
                            <input disabled type="date"  value="<?= $vehInsurance->getInsFromDate() ?>"  id="insurance-valid-from" name="ins_from_date" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-valid-to">Valid To:</label>
                            <input disabled type="date" value="<?= $vehInsurance->getInsExDate() ?>"  id="insurance-valid-to" name="ins_ex_date" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-company">Insurance Company:</label>
                            <input type="text" value="<?= $vehInsurance->getInsureCom() ?>" id="insurance-company" name="insure_com" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-type">Insurance Type:</label>
                            <input type="text" value="<?= $vehInsurance->getInsureType() ?>"  id="insurance-type" name="insure_type" class="input">
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-scan">Scanned Copy:</label>
                            <input type="file" id="insurance-scan" name="ins_scan_copy" class="input">
                        </div>
                    </div>
                    <div class="column">
                        <h3>Eco Test Details</h3>
                        <div class="form-group input_wrap">
                            <label for="eco-test-scan">Scanned Copy:</label>
                            <input type="file" id="eco-test-scan" name="eco_scan_copy" class="input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btns_wrap">
            <div class="common_btns form_1_btns">
                <button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
            </div>
            <div class="common_btns form_2_btns" style="display: none;">
                <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                <button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
            </div>
            <div class="common_btns form_3_btns" style="display: none;">
                <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                <button type="submit" class="btn_done">Done</button>
            </div>
        </div>
    </form>
</div>

<div class="modal_wrapper">
    <div class="shadow"></div>
    <div class="success_wrap">
        <span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
        <p>You have successfully completed the process.</p>
    </div>
</div>





