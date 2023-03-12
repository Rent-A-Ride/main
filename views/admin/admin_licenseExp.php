<div class="body">  
    <section id="rest">
        <div class="complaintlist-table">
            <table>
                <thead>
                <th>No</th>
                <th>Vehicle No</th>
                <th>Vehicle Owner Name</th>
                <th>Vehicle Owner Email</th>
                <th>Expiaring Date</th>
                <th>No.of to Expire</th>
                <th>Send</th>
                
                <!-- <th>Status</th> -->
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
                    }
                    else{
                        $diff = $timestamp-$today;
                    }
                     // Calculate difference in seconds
                    $days = floor($diff / (60 * 60 * 24)); // Convert difference to days (rounded down)
                    
                    
                
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
                        <td><button class="license_exp" data-voID='<?php echo($row['vo_ID'])?>' data-vehID='<?php echo($row['veh_Id'])?>'>Send Notification</button></td>
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
                        <td><button class="license_exp" data-voID='<?php echo($row['vo_ID'])?>'data-voID='<?php echo($row['veh_Id'])?>'>Send Notification</button></td>
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
    </section>
</div>