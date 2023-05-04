<?php
/* @var $row viewCustomerReq */

use app\models\viewCustomerReq;

?>
<section class="requests">

    <div class="topnav">

        <a  href="/admin/managepayment">Vehicle Owners Payments</a>
        <a  href="/admin/managedriverpayment">Drivers Payments</a>
        <a id="active" href="/admin/manageCustomerPayment">Customers Payments</a>



    </div>


    <div class="requests-list">
        <div class="pending-container">
            <div class="req-switch">


                <input type="radio" class="with-driver" name="switch" id="with-driver" >
                <label for="with-driver"><i class="fa-solid fa-square-xmark"></i></label>
                <input type="radio" class="without-driver" name="switch" id="without-driver" checked>
                <label for="without-driver"><i class="fa-solid fa-square-check"></i></label>

            </div>
            <div class="content">
                <div class="with-driver-container">
                   

                    <div class="requests-list">


                        <table class="table">

                            <thead>
                            <tr>
                                
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Journey Start Date</th>
                                <th>Journey End Date</th>
                                <th>Destination</th>
                                <th>Booking Created</th>
                                <th>Total Rent</th>
                                <th>Paied Ammount</th>
                                <th>Remaining Amount</th>
                                <th>Inform Payment</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                        
                                if ($payment){
                            
                                    
                                   foreach ($payment as $row){
                                        if ($row['status_pay']==0) {
                                        # code...
                                     
                                ?>
                                    <tr>
                                        <td><?php echo($row['firstname']." ".$row['lastname']); ?></td>
                                        <td><?php echo($row['email']); ?></td>
                                        <td><?php echo($row['startDate']); ?></td>
                                        <td><?php echo($row['endDate']); ?></td>
                                        <td><?php echo($row['Destination']); ?></td>
                                        <td><?php echo($row['created_at']); ?></td>
                                        <td><?php echo($row['total_rent']); ?></td>
                                        <td><?php echo($row['payment_amount']); ?></td>
                                        <td><?php echo($row['total_rent']-$row['payment_amount']); ?></td>
                                        <td><button style="padding:0px 20px" class="book-button informPayment" data-cusid="<?php echo($row['cus_Id']); ?>" data-cusname="<?php echo($row['firstname']." ".$row['lastname']); ?>">INFORM PAYMENT</button></td>
                                            
                                    </tr>

                                    <?php 
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
                        
                            
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Journey Start Date</th>
                            <th>Journey End Date</th>
                            <th>Destination</th>
                            <th>Booking Created</th>
                            <th>Total Rent</th>
                            <th>Paied Amount</th>
                            <th>Remaining Amount</th>
                            <th>Inform Payment</th>

                            
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                
                        
                                if ($payment){
                            
                                    
                                   foreach ($payment as $row){
                                       
                                        if ($row['status_pay']!=0) {
                                    
                                ?>
                                    <tr>
                                        <td><?php echo($row['firstname']." ".$row['lastname']); ?></td>
                                        <td><?php echo($row['email']); ?></td>
                                        <td><?php echo($row['startDate']); ?></td>
                                        <td><?php echo($row['endDate']); ?></td>
                                        <td><?php echo($row['Destination']); ?></td>
                                        <td><?php echo($row['created_at']); ?></td>
                                        <td><?php echo($row['total_rent']); ?></td>
                                        <td><?php echo($row['payment_amount']); ?></td>
                                        <td><?php echo($row['total_rent']-$row['payment_amount']); ?></td>
                                        <td><button style="padding:0px 20px" class="book-button informPayment" data-cusid="<?php echo($row['cus_Id']); ?>" data-cusname="<?php echo($row['firstname']." ".$row['lastname']); ?>">INFORM PAYMENT</button></td>
                                            
                                    </tr>

                                    <?php  
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


