<?php
/* @var $row viewCustomerReq */

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
                            <tr>
                                <th>Request ID</th>
                                <th>Customer Name</th>
                                <th>Telephone No.</th>
                                <!-- <th>Address</th> -->
                                <th>Vehicle Name</th>
                                <th>Pickup Location</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Payment Method</th>
                                <th>Select Driver</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>01</td>
                                <td>Sam David</td>
                                <td>076-6848398</td>
                                <!-- <td>Kandy</td> -->
                                <td>Honda Fit</td>
                                <td>Kegalle</td>
                                <td>03-24-22</td>
                                <td>03-30-22</td>
                                <td>Cash</td>
                                <td><div class="status">
                                        <button class="select-button ">Select </button>

                                    </div></td>
                            </tr>

                            <tr>
                                <td>01</td>
                                <td>Sam David</td>
                                <td>076-6848398</td>
                                <!-- <td>Kandy</td> -->
                                <td>Honda Fit</td>
                                <td>Kegalle</td>
                                <td>03-24-22</td>
                                <td>03-30-22</td>
                                <td>Cash</td>
                                <td><div class="status">
                                        <button class="select-button">Select</button>

                                    </div></td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Sam David</td>
                                <td>076-6848398</td>
                                <!-- <td>Kandy</td> -->
                                <td>Honda Fit</td>
                                <td>Kegalle</td>
                                <td>03-24-22</td>
                                <td>03-30-22</td>
                                <td>Cash</td>
                                <td><div class="status">
                                        <button class="select-button">Select</button>

                                    </div></td>
                            </tr>
                            <tr >
                                <td>01</td>
                                <td>Sam David</td>
                                <td>076-6848398</td>
                                <!-- <td>Kandy</td> -->
                                <td>Honda Fit</td>
                                <td>Kegalle</td>
                                <td>03-24-22</td>
                                <td>03-30-22</td>
                                <td>Cash</td>
                                <td><div class="status">
                                        <button class="select-button">Select</button>

                                    </div></td>
                            </tr>
                            <tr >
                                <td>01</td>
                                <td>Sam David</td>
                                <td>076-6848398</td>
                                <!-- <td>Kandy</td> -->
                                <td>Honda Fit</td>
                                <td>Kegalle</td>
                                <td>03-24-22</td>
                                <td>03-30-22</td>
                                <td>Cash</td>
                                <td>
                                    <div class="status">
                                        <button class="select-button">Select </button>

                                </td>
                            </tr>
                            <script src="vehreq.js"></script>
                            </tbody>
                        </table>
                    </div>


                </div>


                <div class="without-driver-container">
                    <!-- content for without driver container -->
                    <table class="table">

                        <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Customer Name</th>
                            <th>Telephone No.</th>
                            <!-- <th>Address</th> -->
                            <th>Vehicle Name</th>
                            <th>Pickup Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Payment Method</th>
                            <th>Special Note</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($model as $row):
                            if ($row->getStatus() == 0 && $row->getDriverReq() == 0):
                            ?>
                            <tr>
                                <td><?php echo $row->getBookingId() ?></td>
                                <td><?php echo $row->getCusId()==1? "Kasun Perera":"Supun Thilanka"?></td>
                                <td>076-6848398</td>
                                <!-- <td>Kandy</td> -->
                                <td>Honda Fit</td>
                                <td><?php echo $row->getPickupLocation() ?></td>
                                <td><?php echo $row->getStartDate() ?></td>
                                <td><?php echo $row->getEndDate() ?></td>
                                <td><?php echo $row->getPayMethod() ?></td>
                                <td><?php echo $row->getNote() ?></td>

                                <td><div class="status">
                                        <button onclick="openPopup(<?= $row->getBookingId() ?>)" class="accept-button">Accept </button>
                                        <button onclick="displayRejectPopup()" class="reject-button">Reject</button>

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
