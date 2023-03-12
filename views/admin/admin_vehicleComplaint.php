<div class="body">       
    <section id="rest">        
        <div class="complaintlist-table">
            <table>
                <thead>
                <th>No</th>
                <th>Customer Name</th>
                <th>Vehicle No</th>
                <th>Complaint</th>
                <th>Proof</th>
                <th>Resolved</th>
                </thead>
                
                <tbody>
                <?php
                $num=1;
                // var_dump($complaint);
                // die();
                if ($complaint){
                    // var_dump($complaint);
                    // die();
                   foreach ($complaint as $row){

//                       print_r($row);
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
                  $num=$num+1;
                   }
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</div>