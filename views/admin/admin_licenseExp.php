<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">

        <a id="active" href="/admin/license_Exp">Vehicle License/Insuerance Details</a>
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
                                <th>No</th>
                                <th>Vehicle No</th>
                                <th>Vehicle Owner Name</th>
                                <th>Vehicle Owner Email</th>
                                <th>Expiaring Date</th>
                                <th>No.of to Expire</th>
                                <th>Send</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num=1;
                        
                                if ($veh_ins){
                            
                            
                                   foreach ($veh_ins as $row){
                                    $string_date = $row['ex_date']; // A string representing a date
                                    $timestamp=strtotime($string_date);
                                    $today = time(); // Get current timestamp
                                    if($today>=$timestamp){
                                        $diff = $today-$timestamp; 
                                        $days = floor($diff / (60 * 60 * 24));
                                        $days=-$days;
                                    }
                                    else{
                                        $diff = $timestamp-$today;
                                        $days = floor($diff / (60 * 60 * 24));
                                        
                                    }
                                     // Calculate difference in seconds
                                     // Convert difference to days (rounded down)
                                    
                                    
                                
                                    if ($days<=7 && $days>0) {
                                        # code...
                                    
                //                 
                                ?>
                                    <tr>
                                        <td><?php echo($num); ?></td>
                                        <td><?php echo($row['plate_No']); ?></td>
                                        <td><?php echo($row['owner']); ?></td>
                                        <td><?php echo($row['email']); ?></td>
                                        <td><?php echo($row['ex_date']); ?></td>
                                        <td><?php echo($days); ?></td>
                                        <td><button class="license_exp" data-voID='<?php echo($row['vo_ID'])?>' data-vehID='<?php echo($row['veh_Id'])?>'data-type='insuarance'>Send Notification</button></td>
                                    </tr>

                                <?php
                                  $num=$num+1;
                                    }
                                    else if($days<=0 ){
                                ?>
                                    <tr>
                                        <td><?php echo($num); ?></td>
                                        <td><?php echo($row['plate_No']); ?></td>
                                        <td><?php echo($row['owner']); ?></td>
                                        <td><?php echo($row['email']); ?></td>
                                        <td><?php echo($row['ex_date']); ?></td>
                                        <td style="color: red"><?php echo("Expired"); ?></td>
                                        <td><button class="license_exp" data-voID='<?php echo($row['vo_ID'])?>'data-voID='<?php echo($row['veh_Id'])?>'data-type='insuarance'>Send Notification</button></td>
                                    </tr>

                                <?php
                                    $num=$num+1;
                                    } 
                                   }
                                }
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
                        
                            <th>No</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Owner Name</th>
                            <th>Vehicle Owner Email</th>
                            <th>Expiaring Date</th>
                            <th>No.of to Expire</th>
                            <th>Send</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num=1;
                
                        if ($complaint){
                            
                    
                    
                           foreach ($complaint as $row){
                            
                            $string_date = $row['ex_date']; // A string representing a date
                            $timestamp=strtotime($string_date);
                            $today = time(); // Get current timestamp
                            if($today>=$timestamp){
                                $diff = $today-$timestamp; 
                                $days = floor($diff / (60 * 60 * 24));
                                $days=-$days;
                            }
                            else{
                                $diff = $timestamp-$today;
                                $days = floor($diff / (60 * 60 * 24));
                                
                            }
                             // Calculate difference in seconds
                             // Convert difference to days (rounded down)
                            
                            
                        
                            if ($days<=7 && $days>0) {
                                # code...
                            
        //                 
                        ?>
                            <tr>
                                <td><?php echo($num); ?></td>
                                <td><?php echo($row['plate_No']); ?></td>
                                <td><?php echo($row['owner']); ?></td>
                                <td><?php echo($row['email']); ?></td>
                                <td><?php echo($row['ex_date']); ?></td>
                                <td><?php echo($days); ?></td>
                                <td><button class="license_exp" data-vo='<?php  echo($row['vo_ID'])?>' data-vehID='<?php echo($row['veh_Id'])?>' data-type='license'>Send Notification</button></td>
                            </tr>

                        <?php
                          $num=$num+1;
                            }
                            else if($days<=0 ){
                        ?>
                            <tr>
                                <td><?php echo($num); ?></td>
                                <td><?php echo($row['plate_No']); ?></td>
                                <td><?php echo($row['owner']); ?></td>
                                <td><?php echo($row['email']); ?></td>
                                <td><?php echo($row['ex_date']); ?></td>
                                <td style="color: red"><?php echo("Expired"); ?></td>
                                <td><button class="license_exp" data-vo='<?php echo($row['vo_ID'])?>'data-voID='<?php echo($row['veh_Id'])?>' data-type='license'>Send Notification</button></td>
                            </tr>

                        <?php
                            $num=$num+1;
                            } 
                           }
                        }
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

<!-- <div id="accept" class="popup-container">
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
</div> -->
