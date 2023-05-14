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
        <a  href="/CustomerOngoingRequest">Ongoing Requests</a>
        <a id="active" href="/CustomerCompletedRequest">Completed Requests</a>


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


                                <th>Request<br>
                                    ID</th>
                                <th colspan="2">Vehicle</th>
                                <th>Customer </th>
                                <th>Start Date</th>
                                <th>End Date</th>

                                <th> Driver</th>
                                <th>Payment Amount</th>
                                <th>Payment Status</th>
                                <th>Reviews</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                foreach ($model as $row):
                                if ($row->getDriverReq() == 1 && $row->getStatus() == 3):
                                ?>
                                <td><?= $row->getBookingId()?></td>
                                <td><img src="/assets/img/uploads/vehicle/<?= $vehicles[$row->getVehId()]->getFrontView()?>" width="56px"></td>
                                <td><?= $vehicles[$row->getVehId()]->getVehBrand().' '.$vehicles[$row->getVehId()]->getVehModel()."<br>".$vehicles[$row->getVehId()]->getPlateNo()?></td>
                                <td><?= $customers[$row->getCusId()]->firstname.' '.$customers[$row->getCusId()]->lastname?></td>
                                <td><?php echo $row->getStartDate() ?></td>
                                <td><?php echo  $row->getEndDate() ?></td>
                                <td>Driver Name</td>

                                <td><?php echo $row->getRentalPrice() ?></td>

                                <td><div class="status">


                                        <?php if ($row->getPayStatus() == 2): ?>
                                            <span class="status-txt confirmed">Completed!</span>
                                        <?php endif; ?>



                                    </div></td>


                                <td>
                                    <!--                                    <div class="status">-->
                                    <!--                                        <button class="select-button " onclick="openModal(--><?php //= $row->getBookingId()?><!--)">Select </button>-->
                                    <!--                                    </div>-->

                                    <!--                                    <div class="driver-select">-->
                                    <!--                                        <select class="driver-selection" name="driver" >-->
                                    <!--                                            <option value="">Select a driver</option>-->
                                    <!--                                            --><?php
                                    //                                            foreach ($drivers as $driver):
                                    //                                                ?>
                                    <!--                                                <option value="">-->
                                    <!--                                                    --><?php //= $driver->getDriverFname().' '.$driver->getDriverLname()?>
                                    <!--                                                </option>-->
                                    <!--                                            --><?php
                                    //                                            endforeach;
                                    //                                            ?>
                                    <!---->
                                    <!---->
                                    <!--                                        </select>-->
                                    <!--                                    </div>-->
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
                            <th>Reviews</th>



                        </tr>
                        </thead>
                        <tbody>



                        <?php
                        $total = 0;
                        foreach ($model as $row):
                            if ((int)$row->getDriverReq() ==0 && $row->getStatus() == 3):
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


                                            <?php if ($row->getPayStatus() == 2): ?>
                                                <span class="status-txt confirmed">Completed!</span>
                                            <?php endif; ?>



                                        </div></td>






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
