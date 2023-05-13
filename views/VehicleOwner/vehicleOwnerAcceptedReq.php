






<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">
        <a href="/CustomerPendingRequest">Pending Requests</a>
        <a id="active" href="/CustomerAcceptedRequest">Accepted Requests</a>
        <!--        <a href="#ongoing">Completed Requests</a>-->
        <a href="/CustomerRejectedRequest">Rejected Requests</a>
        <a href="/CustomerOngoingRequest">Ongoing Requests</a>
        <a href="/CustomerCompletedRequest">Completed Requests</a>

    </div>



    <div class="requests-list">
        <div class="pending-container">
            <div class="req-switch">
                <input type="radio" class="with-driver" name="switch" onclick="showWithDriver()" id="with-driver" checked>
                <label for="with-driver">W/ Driver</label>
                <input type="radio" class="without-driver" name="switch" onclick="showWithoutDriver()" id="without-driver">
                <label for="without-driver">W/O Driver</label>
            </div>


            <div class="content">
                <div class="with-driver-accepted-container" style="display: block">

                    <!-- content for with driver container -->

                    <div class="requests-list">


                        <table class="table">

                             <thead>
                                <tr  style="text-align: center">

                                <tr>
                                    <th>Request ID</th>
                                    <th colspan="2">Vehicle</th>
                                    <th>Customer Name</th>
                                    <th>Telephone No.</th>
                                    <!-- <th>Address</th> -->

                                    <th>Pickup Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Driver Name</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Special Note</th>

                                    <th>Action</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($model as $row):
                                        if ($row->getDriverReq()== 1 && $row->getStatus() == 1  ):

                                        ?>
                                        <tr>
                                            <td><?php echo $row->getBookingId() ?></td>
                                            td><img src="/assets/img/uploads/vehicle/<?= $vehicles[$row->getVehId()]->getFrontView()?>" width="56px"></td>
                                            <td><?= $vehicles[$row->getVehId()]->getVehBrand().' '.$vehicles[$row->getVehId()]->getVehModel()."<br>".$vehicles[$row->getVehId()]->getPlateNo()?></td>
                                            <td><?php echo $customer[$row->getCusId()]->firstname.' '.$customer[$row->getCusId()]->lastname?></td>
                                            <td><?php echo $customer[$row->getCusId()]->phoneno?></td>

                                            <td><?php echo $row->getPickupLocation() ?></td>
                                            <td><?php echo $row->getStartDate() ?></td>
                                            <td><?php echo $row->getEndDate() ?></td>
                                            <td>driver name</td>
<!--                                            <td>--><?php //echo $driver[$row->getDriverbyId()]->getDriverFname(). ' ' .$driver[$row->getDriverbyId()]->getDriverLname()?><!--</td>-->
                                            <td><?php echo $row->getPayMethod() ?></td>
                                            <td><div class="status">
                                                    <?php if ($row->getStatus() == 1): ?>
                                                        <span class="status-txt pending">Payment Pending</span>
                                                    <?php elseif ($row->getStatus() == 2): ?>
                                                        <span class="status-txt pending">Driver Pending</span>
                                                    <?php endif; ?>



                                                </div></td>
                                            <td><?php echo $row->getNote() ?></td>


                                            <td>
                                                <form method="post" onsubmit="return confirm('Are you sure you want to cancel this accepted request?');">
                                                    <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                                    <input type="submit" class="reject-button" value="Cancel">
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



                    <!-- content for without driver container -->

                       <div class="without-driver-accepted-container" style="display: none">
                            <table class="table">

                                <thead>
                                <tr  style="text-align: center">

                                <tr>
                                    <th>Request ID</th>
                                    <th colspan="2">Vehicle</th>
                                    <th>Customer Name</th>
                                    <th>Telephone No.</th>
                                    <!-- <th>Address</th> -->

                                    <th>Pickup Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Special Note</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($model as $row):
                                    if ((int)$row->getDriverReq()== 0 && $row->getStatus() == 1 ):

                                        ?>
                                        <tr>
                                            <td><?php echo $row->getBookingId() ?></td>
                                            <td><?php echo $vehicle[$row->getVehId()]->getVehBrand().' '.$vehicle[$row->getVehId()]->getVehModel()?></td>
                                            <td><?php echo $customer[$row->getCusId()]->firstname.' '.$customer[$row->getCusId()]->lastname?></td>
                                            <td><?php echo $customer[$row->getCusId()]->phoneno?></td>
                                            <!-- <td>Kandy</td> -->

                                            <td><?php echo $row->getPickupLocation() ?></td>
                                            <td><?php echo $row->getStartDate() ?></td>
                                            <td><?php echo $row->getEndDate() ?></td>
                                            <td><?php echo $row->getPayMethod() ?></td>
                                            <td><?php echo $row->getNote() ?></td>

                                            <td><div class="status">
                                                    <?php if ($row->getStatus() == 1): ?>
                                                        <span class="status-txt pending">Payment Pending</span>
<!--                                                    --><?php //elseif ($row->getStatus() == 2): ?>
<!--                                                        <span class="status-txt pending">Driver Pending</span>-->
                                                    <?php endif; ?>



                                                </div></td>
                                            <td><form method="post" onsubmit="return confirm('Are you sure you want to cancel this accepted request?');">
                                                    <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                                    <input type="submit" class="reject-button" value="Cancel">
                                                </form></td>


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





</section>
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
