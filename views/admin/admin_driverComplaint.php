<div class="body">       
    <section id="rest">        
        <div class="complaintlist-table">
            <table>
                <thead>
                <th>No</th>
                <th>Customer Name</th>
                <th>Driver Name</th>
                <th>Complaint</th>
                <th>Proof</th>
                <th>Resolved</th>
                </thead>
                <tbody>
                <?php
                $num=1;
                
                if ($complaint){
                    // var_dump($complaint);
                   foreach ($complaint as $row){

//                       print_r($row);
                ?>
                    <tr>
                        <td><?php echo($num); ?></td>
                        <td><?php echo($row['cus_Name']); ?></td>
                        <td><?php echo($row['driver_Name']); ?></td>
                        <td><?php echo($row['complaint']); ?></td>
                        <td><button class="button_adminvehicle driver_complaintProof" data-compalintId='<?php echo($row['com_ID'])?>' data-customerId='<?php echo($row['cus_ID'])?>' data-driverId='<?php echo($row['driver_ID'])?>'  data-driverproof='<?php echo($row['proof'])?>'>Proof</button></td>
                        <td><button class="button_adminvehicle driver_complaintResolve" data-compalintId='<?php echo($row['com_ID'])?>' data-customerId='<?php echo($row['cus_ID'])?>' data-driverId='<?php echo($row['driver_ID'])?>'>Resolved Complaint</button></td>
                    </tr>

                <?php
                  $num=$num+1;
                   }
                }
                ?>
                
                </tbody>
            </table>
        </div>
    </section>
</div>