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
    <button onclick="location.href='/Customer/VehicleBookingTable/Active'">Active Bookings</button>
    <button class="selected">Completed Bookings</button>
</div>

<h3 class="sub-title">Completed Bookings</h3>

<div class="table-wrapper">
    <table id="myTable" class="bookingTable">
        <thead>
        <tr>
            <th>Booking ID</th>
            <th>Vehicle</th>
            <th>Total Rent</th>
            <th>Payment</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php
        if (isset($vehBooking)):
            foreach ($vehBooking as $row):

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
                        <td><strong> <?= 'Rs. '.$cusPayment[$row->getBookingId()]->getTotalRent().'.00' ?></strong></td>
                        <td><strong>
                                <?php if ($cusPayment[$row->getBookingId()]->getStatusPay() == 2): ?>
                                    <span class="pay-type">Paid</span>
                                <?php elseif ($cusPayment[$row->getBookingId()]->getStatusPay() == 1): ?>
                                    <span class="pay-type">Advance Only</span>

                                <?php endif; ?>
                            </strong></td>
                        <td><span class="status completed"> COmpleted</span></td>
                        <td colspan="2">
                            <div class="actions">
                                <button class="review-button" onclick="openReviewModal()">Write a Review</button>
                                <button class="reorder-button" onclick="location.href='/VehicleInfo?id=<?=$row->getVehId()?>'">Reorder</button>
                            </div>
                        </td>
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
                                                <p><strong>Status:</strong> Completed</p>
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
        <div id="review-modal" class="review-modal">
            <div class="review-modal-content">
                <span class="close-modal" onclick="closeReviewModal()">&times;</span>

                <!-- Reviews content goes here -->
                <div class="reviews-container">
                    <h2>Reviews</h2>
                    <?php
                    if ($vehReview[$row->getBookingId()]!=null):
                    ?>

                    <div class="review">
                        <div class="review-header">
                            <div class="review-details">

                                <div class="ratings">
                                    <span><strong>Ratings:</strong></span>
                                    <?php
                                    for ($i = 0; $i < $vehReview[$row->getBookingId()]->getRating(); $i++):
                                        ?>
                                        <i class='bx bxs-star' style="color: #ffc547;" ></i>
                                    <?php
                                    endfor;
                                    for ($i = 0; $i < 5 - $vehReview[$row->getBookingId()]->getRating(); $i++):
                                        ?>
                                        <i class='bx bxs-star' style="color: black;" ></i>
                                    <?php
                                    endfor;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="review-body" style="border: 1px solid black">
                            <p><?= $vehReview[$row->getBookingId()]->getComments() ?></p>
                        </div>


                        <?php
                        else:
                            ?>
                            <form id="review-form" method="post">
                                <input hidden name="veh_Id" value="<?=$row->getVehId()?>">
                                <input hidden name="booking_Id" value="<?=$row->getBookingId()?>">
                                <label for="rating">Rating:</label>
                                <select id="rating" name="rating" required>
                                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                    <option value="4">&#9733;&#9733;&#9733;&#9733;&#9734;</option>
                                    <option value="3">&#9733;&#9733;&#9733;&#9734;&#9734;</option>
                                    <option value="2">&#9733;&#9733;&#9734;&#9734;&#9734;</option>
                                    <option value="1">&#9733;&#9734;&#9734;&#9734;&#9734;</option>
                                </select>
                                <label for="review-text">Review:</label>
                                <textarea rows="5" required id="review-text" name="comments" class="myTextArea"></textarea>
                                <button type="submit" name="review">Submit</button>
                            </form>
                        <?php
                        endif;
                        ?>
                    </div>


                </div>
            </div>

            <?php
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

    // Function to open the review modal
    function openReviewModal() {
        var review = document.getElementById('review-modal');
        review.style.display = 'block';
    }

    // Function to close the review modal
    function closeReviewModal() {
        var review = document.getElementById('review-modal');
        review.style.display = 'none';
    }
</script>

<script src="/assets/javascript/customer/components/cancelModal.js"></script>
