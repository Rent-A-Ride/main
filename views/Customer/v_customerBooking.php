<?php
/* @var $veh_Id string */
/* @var $vehicle cusVehicle */

use app\models\cusVehicle;

?>

<form action="" method="post" onload="calculatePrice()">
    <div class="book-cont">
        <div class="vehicle-card-minimize">
            <input type="hidden" name="veh_Id" value="<?= $veh_Id ?>">
            <h2 class="vehicle-name"><?= $vehicle->getVehBrand().' '.$vehicle->getVehModel() ?><span> • RR</span></h2>
            <div class="details-cont">
                <!-- Vehicle Gallery -->
                <div id="gallery2">
                    <div class="row">
                        <div class="large-image small">
                            <img class="small" src="/assets/img/vehicle/<?= $vehicle->getFrontView() ?>">
                        </div>
                    </div>
                </div>


                <div class="vehicle-details">
                    <div class="vehicle-features">
                        <span class="vehicle-seats"><i class='bx bx-user'></i> 5 seats</span>
                        <span class="vehicle-fuel"><i class='bx bxs-gas-pump' ></i> Petrol</span>
                        <span class="vehicle-transmission"><i class='bx bx-slider bx-rotate-90' ></i> Automatic</span>
                        <span class="vehicle-fpd"><i class='bx bx-tachometer' ></i> 18 km/l</span>
                    </div>
                    <div class="vehicle-price">
                        <span>Vehicle Rent Price (Per/ Day):</span>
                        <span class="price" id="price-per-day">Rs. <?= $vehicle->getPrice()?>.00 </span>
                    </div>
                    <div class="price-details">
                        <div class="price-details-row">
                            <span>Total rent Amount:</span>
                            <span id="rent-price" class="price">Rs. 0.00 </span>
                        </div>
                        <div id="driver-price-sec" class="price-details-row">
                            <span>Driver fees:</span>
                            <span id="driver-price" class="price">Rs. 0.00 </span>
                        </div>
                        <div class="price-details-row">
                            <span>Total Amount:</span>
                            <span id="total-price" class="price" name="rental_price">Rs. 0.00 </span>
                            <input type="hidden" name="rental_price" value="" id="setRentalPrice">
                        </div>

                    </div>

                    <div class="vehicle-info">
                        <div class="set-date-loc-min">
                            <div class="set-loc">
                                <label for="set-loc">Pick-up</label>
                                <select class="location" name="pickupLocation">
                                    <option name="location" value="" disabled selected hidden></option>
                                    <option selected value="Galle">Galle</option>
                                    <option value="Negombo">Negombo</option>
                                    <option value="Mathale">Mathale</option>
                                    <option value="Kandy">Kandy</option>
                                    <?php if(!empty($location)): ?>
                                        <option value="<?=$location?>" selected><?=$location?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="date-input">
                                <label for="start-date">Start Date</label>
                                <input class="location" type="date" id="start-date" name="startDate" value="<?=$start_date?>"  oninput="setToDateLimits()" >
                            </div>
                            <div class="date-input">
                                <label for="end-date">End Date</label>
                                <input class="location" type="date" id="end-date" name="endDate" value="<?=$end_date?>" oninput="setToDateLimits()">
                            </div>
                        </div>

                    </div>

                </div>
            </div>





        </div>
        <div class="booking-section">
            <section id="self-drive" class="sub-section">
                <h4>Self Drive</h4>
                <div class="space-evenly">
                    <p>Do you want to self-drive?</p>
                    <label class="switch">
                        <input name="selfDriveReq" id="checkSelf" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
            </section>

            <section class="add-driver" id="self-drive-terms" style="display: none">
                <h4>Self Drive Terms</h4>
                <div class="center">
                    <div class="form-group">
                        <label for="licenseNumber">Enter your driving license number:</label>
                        <input type="text" name="licenseNumber" id="licenseNumber" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="expireDate">Enter the expiration date:</label>
                        <input type="date" name="expireDate" id="expireDate" class="form-control">
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#self-drive-modal">
                    View Self Drive Terms
                </button>
            </section>
        </div>

        <!-- Modal -->
<!--        <div class="modal fade" id="self-drive-modal" tabindex="-1" role="dialog" aria-labelledby="self-drive-modal-label" aria-hidden="true">-->
<!--            <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <h5 class="modal-title" id="self-drive-modal-label">Self Drive Terms and Conditions</h5>-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                            <span aria-hidden="true">&times;</span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in libero euismod, aliquet dolor eu, mattis est. Nullam dictum, dolor sed maximus tempus, purus mi gravida massa, et finibus ipsum risus vel nulla. Duis id ligula purus. Nam ut nibh vel enim tincidunt malesuada. Donec in risus ut tellus malesuada lacinia. Praesent vehicula laoreet vestibulum. Ut porttitor libero ac eros dignissim, eu sollicitudin velit molestie. Ut a ipsum justo. Nam ac massa sapien. Ut hendrerit, nisi eu molestie volutpat, orci metus aliquam sapien, nec euismod arcu elit et dui.</p>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


        <div class="booking-section">
            <section id="need-driver" class="sub-section">
                <h4>Request a driver</h4>
                <div class="space-evenly">
                    <p>Do you want a driving partner to your ride?</p>
                    <br>
                    <small style="color: red">* Adding a driver will cost Rs. 1000 per day</small>
                    <label class="switch">
                        <input name="driverReq" id="checkbox1" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
            </section>

            <section class="add-driver" id="add-driver" style="display:none;">
                <h3>Destination</h3>
                <p>Please enter the destination details below:</p>

                <div class="row">
                    <input type="text" id="destination" name="Destination" placeholder="Enter destination">
                </div>

                <section class="driver-details" id="driver-details" style="display:none;">
                    <h3>Selected Driver Details</h3>
                    <p id="driver-details-text">Driver details will appear here when a driver is selected from the list.</p>
                </section>

            </section>


        </div>

        <div class="booking-section">
            <section class="sub-section">
                <h4>Payment Method</h4>
                <div class="space-evenly">
                    <p>What's your preferred payment method? </p>
                    <select id="paymentMethod" name="payMethod">
                        <option value="Cash">Cash</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="HelaPay QR">Helapay</option>
                    </select>
                </div>
            </section>
        </div>

        <div class="booking-section">
            <section id="add-note" class="sub-section">
                <h4>Additional Note</h4>
                <div class="space-evenly">
                    <p>Is there anything else you would like tell to Vehicle Owner?  </p>
                    <label class="switch">
                        <input id="checkbox2" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
            </section>

            <section class="add-driver" id="add-textbox" style="display:none;">
                <p style="font-weight: 500;">Anthing to say...</p>
                <textarea name="note" id="text-area" class="myTextArea" data-max-chars="100" placeholder="This is some default text that will appear in the text area.">
            </textarea>
                <p id="char-limit"></p>
            </section>


        </div>

        <button type="submit" id="send-request">
            Send Request
        </button>

    </div>
</form>

<script>
    window.onload = function() {
        calculatePrice();
    };
</script>





