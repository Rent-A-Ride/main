<?php
/**
 * @var $row VehBooking
 * @var $vehicleById cusVehicle
 */

use app\models\VehBooking;
use app\models\cusVehicle;

?>

<h2 class="main-title">Customer Vehicle Bookings</h2>

<div class="button-container">
    <button onclick="location.href='/Customer/VehicleBookingTable'">Unpaid Bookings</button>
    <button class="selected">Active Bookings</button>
    <button onclick="location.href='/Customer/VehicleBookingTable/Complete'">Completed Bookings</button>
</div>

<h3 class="sub-title">Ongoing Bookings</h3>

<div class="table-wrapper">
    <table id="myTable" class="bookingTable">
        <thead>
        <tr>
            <th>Booking ID</th>
            <th>Vehicle</th>
            <th>Paid Amount</th>
            <th>Total Rent</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        if (isset($vehBooking)):
            foreach ($vehBooking as $row):
                if ($row->getStatus() == 2 && date('Y-m-d') >= $row->getStartDate() && date('Y-m-d') <= $row->getEndDate()):
                    ?>
                    <tbody>

                    <tr class="parent tr1">
                        <td><?= $row->getBookingId()?></td>
                        <td>
                            <div class="parent-info">
                                <img src=" /assets/img/uploads/vehicle/<?= $vehicleById[$row->getVehId()]->getFrontView() ?>" alt="">
                                <div class="info">
                                    <p><strong><?= $vehicleById[$row->getVehId()]->getVehBrand().' '.$vehicleById[$row->getVehId()]->getVehModel() ?></strong></p>
                                    <p class="small">RR Vehicle Rent</p>
                                </div>
                            </div>
                        </td>
                        <td><strong> <?= 'Rs. '.number_format($cusPayment[$row->getBookingId()]->getPaymentAmount(),2) ?></strong></td>
                        <td><strong> <?= 'Rs. '.$cusPayment[$row->getBookingId()]->getTotalRent().'.00' ?></strong></td>
                        <td><strong>
                                <?php if ($cusPayment[$row->getBookingId()]->getStatusPay() == 2): ?>
                                    <span class="pay-type">Full Payment Done</span>
                                <?php elseif ($cusPayment[$row->getBookingId()]->getStatusPay() == 1): ?>
                                    <span class="pay-type">Rs. <?= number_format($cusPayment[$row->getBookingId()]->getTotalRent() - $cusPayment[$row->getBookingId()]->getPaymentAmount(),2)?> <br> Remaining</span>

                                <?php endif; ?>
                            </strong></td>
                        <td><span class="status confirmed"><i class='bx bxs-circle bx-flashing' ></i> Ongoing</span></td>
                        <?php if ($cusPayment[$row->getBookingId()]->getStatusPay() == 1): ?>
                        <td><button onclick="location.href='/Customer/CompletePayment?booking=<?=$row->getBookingId()?>'" id="cancelBookingBtn" class="pay-btn" data-booking-id="<?= $row->getBookingId();?>"><i class='bx bxs-wallet'></i>&nbsp;Pay</button></td>
                        <?php else: ?>
                            <td><span style="font-size: 25px; color: #28a745 "><i class='bx bxs-check-circle'></i></span></td>
                        <?php endif; ?>
<!--                        <td><button id="cancelBookingBtn" class="cancel-btn" data-booking-id="--><?php //= $row->getBookingId();?><!--"><i class='bx bxs-trash'></i> Cancel</button></td>-->
                    </tr>
                    <tr class="child tr1" style="display: none;">
                        <td colspan="7" class="child-td">
                            <div class="child-info">
                                <div class="booking-info">
                                    <h3>Booking Info</h3>
                                    <div class="booking-data">
                                        <div class="row">
                                            <div class="cell">
                                                <p><strong>Start Date:</strong>  <?= $row->getStartDate() ?></p>
                                            </div>
                                            <div class="cell">
                                                <p><strong>End Date:</strong> <?= $row->getEndDate() ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cell">
                                                <p><strong>Destination:</strong> <?= $row->getDestination()?></p>
                                            </div>
                                            <div class="cell">
                                                <p><strong>Status:</strong> <?= (strtotime($row->getEndDate())-strtotime(date('Y-m-d')))/(60 * 60 * 24) ?> Days Remaining</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="driver-info">
                                    <?php if ($row->getDriverReq()== 1): ?>
                                        <div class="driver-image">
                                            <img src="/assets/img/uploads/default.jpg" alt="Driver Image">
                                        </div>
                                        <div class="driver-details">
                                            <h3>Driver Details</h3>
                                            <p><strong>Name:</strong> <?= $driverById[$driverReq[$row->getBookingId()]->getDriverID()]->getDriverFname().' '.$driverById[$driverReq[$row->getBookingId()]->getDriverID()]->getDriverLname() ?></p>
                                            <div class="ratings">
                                                <span><strong>Ratings:</strong></span>
                                                <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                                <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                                <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                                <i class='bx bxs-star' style="color: black;" ></i>
                                                <span><small>(4)</small></span>

                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="driver-image">
                                            <img src="/assets/img/uploads/default.jpg" alt="Driver Image">
                                        </div>
                                        <p style="text-align: center">
                                            No Driver Requested!</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                <?php endif;
            endforeach;
        else:
            echo '<tbody>
        <tr class="tr1">
            <p style="text-align: center; color: #3B3B3B">--- No data to shown ---</p>
        </tr>
        </tbody>';
        endif;

        ?>

    </table>
</div>


<h3 class="sub-title">Upcoming Bookings</h3>
<div class="table-wrapper">
    <table id="myTable2" class="bookingTable">

        <thead>
        <tr>
            <th>Booking ID</th>
            <th>Vehicle</th>
            <th>Paid Amount</th>
            <th>Total Rent</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php foreach ($vehBooking as $row):
            if ($row->getStatus() == 2 && $row->getStartDate() > date('Y-m-d')):
                ?>
                <tbody>

                <tr class="parent tr2">
                    <td><?= $row->getBookingId()?></td>
                    <td>
                        <div class="parent-info">
                            <img src=" /assets/img/uploads/vehicle/<?= $vehicleById[$row->getVehId()]->getFrontView() ?>" alt="">
                            <div class="info">
                                <p><strong><?= $vehicleById[$row->getVehId()]->getVehBrand().' '.$vehicleById[$row->getVehId()]->getVehModel() ?></strong></p>
                                <p class="small">RR Vehicle Rent</p>
                            </div>
                        </div>
                    </td>
                    <td><strong> <?= 'Rs. '.number_format($cusPayment[$row->getBookingId()]->getPaymentAmount(),2) ?></strong></td>
                    <td><strong> <?= 'Rs. '.$cusPayment[$row->getBookingId()]->getTotalRent().'.00' ?></strong></td>
                    <td><strong>
                            <?php if ($cusPayment[$row->getBookingId()]->getStatusPay() == 2): ?>
                                <span class="pay-type">Completed</span>
                            <?php elseif ($cusPayment[$row->getBookingId()]->getStatusPay() == 1): ?>
                                <span class="pay-type">Rs. <?= number_format($cusPayment[$row->getBookingId()]->getTotalRent() - $cusPayment[$row->getBookingId()]->getPaymentAmount(),2)?> <br> Remaining</span>

                            <?php endif; ?>
                        </strong></td>
                    <td><span class="status booked">Upcoming</span></td>
                    <td><button onclick="location.href='/Customer/CompletePayment?booking=<?=$row->getBookingId()?>'" id="cancelBookingBtn" class="pay-btn" data-booking-id="<?= $row->getBookingId();?>"><i class='bx bxs-wallet'></i>&nbsp;Pay</button></td>
                    <!--                        <td><button id="cancelBookingBtn" class="cancel-btn" data-booking-id="--><?php //= $row->getBookingId();?><!--"><i class='bx bxs-trash'></i> Cancel</button></td>-->
                </tr>
                <tr class="child tr2" style="display: none;">
                    <td colspan="7" class="child-td">
                        <div class="child-info">
                            <div class="booking-info">
                                <h3>Booking Info</h3>
                                <div class="booking-data">
                                    <div class="row">
                                        <div class="cell">
                                            <p><strong>Start Date:</strong>  <?= $row->getStartDate() ?></p>
                                        </div>
                                        <div class="cell">
                                            <p><strong>End Date:</strong> <?= $row->getEndDate() ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell">
                                            <p><strong>Destination:</strong> <?= $row->getDestination()?></p>
                                        </div>
                                        <div class="cell">
                                            <p><strong>Status:</strong> <?= (strtotime($row->getStartDate())-strtotime(date('Y-m-d')))/(60 * 60 * 24)?> Days more</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="driver-info">
                                <?php if ($row->getDriverReq()== 1): ?>
                                    <div class="driver-image">
                                        <img src="/assets/img/uploads/default.jpg" alt="Driver Image">
                                    </div>
                                    <div class="driver-details">
                                        <h3>Driver Details</h3>
                                        <p><strong>Name:</strong> <?= $driverById[$driverReq[$row->getBookingId()]->getDriverID()]->getDriverFname().' '.$driverById[$driverReq[$row->getBookingId()]->getDriverID()]->getDriverLname() ?></p>
                                        <div class="ratings">
                                            <span><strong>Ratings:</strong></span>
                                            <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                            <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                            <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                            <i class='bx bxs-star' style="color: black;" ></i>
                                            <span><small>(4)</small></span>

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="driver-image">
                                        <img src="/assets/img/uploads/default.jpg" alt="Driver Image">
                                    </div>
                                    <p style="text-align: center">
                                        No Driver Requested!</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>

                </tbody>
            <?php endif;
        endforeach; ?>

    </table>
</div>










<!--Cancel Booking Popup with reason-->
<div id="cancelModal" class="cancelModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Reason for Cancellation</h2>
        <form method="post" id="booking-cancel-form">
            <input type="hidden" name="bookingId" id="bookingId">
            <div class="radio-group">
                <label class="radio">
                    <input type="radio" name="reason" value="change_of_plans">
                    <span class="radio-label">Change of my mind</span>
                </label>
                <label class="radio">
                    <input type="radio" name="reason" value="vehicle_issue">
                    <span class="radio-label">Cancel my trip</span>
                </label>
                <label class="radio">
                    <input type="radio" name="reason" value="personal_emergency">
                    <span class="radio-label">Found another deal</span>
                </label>
                <label class="radio">
                    <input type="radio" name="reason" value="other">
                    <span class="radio-label">Other</span>
                </label>
            </div>
            <div class="form-group">
                <label for="comments">Additional comments (optional):</label>
                <textarea cols="6" id="comments" name="comment"></textarea>
            </div>
            <div class="form-group">
                <!--                <button class="submit" type="submit">Submit</button>-->
                <input type="submit" class="submit">
            </div>
        </form>
    </div>
</div>


<script>
    const table = document.getElementById("myTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        row.addEventListener("click", function() {
            let sibling = this.nextElementSibling;
            if (sibling.classList.contains("child")) {
                if (sibling.style.display === "table-row") {
                    sibling.style.display = "none";
                } else {
                    sibling.style.display = "table-row";
                }
            }
        });
    }

    const table2 = document.getElementById("myTable2");
    const rows2 = table2.getElementsByClassName("tr2");

    for (let i = 0; i < rows2.length; i++) {
        let row2 = rows2[i];
        row2.addEventListener("click", function() {
            let sibling = this.nextElementSibling;
            if (sibling.classList.contains("child")) {
                if (sibling.style.display === "table-row") {
                    sibling.style.display = "none";
                } else {
                    sibling.style.display = "table-row";
                }
            }
        });
    }
</script>

<script src="/assets/javascript/customer/components/cancelModal.js"></script>
