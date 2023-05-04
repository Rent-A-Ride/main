<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
    <section class="requests">

        <div class="topnav">

            <a  href="/CustomerPendingRequest">Pending Requests</a>
            <a id="active" href="/CustomerAcceptedRequest">Accepted Requests</a>
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($model as $row):
                    if ($row->getStatus() == 1 || $row->getStatus() == 2):
                    ?>
                    <tr>
                        <td><?php echo $row->getBookingId() ?></td>
                        <td><?php echo $customer[$row->getCusId()]->firstname.' '.$customer[$row->getCusId()]->lastname?></td>
                        <td><?php echo $customer[$row->getCusId()]->phoneno?></td>
                        <!-- <td>Kandy</td> -->
                        <td><?php echo $vehicle[$row->getVehId()]->getVehBrand().' '.$vehicle[$row->getVehId()]->getVehModel()?></td>
                        <td><?php echo $row->getPickupLocation() ?></td>
                        <td><?php echo $row->getStartDate() ?></td>
                        <td><?php echo $row->getEndDate() ?></td>
                        <td><?php echo $row->getPayMethod() ?></td>
                        <td><?php echo $row->getNote() ?></td>

                        <td><div class="status">
                                <?php if ($row->getStatus() == 1): ?>
                                    <span class="status-txt pending">Payment Pending</span>
                                <?php elseif ($row->getStatus() == 2): ?>
                                <span class="status-txt pending">Driver Pending</span>
                                <?php endif; ?>



                            </div></td>
                        <td><button onclick="openPopup(reject)" class="reject-button">Cancel</button></td>
                    </tr>
                <?php
                endif;
                endforeach;
                ?>


                </tbody>
            </table>
        </div>
    </section>
    </section>
    </div>

    <!-- Pop up confirmation -->
<!---->
<!--    <div id="accept" class="popup-container">-->
<!--        <div class="popup-box">-->
<!--            <p>Are you sure you want to confirm this request?</p>-->
<!--            <button onclick="openPopup(accept, 'yes')" id="yes-button">Yes</button>-->
<!--            <button onclick="openPopup(accept, 'no')" id="no-button">No</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div id="reject" class="popup-container">-->
<!--        <div class="popup-box">-->
<!--            <p>Are you sure you want to reject this request?</p>-->
<!--            <button onclick="openPopup(reject, 'yes')" id="yes-button">Yes</button>-->
<!--            <button onclick="openPopup(reject,'no')" id="no-button">No</button>-->
<!--        </div>-->
<!--    </div>-->
<?php
