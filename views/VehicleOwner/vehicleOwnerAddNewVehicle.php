<?php
?>
<h1>Add New Vehicle</h1>

<!--new vehicle adding form-->
<div class="wrapper-addveh">
    <form method="post" enctype="multipart/form-data" id="add-new-form">
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


                        <label for="vehicle_type">Type</label>

                        <select id="vehicle-type" class = "select-item" name = "veh_type" required>
                            <option selected disabled class="item" value ="">--SELECT YOUR VEHICLE TYPE--</option>
                            <option  class="item" value ="car">Car</option>
                            <option class="item" value ="van">Van</option>
                            <option class="item" value ="scooter">Scooter</option>
                            <option class="item" value ="bike">Bike</option>

                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="user_name">Vehicle Brand</label>
                        <input type="text" name="veh_brand" required class="input" id="brand" placeholder="ex: Toyota" required>
                    </div>
                    <div class="input_wrap">
                        <label for="user_name">Vehicle Model</label>
                        <input type="text" name="veh_model" class="input" id="model"  placeholder="ex: Corolla" required>
                    </div>
                    <div class="input_wrap">
                        <label for="user_name">Plate No.</label>
                        <input type="text" name="plate_No" class="input" id="plateno" placeholder="ex: wp KX 7890" required>
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Location</label>
                        <input type="text" name="veh_location" class="input" id="location" required>
                    </div>

                    <div class="input_wrap">
                        <label for="range-slider">Vehicle Rent Price Rate:</label>
                        <input id="range-slider" type="range" step="50" name="price" required>
                        <span id="range-value"></span>
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Front View</label>
                        <input type="file" name="front_view" class="input" id="front_view" max="1000000" required>
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Back View</label>
                        <input type="file" name="back_view" class="input" id="back_view" max="1000000" required>
                    </div>

                    <div class="input_wrap">
                        <label for="user_name">Side View</label>
                        <input type="file" name="side_view" class="input" id="side_view" max="1000000" required>
                    </div>




                </div>
        </div>
        <div class="form_2 data_info" style="display: none;">
            <h2>Vehicle Info</h2>

                <div class="form_container">
                    <div class="input_wrap">

                        <label for="year-input">Manufactured Year:</label>

                        <select class = "select-item" id="year-input" name="year" required>
<!--                            <select class = "select-item" name = "transmission" required>-->
                            <option class="item" value="">--Select year--</option>
                        </select>
                    </div>






                    <div class="input_wrap">
                        <label for="first_name">Capacity (CC)</label>
                        <input type="number" name="capacity" class="input" min="80" required>
                    </div>
                    <div class="input_wrap">
                        <label for="last_name">Transmission</label>

                        <select class = "select-item" name = "transmission" required>
                            <option class="item" value = "Auto" >Auto</option>
                            <option class="item" value = "Manual">Manual</option>

                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="last_name">Fuel Type</label>

                        <select class ="select-item" name = "fuel_type" required>
                            <option value = "Petrol" >Petrol</option>
                            <option value = "Diesel">Diesel</option>

                        </select>

                    </div>
                    <div class="input_wrap">
                        <label for="vehColor">Color</label>
                        <input type="text" name="vehColor" class="input" required>
                    </div>
                    <div class="input_wrap">
                        <label for="seatsCount">No of Seats</label>
                        <input type="number" name="seatsCount" class="input" min="1" required>
                    </div>
                    <div class="input_wrap">
                        <label for="avgfuel">Average Fuel Consumption (km/l) </label>
                        <input type="number" name="avgfuel" class="input" id="first_name" step="0.01" min="1" required>
                    </div>
                    <div class="input_wrap">
                        <label for="Description">Description</label>
                        <!-- 						<input type="text" name="First Name" class="input" id="first_name"> -->
                        <textarea name="Description" class ="input" style="resize: none;" maxlength="100" required></textarea>
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
                            <input type="text" id="license-no" name="license_No" class="input" required>
                        </div>


                        <div class="form-group input_wrap">
                            <label for="valid-from">Valid From:</label>
                            <input type="date" id="valid-from" name="lic_from_date" class="input" required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="valid-to">Valid To:</label>
                            <input type="date" id="valid-to" name="lic_ex_date" class="input" required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="license-scan">Scanned Copy:</label>
                            <input type="file" accept="image/png,image/jpeg" id="license-scan" name="lic_scan_copy" class="input" required>
                        </div>
                    </div>

                    <div class="column">
                        <h3>Insurance Details</h3>
                        <div class="form-group input_wrap">
                            <label for="insurance-no">Insurance Number:</label>
                            <input type="text" id="insurance-no" name="ins_No" class="input" required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-valid-from">Valid From:</label>
                            <input type="date" id="insurance-valid-from" name="ins_from_date" class="input" required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-valid-to">Valid To:</label>
                            <input type="date" id="insurance-valid-to" name="ins_ex_date" class="input" required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-company">Insurance Company:</label>
                            <input type="text" id="insurance-company" name="insure_com" class="input"required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-type">Insurance Type:</label>
                            <input type="text" id="insurance-type" name="insure_type" class="input" required>
                        </div>
                        <div class="form-group input_wrap">
                            <label for="insurance-scan">Scanned Copy:</label>
                            <input type="file" id="insurance-scan" name="ins_scan_copy" class="input" required>
                        </div>
                    </div>
                    <div class="column">
                        <h3>Eco Test Details</h3>
                        <div class="form-group input_wrap">
                            <label for="eco-test-scan">Scanned Copy:</label>
                            <input type="file" id="eco-test-scan" name="eco_scan_copy" class="input" required>
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




