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

        <a  href="/CustomerPendingRequest">Pending Requests</a>
        <a href="/CustomerAcceptedRequest">Accepted Requests</a>
        <!--        <a href="#ongoing">Completed Requests</a>-->
        <a href="/CustomerRejectedRequest">Rejected Requests</a>
        <a id="active" href="/CustomerOngoingRequest">Ongoing Requests</a>
        <a href="/CustomerCompletedRequest">Completed Requests</a>


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
                <br>
                <input type="radio" class="with-driver" name="switch" id="with-driver" >
                <label for="with-driver">With Driver</label>
                <input type="radio" class="without-driver" name="switch" id="without-driver" checked >
                <label for="without-driver">With-Out Driver</label>

            </div>
            <div class="content">
                <div class="with-driver-container">


                    <!-- content for with driver container -->

                    <div class="requests-list">


                        <table class="table">

                            <thead>
                            <tr  style="text-align: center">


                                <th>Request ID</th>
                                <th colspan="2">Vehicle</th>
                                <th>Customer </th>
                                <th>Start Date</th>
                                <th>End Date</th>


                                <!--                                <th>Destination</th>-->
                                <th> Driver</th>

                                <th>Payment Amount</th>
                                <th>Payment Status</th>

                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                foreach ($model as $row):
                                if ($row->getDriverReq() == 1 && ($row->getPayStatus() == 1 || $row->getPayStatus() == 2) && $row->getStatus() == 1 && date('Y-m-d') >= $row->getStartDate()):
                                ?>
                                <td><?php echo $row->getBookingId()?></td>
                                <td><img src="/assets/img/uploads/vehicle/<?= $vehicles[$row->getVehId()]->getFrontView()?>" width="56px"></td>
                                <td><?= $vehicles[$row->getVehId()]->getVehBrand().' '.$vehicles[$row->getVehId()]->getVehModel()."<br>".$vehicles[$row->getVehId()]->getPlateNo()?></td>
                                <td><?= $customers[$row->getCusId()]->firstname.' '.$customers[$row->getCusId()]->lastname?></td>
                                <td><?php echo $row->getStartDate()?></td>
                                <td><?php echo $row->getEndDate()?></td>

                                <!--                                <td>--><?php //echo $row->getDestination() ?><!--</td>-->
                                <td><?php echo $drivers[$row->getBookingId()]->getDriverFname().' '.$drivers[$row->getBookingId()]->getDriverLname()."<br>".$drivers[$row->getBookingId()]->getPhoneNo()?></td>

                                <td><?php echo $row->getRentalPrice() ?></td>
                                <td><div class="status">

                                        <?php if ($row->getPayStatus() == 1): ?>
                                            <span class="status-txt booked">Advance Done!</span>
                                        <?php elseif ($row->getPayStatus() == 2): ?>
                                            <span class="status-txt confirmed">Completed!</span>
                                        <?php endif; ?>



                                    </div></td>

                                <td><?php echo $row->getNote() ?></td>

                                <td>
                                    <?php if ($row->getPayStatus() == 2): ?>
                                    <form method="post" onsubmit="return confirm('Are you sure you want to mark this request as completed?');">
                                        <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                        <input type="submit" class="mark-completed-button" name="complete" value="Mark as complete">
                                    </form>
                                    <?php elseif ($row->getPayStatus() == 1): ?>
                                        <span class="not-allowed">Not Allowed!</span>

                                    <?php endif; ?>
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
                            <th>Payment Status</th>
                            <th>Note</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total = 0;
                        foreach ($model as $row):
                            if ((int)$row->getDriverReq() ==0 && ($row->getPayStatus() == 1 || $row->getPayStatus() == 2) && date('Y-m-d') >= $row->getStartDate()):

                                ?>
                                <tr>
                                    <td><?php echo $row->getBookingId() ?></td>
                                    <td><img src="/assets/img/uploads/vehicle/<?= $vehicles[$row->getVehId()]->getFrontView()?>" width="56px"></td>
                                    <td><?php echo $vehicles[$row->getVehId()]->getVehBrand().' '.$vehicles[$row->getVehId()]->getVehModel()."<br>".$vehicles[$row->getVehId()]->getPlateNo() ?></td>
                                    <td><?php echo $customers[$row->getCusId()]->firstname.' '.$customers[$row->getCusId()]->lastname?></td>
                                    <td><?php echo $row->getStartDate() ?></td>
                                    <td><?php echo $row->getEndDate() ?></td>

                                    <td><?php echo $row->getRentalPrice() ?></td>
                                    <?php //append to $total
                                    $total += $row->getRentalPrice();
                                    ?>

                                    <td><div class="status">

                                            <?php if ($row->getPayStatus() == 1): ?>
                                                <span class="status-txt booked">Advance Done!</span>
                                            <?php elseif ($row->getPayStatus() == 2): ?>
                                                <span class="status-txt confirmed">Completed!</span>
                                            <?php endif; ?>



                                        </div></td>

                                    <td><?php echo $row->getNote() ?></td>

                                    <td>
                                        <?php if ($row->getPayStatus() == 2): ?>
                                            <form method="post" onsubmit="return confirm('Are you sure you want to mark this request as completed?');">
                                                <input type="hidden" name="booking_Id" value="<?= $row->getBookingId() ?>">
                                                <input type="submit" class="mark-completed-button" name="complete" value="Mark as complete">
                                            </form>
                                        <?php elseif ($row->getPayStatus() == 1): ?>
                                            <span class="not-allowed">Not Allowed!</span>

                                        <?php endif; ?>
                                    </td>







                                </tr>

                            <?php
                            endif;
                        endforeach;
                        ?>
                        </tbody>
                    </table>

<!--                    <p>--><?php //echo $total ?><!--</p>-->
                </div>
            </div>
        </div>





</section>
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