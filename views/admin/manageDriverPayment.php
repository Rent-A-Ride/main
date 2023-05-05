<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">

        <a  href="/admin/managepayment">Vehicle Owners Payments</a>
        <a id="active" href="/admin/managedriverpayment">Drivers Payments</a>
        <a  href="/admin/manageCustomerPayment">Customers Payments</a>



    </div>


    <div class="requests-list">
        <div class="pending-container">
            <div class="req-switch">
            <?php
                $current_month_name = date('F');
            ?>


                <input type="radio" class="with-driver" name="switch" id="with-driver" >
                <label for="with-driver"><?php echo $current_month_name?> </label>
                <input type="radio" class="without-driver" name="switch" id="without-driver" checked>
                <label for="without-driver">All</label>

            </div>
            <div class="content">
                <div class="with-driver-container">
                   

                    <div class="requests-list">


                        <table class="table">

                            <thead>
                            <tr>
                                
                                <th>Driver Name</th>
                                <th>Driver Email</th>
                                <th>Payment Amount</th>
                                <th>Payment status</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                        
                                if ($rent){
                            
                                    
                                   foreach ($rent as $a){
                                    
                                    
                                        # code...
                                    
                //                 
                                ?>
                                    <tr>
                                        <?php 
                                            foreach ($drivers as $row){
                                                
                                                if ($a['driver_Id']==$row['driver_ID']) {
                                                    
                                        ?>
                                                <td><?php echo($row['driver_Fname']." ".$row['driver_Lname']); ?></td>
                                                <td><?php echo($row['email']); ?></td>
                                                <td><?php echo($a['total']); ?></td>
                                                <td><button style="padding:0px 20px" class="dpayment-confirm">PAY</button></td>
                                            
                                    </tr>

                                    <?php  
                                }
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
                        
                            
                            <th>Driver Name</th>
                            <th>Driver Email</th>
                            <th>Payment Amount</th>
                            <th>Month</th>
                            <th>Payment Status</th>

                            
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                        
                                if ($rent2){
                            
                                    
                                   foreach ($rent2 as $row){
                                    
                                    
                                        # code...
                                    
                //                 
                                ?>
                                    <tr>
                                        <?php 
                                            foreach ($drivers as $a){
                                                
                                                if ($row['driver_Id']==$a['driver_ID']) {
                                                    
                                        ?>
                                                <td><?php echo($a['driver_Fname']." ".$a['driver_Lname']); ?></td>
                                                <td><?php echo($a['email']); ?></td>
                                                <td><?php echo($row['total_rent']); ?></td>
                                                <td><?php echo($row['month_name']); ?></td>
                                                <?php 
                                                   if ($row['pay_status']==0) {
                                                   ?>
                                                    <td><button style="padding:0px 20px" class="dpayment-confirm">PAY</button></td>
                                                <?php
                                                   }
                                                   else{

                                                   ?>
                                                   <td><h4 style="color:red">Paied</h4></td>
                                                   <?php }?>
                                            
                                    </tr>

                                    <?php  

                                }
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


