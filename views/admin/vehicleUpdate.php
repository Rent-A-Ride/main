<div class="body">       
    <section id="rest">        
        <div class="complaintlist-table">
            <table>
                <thead>
                <th>Type</th>
                <th>No</th>
                <th>Vehicle No</th>
                <th>From Date</th>
                <th>Exp. Date</th>
                <th>Update</th>
                <!-- <th>Update</th> -->
                </thead>
                
                <tbody>
                <?php
                $num=1;
                // var_dump($ren_lin);
                // var_dump($ren_ins);
                // die();
                if ($ren_lin){
                    // var_dump($complaint);
                    // die();
                   

//                       print_r($row);
                ?>
                    <tr>
                        <td><?php echo("License"); ?></td>
                        <td><?php echo($ren_lin[0]['license_No']); ?></td>
                        <td><?php echo($ren_lin[0]['plate_No']); ?></td>
                        <td><?php echo($ren_lin[0]['from_date']); ?></td>
                        <td><?php echo($ren_lin[0]['ex_date']); ?></td>
                        <td><button class="button_adminvehicle vehiclelin_scan_copy" data-vehid='<?php echo($ren_lin[0]['veh_Id']); ?>' data-linno='<?php echo($ren_lin[0]['license_No']); ?>' data-vehno='<?php echo($ren_lin[0]['plate_No']); ?>' data-fromdate='<?php echo($ren_lin[0]['from_date']); ?>' data-exdate='<?php echo($ren_lin[0]['ex_date']); ?>' data-scancopy='<?php echo($ren_lin[0]['scan_copy']); ?>'>Update</button></td>
                        <!-- <td><button class="button_adminvehicle vehicleComplaintresolve" >Update</button></td> -->
                    </tr>

                <?php
                  $num=$num+1;
                   
                }
                if ($ren_ins) {
                    # code...
                
                ?>
                <tr>
                        <td><?php echo("Insuarance"); ?></td>
                        <td><?php echo($ren_ins[0]['ins_No']); ?></td>
                        <td><?php echo($ren_ins[0]['plate_No']); ?></td>
                        <td><?php echo($ren_ins[0]['from_date']); ?></td>
                        <td><?php echo($ren_ins[0]['ex_date']); ?></td>
                        <td><button class="button_adminvehicle vehicle-ins-update" data-vehid='<?php echo($ren_ins[0]['veh_Id']); ?>' data-insno="<?php echo($ren_ins[0]['ins_No']); ?>" data-fromdate="<?php echo($ren_ins[0]['from_date']); ?>" data-exdate="<?php echo($ren_ins[0]['ex_date']); ?>" data-scancopy="<?php echo($ren_ins[0]['scan_copy']); ?>" data-inscom="<?php echo($ren_ins[0]['ins_com']); ?>" data-instype="<?php echo($ren_ins[0]['ins_type']); ?>"data-vehno="<?php echo($ren_ins[0]['plate_No']); ?>">Update</button></td>
                        <!-- <td><button class="button_adminvehicle " >Update</button></td> -->
                    </tr>

                <?php
                  $num=$num+1;
                   
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script src="../../public/assets/javascript/admin/update_vehicleins.js"></script>
<script src="../../public/assets/javascript/admin/update_vehiclelin.js"></script>