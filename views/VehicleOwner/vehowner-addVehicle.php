<?php

$hasErrors = isset($errors) && !empty($errors);
$isVehicle_typeError = $hasErrors && isset($errors['dropdown_vehicletype']);
$isVehicle_modelError = $hasErrors && isset($errors['vehicle_model']);
$isFNameError = $hasErrors && isset($errors['vehicle_plateNumber']);
$isLNameError = $hasErrors && isset($errors['dropdown_transmitiontype']);
$isContactNoError = $hasErrors && isset($errors['dropdown_fueltype']);
$isAddressError = $hasErrors && isset($errors['license_No']);
$isPasswordError = $hasErrors && isset($errors['owner_name']);
$isPasswordError = $hasErrors && isset($errors['vehicle_year']);
$isPasswordError = $hasErrors && isset($errors['vehicle_chasisNo']);
$isPasswordError = $hasErrors && isset($errors['vehicle_weight']);
$isPasswordError = $hasErrors && isset($errors['vehicle_seat']);
$isPasswordError = $hasErrors && isset($errors['license']);
$isPasswordError = $hasErrors && isset($errors['ins_No']);
$isPasswordError = $hasErrors && isset($errors['ins_com']);
$isPasswordError = $hasErrors && isset($errors['ins_type']);
$isPasswordError = $hasErrors && isset($errors['insure']);

?>

<div class="adminaddvehicle-body">

    <div class="container">
        <header>Add New Vehicle</header>

        <form action="/vehicleOwner/add-vehicle" method="post" enctype="multipart/form-data">
<!--            <div class="form first">-->
<!--                <div class="vehicle details">-->
                    <span class="title_1">Vehicle Details</span>

                <div class="owneraddveh">
                    <div class="fields">
                        <div class="input-field">
                            <label>Type</label>
                            <select name = "dropdown_vehicletype">
                                <option value = "Car" >Car</option>
                                <option value = "Van">Van</option>
                                <option value = "Scooter">Scooter</option>
                                <option value = "Motercycle">Motercycle</option>

                            </select>

                        </div>

                        <div class="input-field">
                            <label>Model</label>
                            <input type="text" placeholder="Enter model" name="vehicle_model" />
<!--                            --><?php //echo $isVehicle_modelError ? "<small>{$errors['vehicle_model']}</small>" : ""?>
                        </div>


                        <div class="input-field">
                            <label>Plate Number</label>
                            <input type="text" placeholder="Enter plate number" name="vehicle_plateNumber" />
                        </div>


                        <!--                        <div class="input-field">-->
                        <!--                            <label>Description</label>-->
                        <!--                            <input type="text" placeholder="Enter Description"  />-->
                        <!--                        </div>-->

                        <div class="input-field">
                            <label>Transmission Type</label>
                            <select name = "dropdown_transmitiontype">
                                <option value = "Auto" >Auto</option>
                                <option value = "Manual">Manual</option>

                            </select>
                        </div>
                        <div class="input-field">
                            <label>Fuel Type</label>
                            <select name = "dropdown_fueltype">
                                <option value = "Petrol" >Petrol</option>
                                <option value = "Diesel">Diesel</option>

                            </select>
                        </div>
                        <div class="input-field">
                            <label>No. of seats:</label>
                            <input type="number" placeholder="Enter No. of seats" name="vehicle_seat" />
                        </div>
                        <div class="input-field">
                            <label>Vehicle image: </label>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="vehicle_image">
                        </div>

                    </div>

                </div>

<!--                </div>-->




                <div class="license details owneraddveh">
                    <span class="title_1">License Details</span>


                    <div class="fields">
                        <div class="input-field">
                            <label>License No:</label>
                            <input type="text" placeholder="Enter License No" name="license_No" >
                        </div>

                        <div class="input-field">
                            <label>Owner:</label>
                            <input type="text" placeholder="Enter Owner name:" name="owner_name" />
                        </div>
                        <div class="input-field">
                            <label>Year</label>
                            <input type="number" placeholder="Enter year" name="vehicle_year" />
                        </div>


<!--                        <div class="input-field">-->
<!--                            <label>Phone Number</label>-->
<!--                            <input type="text" placeholder="Enter phone number"  />-->
<!--                        </div>-->

                        <!-- <div class="input-field">
                            <label>Chassis No:</label>
                            <input type="text" placeholder="Enter Chassis No" name="vehicle_chasisNo" />
                        </div> -->

                        <!-- <div class="input-field">
                            <label>Unladen/Gross Weight:</label>
                            <input type="number" placeholder="Enter Unladen/Gross Weight:" name="vehicle_weight" />
                        </div> -->

                        <div class="input-field">
                            <label>The License valid from:</label>
                            <input type="date" placeholder="Enter The License valid from date" name="license_from" />
                        </div>

                        <div class="input-field">
                            <label>To:</label>
                            <input type="date" placeholder="Enter The License valid to date" name="license_to" />
                        </div>

                        <div class="input-field">
                            <label>License scanned copy: </label>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="license_image">
                        </div>




<!--                        <button class="nextBtn" type="button">-->
<!--                            <span class="btnText">Next</span>-->
<!--                            <i class="uil uil-navigator"></i>-->
<!--                        </button>-->
                    </div>
<!--                </div>-->




                </div>

<!--            <div class="form second">-->
                <div class="Insurance details owneraddveh">
                    <span class="title_1">Insurance Details</span>


                    <div class="fields">

                        <div class="input-field">
                            <label>Insurance No</label>
                            <input type="text" placeholder="Enter Insurance No" name="ins_No">
                        </div>
                        <div class="input-field">
                            <label>Insurance Company</label>
                            <input type="text" placeholder="Enter Insurance company" name="ins_com">
                        </div>

                        <div class="input-field">
                            <label>Insurance Type</label>
                            <input type="text" placeholder="Enter Insurance type" name="ins_type" >
                        </div>


                        <div class="input-field">
                            <label>The Insurance valid from:</label>
                            <input type="date" placeholder="Enter The Insurance valid from date" name="ins_from" />
                        </div>

                        <div class="input-field">
                            <label>To:</label>
                            <input type="date" placeholder="Enter The Insurance valid to date" name="ins_to"  />
                        </div>

                        <div class="input-field">
                            <label>Insurance scanned copy: </label>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="ins_image" >
                        </div>
                    </div>
                </div>


                <div class="Eco Test details owneraddveh">
                    <span class="title_1">Eco Test Details</span>


                    <div class="fields">
                        <div class="input-field">
                            <label>Eco Test Receipt scanned copy: </label>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="eco_img">
                        </div>


                        <div class="buttons">
<!--                            <button class="backBtn">-->
<!--                                <i class="uil uil-navigator"></i>-->
<!--                                <span class="btnText">Back</span>-->
<!---->
<!--                            </button>-->

                            <button class="nextBtn" type="submit">
                                <span class="btnText">Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>

                </div>
<!--            </div>-->


        </form>
    </div>


    <script src="/assests/javascript/adminaddVehicle.js"></script>


</div>