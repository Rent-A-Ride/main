<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<div style="background-color: #ffff; align-items:center; width:30%; margin-left:60%; padding:5px; border-radius:5px;">
    <form action="/admin/driverInvoice" method="post" class="up-profile" id="update_profile">
                            
        
        <!-- <input style="display:none" value="" type="number" id="fname" name="cus_Id"> -->
        <label for="cus_name">Select Vehicle Owner Name:</label>
        <select id="vo_Invoice" name="driver_ID">
        <?php 
            foreach ($drivers as $row){
        ?>
            <option value="<?= $row['driver_ID']?>"><?php echo($row['driver_Fname']." ".$row['driver_Lname']); ?></option>
        <?php } ?>
           
        <label for="month">Select a month</label>
        <input style="width: 60%; margin-left:50%; height:50px;"  type="month" id="month-year-input" name="month">
        
        <button  id="profile" value="" type="submit">Genarate Invoice>></button>
    </form>
</div>
<section class="requests">
    
    <div class="topnav">

        <a href="/admin/vehicleownerInvoice">Vehicle Owner Invoices</a>
        <a id="active" href="/admin/driverInvoice">Driver Invoices</a>
        <!-- <a href="/admin/manageCustomerPayment">Customers Invoices</a> -->



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
                                <th>Month</th>
                                <th>Invoice</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                        
                                if ($invoice){
                            
                                $lastMonthYear = date('F Y', strtotime('last month')); // Example: April 2023
                                $currentMonthYear = date('F Y'); // Example: May 2023
                                   foreach ($invoice as $row){
                                    
                                        if ($row['month_name']==$lastMonthYear || $row['month_name']==$currentMonthYear) {
                                            # code...
                                        
                                        
                                    
                //                 
                                ?>
                                    <tr>
                                        <?php 
                                            foreach ($drivers as $driver){
                                                if ($driver['driver_ID']==$row['driver_ID']) {
                                                    
                                        ?>
                                                <td><?php echo($driver['driver_Fname']." ".$driver['driver_Lname']); ?></td>
                                                <td><?php echo($driver['email']); ?></td>
                                                <td><?php echo($row['month_name']); ?></td>
                                                <td><a href="/assets/Invoice/VehicleOwner_Invoice/<?php echo($row['invoice']); ?>" download>Download PDF</a></td>
                                                
                                            
                                    </tr>

                                    <?php 
                                                } 
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
                        
                            
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Month</th>
                            <th>Invoice</th>

                            
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                        
                                if ($invoice){
                            
                                $lastMonthYear = date('F Y', strtotime('last month')); // Example: April 2023
                                $currentMonthYear = date('F Y'); // Example: May 2023
                                   foreach ($invoice as $row){
                                    
                                        // if ($row['month_name']==$lastMonthYear || $row['month_name']==$currentMonthYear) {
                                            # code...
                                        
                                        
                                    
                //                 
                                ?>
                                    <tr>
                                        <?php 
                                            foreach ($drivers as $driver){
                                                
                                                if ($driver['driver_ID']==$row['driver_ID']) {
                                                    
                                        ?>
                                                <td><?php echo($driver['driver_Fname']." ".$driver['driver_Lname']); ?></td>
                                                <td><?php echo($driver['email']); ?></td>
                                                <td><?php echo($row['month_name']); ?></td>
                                                <td><a href="/assets/Invoice/VehicleOwner_Invoice/<?php echo($row['invoice']); ?>" download>Download PDF</a></td>
                                                
                                            
                                    </tr>

                                    <?php 
                                                } 
                                            }
                                        // }
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


