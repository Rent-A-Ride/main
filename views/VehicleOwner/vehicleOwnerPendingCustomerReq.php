<?php
/* @var $row VehBooking */
/* @var $customer Customer */
/* @var $vehicle vehicle */
/* @var $drow driver */


use app\models\Customer;
use app\models\driver;
use app\models\VehBooking;
use app\models\vehicle;
use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">

        <a id="active" href="/CustomerPendingRequest">Pending Requests</a>
        <a href="/CustomerAcceptedRequest">Accepted Requests</a>
        <!--        <a href="#ongoing">Completed Requests</a>-->
        <a href="/CustomerRejectedRequest">Rejected Requests</a>

        <!-- <div class="search-container">
          <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div> -->


    </div>


    <div class="requests-list">
        <div class="pending-container">
            <div class="req-switch">
                <input type="radio" class="with-driver" name="switch" id="with-driver" >
                <label for="with-driver">W/ Driver</label>
                <input type="radio" class="without-driver" name="switch" id="without-driver" checked>
                <label for="without-driver">W/O Driver</label>

            </div>
            <div class="content">
                <div class="with-driver-container">
                    <!-- content for with driver container -->

                    <div class="requests-list">


                        <table class="table">

                            <thead>
                            <tr  style="text-align: center">


                                <th>Request<br>
                                    ID</th>
                                <th colspan="2">Vehicle</th>
                                <th>Customer </th>
                                <th>Duration</th>

                                <th>Destination</th>
                                <th>Payment Amount</th>
                                <th>Note</th>
                                <th>Select Driver</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                $location = array();
                                foreach ($model as $row):
                                if ($row->getStatus() == 0 && $row->getDriverReq() == 1):
                                $location[$row->getBookingId()] = $row->getPickupLocation();
                                ?>
                                <td><?= $row->getBookingId()?></td>
                                <td><img src="/assets/img/uploads/vehicle/<?= $vehicle[$row->getVehId()]->getFrontView()?>" width="56px"></td>
                                <td><?= $vehicle[$row->getVehId()]->getVehBrand().' '.$vehicle[$row->getVehId()]->getVehModel()."<br>".$vehicle[$row->getVehId()]->getPlateNo()?></td>
                                <td><?= $customer[$row->getCusId()]->firstname.' '.$customer[$row->getCusId()]->lastname?></td>
                                <td><?php echo $row->getStartDate() ."<br>". "To"."<br>".$row->getEndDate()?></td>
                                <td><?php echo $row->getDestination() ?></td>
                                <td><?php echo $row->getRentalPrice() ?></td>
                                <td><?php echo $row->getNote() ?></td>



                                <td>
<!--                                    <div class="status">-->
<!--                                        <button class="select-button " onclick="openModal(--><?php //= $row->getBookingId()?><!--)">Select </button>-->
<!--                                    </div>-->

                                    <div class="driver-select">
                                        <select class="driver-selection" name="driver" >
                                            <option value="">Select a driver</option>
                                            <?php
                                            foreach ($drivers as $driver):
                                            ?>
                                            <option value="">
                                                <?= $driver->getDriverFname().' '.$driver->getDriverLname()?>
                                            </option>
                                            <?php
                                            endforeach;
                                            ?>


                                        </select>
                                    </div>
                                </td>
                                <td>


                                    <form method="post" onsubmit="return confirm('Are you sure you want to send this request?');">
                                        <input type="hidden" name="booking_Id" >
                                        <input type="submit" class="driver-req-button" value="Send Request">
                                    </form>
                                    <br>
                                    <form method="post" onsubmit="return confirm('Are you sure you want to reject this request?');">
                                        <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                        <input type="submit" class="reject-button" value="Reject">
                                    </form>
                                </td>
                            </tr>
                            <?php
                            endif;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>


                </div>


                <div class="without-driver-container">
                    <!-- content for without driver container -->
                    <table class="table">

                        <thead>
                        <tr  style="text-align: center">


                            <th>Request ID</th>
                            <th colspan="2">Vehicle</th>
                            <th>Customer </th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Payment Amount</th>
                            <th>Note</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($model as $row):
                            if ((int)$row->getDriverReq() ==0 && (int)$row->getStatus() == 0):

                                ?>
                                <tr>
                                    <td><?php echo $row->getBookingId() ?></td>
                                    <td><img src="/assets/img/uploads/vehicle/<?= $vehicle[$row->getVehId()]->getFrontView()?>" width="56px"></td>
                                    <td><?php echo $vehicle[$row->getVehId()]->getVehBrand().' '.$vehicle[$row->getVehId()]->getVehModel()."<br>".$vehicle[$row->getVehId()]->getPlateNo() ?></td>
                                    <td><?php echo $customer[$row->getCusId()]->firstname.' '.$customer[$row->getCusId()]->lastname?></td>
                                    <td><?php echo $row->getStartDate() ?></td>
                                    <td><?php echo $row->getEndDate() ?></td>

                                    <td><?php echo $row->getRentalPrice() ?></td>
                                    <td><?php echo $row->getNote() ?></td>

                                    <td><div class="status" style="display: flex">
                                            <form method="post" onsubmit="return confirm('Are you sure you want to confirm this request?');">
                                                <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                                <input type="submit" class="accept-button" value="Accept">
                                            </form>
                                            <br>
                                            <form method="post" onsubmit="return confirm('Are you sure you want to reject this request?');">
                                                <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                                <input type="submit" class="reject-button" value="Reject">
                                            </form>
                                        </div></td>
                                </tr>

                            <?php
                            endif;
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Driver Pop-up -->
        <div id="popup-driver" class="popup-container">
            <div class="popup-box">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="drivers-list">


                    <table class="table">
                        <input type="hidden" id="pickupLocation" value="">

                        <thead>
                        <tr>

                            <th>Driver Name</th>
                            <th>Telephone No.</th>
                            <th>Location</th>
                            <th>Reviews</th>
                            <th>Assign Driver</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
//                        foreach ($drivers as $driver):
//                            $vehicle
                        // $booking_ID =

                                ?>
                                <tr>
                                    <input type="hidden" id="bookingId" value="<?= $row->getBookingId() ?>">
                                    <td></td>
                                    <td></td>
                                    <td></td>


                                    <td>10 reviews</td>


                                    <td>
                                        <div class="status">
<!--                                            <button class="assign-button">Assign </button>-->
                                            <form method="post">
                                                <input name="type" value="driver" hidden>
                                                <input id="booking-id" type="hidden" name="booking_Id" value="<?= $booking_Id ?>">
                                                <input type="hidden" name="driver_ID" value="">
                                                <input type="hidden" name="status" value="1">
                                                <input type="submit" class="accept-button" value="Send request">
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            <?php

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>









    </div>
</section>
</section>
</div>

<!-- Pop up confirmation -->

<div id="accept" class="popup-container">
    <div class="popup-box">
        <p>Are you sure you want to confirm this request?</p>
        <button onclick="window.location.href='/vehicleOwner/acceptBooking';" id="yes-button">Yes</button>
        <button onclick="closePopup()" id="no-button">No</button>
    </div>
</div>

<div id="reject" class="popup-container">
    <div class="popup-box">
        <p>Are you sure you want to reject this request?</p>
        <button onclick="window.location.href='/CustomerRejectedRequest';" id="yes-button">Yes</button>
        <button onclick="closePopup()" id="no-button">No</button>
    </div>
</div>





/* Popup JS */
<script>
    const modal = document.getElementById("popup-driver");

    function closeModal() {
        modal.style.display = "none";
    }

    function openModal($id) {
        modal.style.display = "block";
        const bookingId = document.getElementById("booking-id");
        bookingId.value = $id;

    }
</script>