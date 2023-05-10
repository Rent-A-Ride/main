<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">

        <a  href="/admin/driverComplaint">Complaint Regarding Drivers</a>
        <a id="active" href="/admin/vehicleComplaint">Complaint Regarding Vehicles</a>



    </div>


    <div class="requests-list">
        <div class="pending-container">
            <div class="req-switch">
            


                <input type="radio" class="with-driver" name="switch" id="with-driver" >
                <label for="with-driver">Complaint </label>
                <input type="radio" class="without-driver" name="switch" id="without-driver" checked>
                <label for="without-driver">Resolve Complaint</label>

            </div>
            <div class="content">
                <div class="with-driver-container">
                   

                    <div class="requests-list">


                        <table class="table">

                            <thead>
                            <tr>
                                
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Vehicle No</th>
                                <th>Complaint</th>
                                <th>Proof</th>
                                <th>Resolve</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $num=1;
                                if ($complaint){
                            
                                    
                                   foreach ($complaint as $row){

                                        if ($row['com_status']==0) {
                                            # code...
                                        
                                ?>
                                    <tr>
                                       
                                            
                                        <td><?php echo($num); ?></td>
                                        <td><?php echo($row['cus_Name']); ?></td>
                                        <td><?php echo($row['Vehicle_No']); ?></td>
                                        <td><?php echo($row['complaint']); ?></td>
                                        <td><button class="button_adminvehicle vehicleComplaintproof" data-compalintId='<?php echo($row['com_ID'])?>' data-customerId='<?php echo($row['cus_ID'])?>' data-vehId='<?php echo($row['veh_id'])?>' data-vehNo='<?php echo($row['Vehicle_No'])?>' data-proof='<?php echo($row['proof'])?>'>Proof</button></td>
                                        <td><button class="button_adminvehicle vehicleComplaintresolve" data-compalintId='<?php echo($row['com_ID'])?>' data-customerId='<?php echo($row['cus_ID'])?>' data-vehId='<?php echo($row['veh_id'])?>' data-vehNo='<?php echo($row['Vehicle_No'])?>'>Resolved Complaint</button></td>
                                            
                                    </tr>

                                    <?php
                                    $num = $num+1;
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
                            <th>Customer Name</th>
                            <th>Vehicle No</th>
                            <th>Complaint</th>
                            <th>Proof</th>
                            <th>Resolved</th>
                            <th>Action</th>

                            
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                                $num=1;
                                if ($complaint){
                            
                                    
                                   foreach ($complaint as $row){
                                    
                                        if ($row['com_status']==1) {
                                            # code...
                                        
                                        # code...
                                    
                //                 
                                ?>
                                    <tr>
                                        
                                        <td><?php echo($num); ?></td>
                                        <td><?php echo($row['cus_Name']); ?></td>
                                        <td><?php echo($row['Vehicle_No']); ?></td>
                                        <td><?php echo($row['complaint']); ?></td>
                                        <td><button class="button_adminvehicle vehicleComplaintproof" data-compalintId='<?php echo($row['com_ID'])?>' data-customerId='<?php echo($row['cus_ID'])?>' data-vehId='<?php echo($row['veh_id'])?>' data-vehNo='<?php echo($row['Vehicle_No'])?>' data-proof='<?php echo($row['proof'])?>'>Proof</button></td>
                                        <td style="color: red;">Complaint Resolved</td>
                                        <td><?php echo($data[$row['com_ID']]); ?></td>   
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


