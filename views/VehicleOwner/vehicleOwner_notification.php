<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">

        <a id="active" href="/Customer/ExpieringNotification">Expiering Notification</a>
        <!-- <a href="/CustomerAcceptedRequest">Accepted Requests</a> -->
<!--        <a href="#ongoing">Completed Requests</a>-->
        <!-- <a href="/CustomerRejectedRequest">Rejected Requests</a> -->

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
                <label for="with-driver">Insuerance Expire</label>
                <input type="radio" class="without-driver" name="switch" id="without-driver" checked>
                <label for="without-driver">License Expire</label>

            </div>
            <div class="content">
                <div class="with-driver-container">
                    <!-- content for with driver container -->

                    <div class="requests-list">


                        <table class="table">

                            <thead>
                            <tr>
                                <th>Vehicle No</th>
                                <th>Expire Date</th>
                                <th>No Of Date/Expired</th>
                                <!-- <th>Address</th> -->
                                <th>Notification Message</th>
                                <th>Updated</th>
                                <!-- <th>Start Date</th>
                                <th>End Date</th>
                                <th>Payment Method</th>
                                <th>Select Driver</th> -->
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($model as $row):
                                        if ($row['type'] == 'insurance'):
                                ?>
                                    <tr>
                                    <td><?php echo $row['plate_No'] ?></td>
                                    <td><?php echo $row['exp_date'] ?></td>
                                    <td><?php echo $row['no_of_date'] ?></td>
                                <!-- <td>Kandy</td> -->
                                    <td><?php echo $row['message'] ?></td>

                                    <td><div class="status">
                                         

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


                <div class="without-driver-container">
                    <!-- content for without driver container -->
                    <table class="table">

                        <thead>
                        <tr>
                        
                            <th>Vehicle No</th>
                            <th>Expire Date</th>
                            <th>No Of Date/Expired</th>
                            <th>Notification Message</th>
                            <th>Updated</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($model as $row):
                            if ($row['type'] == 'license'):
                            ?>
                            <tr>
                                <td><?php echo $row['plate_No'] ?></td>
                                <td><?php echo $row['exp_date'] ?></td>
                                <td><?php echo $row['no_of_date'] ?></td>
                                <!-- <td>Kandy</td> -->
                                <td><?php echo $row['message'] ?></td>

                                <td><div class="status">
                                         

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
