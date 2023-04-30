<?php
/**
 * @var $row VehBooking
 * @var $vehicleById cusVehicle
 */

use app\models\VehBooking;
use app\models\cusVehicle;

?>

<h2 class="main-title">Vehicle Bookings</h2>

<h3 class="sub-title">Approved Bookings</h3>

<div class="table-wrapper">
    <table id="myTable" class="bookingTable">
        <thead>
        <tr>
            <th>Booking ID</th>
            <th>Vehicle</th>
            <th>Total Rent</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>


        <?php
        if (isset($vehBooking)):
        foreach ($vehBooking as $row):
            if ($row->getStatus() == 1):
                ?>
                <tbody>

                <tr class="parent">
                    <td><?= $row->getBookingId()?></td>
                    <td>
                        <div class="parent-info">
                            <img src=" /assets/img/vehicle/<?= $vehicleById[$row->getVehId()]->getFrontView() ?>" alt="">
                            <div class="info">
                                <p><strong><?= $vehicleById[$row->getVehId()]->getVehBrand().' '.$vehicleById[$row->getVehId()]->getVehModel() ?></strong></p>
                                <p class="small">RR Vehicle Rent</p>
                            </div>
                        </div>
                    </td>
                    <td><strong> <?= 'Rs. '.$row->getRentalPrice().'.00' ?></strong></td>
                    <td><span class="status pending">Pending</span></td>
                    <td><button id="cancelBookingBtn" class="pay-btn" data-booking-id="<?= $row->getBookingId();?>"><i class='bx bxs-wallet'></i>&nbsp;Pay</button></td>
                    <td><button id="cancelBookingBtn" class="cancel-btn" data-booking-id="<?= $row->getBookingId();?>"><i class='bx bxs-trash'></i> Cancel</button></td>
                </tr>
                <tr class="child" style="display: none;">
                    <td colspan="5" class="child-td">
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
                                            <p><strong>Status:</strong> Pending</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="driver-info">
                                <?php if ($row->getDriverReq()== 1): ?>
                                    <div class="driver-image">
                                        <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="Driver Image">
                                    </div>
                                    <div class="driver-details">
                                        <h3>Driver Details</h3>
                                        <p><strong>Name:</strong> John Doe</p>
                                        <p><strong>Phone:</strong> 123-456-7890</p>
                                        <p><strong>Email:</strong> john.doe@example.com</p>
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
        <tr>
            <p style="text-align: center; color: #3B3B3B">--- No data to shown ---</p>
        </tr>
        </tbody>';
        endif;

        ?>

    </table>
</div>


<h3 class="sub-title">Ongoing Bookings</h3>
<div class="table-wrapper">
    <table id="myTable" class="bookingTable">

        <thead>
        <tr>
            <th>Booking ID</th>
            <th>Vehicle</th>
            <th>Total Rent</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php foreach ($vehBooking as $row):
            if ($row->getStatus() == 0):
            ?>
            <tbody>

            <tr class="parent">
                <td><?= $row->getBookingId()?></td>
                <td>
                    <div class="parent-info">
                        <img src=" /assets/img/vehicle/<?= $vehicleById[$row->getVehId()]->getFrontView() ?>" alt="">
                        <div class="info">
                            <p><strong><?= $vehicleById[$row->getVehId()]->getVehBrand().' '.$vehicleById[$row->getVehId()]->getVehModel() ?></strong></p>
                            <p class="small">RR Vehicle Rent</p>
                        </div>
                    </div>
                </td>
                <td><strong> <?= 'Rs. '.$row->getRentalPrice().'.00' ?></strong></td>
                <td><span class="status pending">Pending</span></td>
                <td><button id="cancelBookingBtn" class="cancel-btn" data-booking-id="<?= $row->getBookingId();?>"><i class='bx bx-trash'></i> Cancel</button></td>
            </tr>
            <tr class="child" style="display: none;">
                <td colspan="5" class="child-td">
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
                                        <p><strong>Status:</strong> Pending</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="driver-info">
                            <?php if ($row->getDriverReq()== 1): ?>
                                <div class="driver-image">
                                    <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="Driver Image">
                                </div>
                                <div class="driver-details">
                                    <h3>Driver Details</h3>
                                    <p><strong>Name:</strong> John Doe</p>
                                    <p><strong>Phone:</strong> 123-456-7890</p>
                                    <p><strong>Email:</strong> john.doe@example.com</p>
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
</script>

<script src="/assets/javascript/customer/components/cancelModal.js"></script>