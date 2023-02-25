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
                   foreach ($complaint as $row){

//                       print_r($row);
                ?>
                    <tr>
                        <td><?php echo($num); ?></td>
                        <td><?php echo($row['cus_Name']); ?></td>
                        <td><?php echo($row['driver_Name']); ?></td>
                        <td><?php echo($row['complaint']); ?></td>
                        <td><button class="button_adminvehicle">Proof</button></td>
                        <td><button class="button_adminvehicle">Resolved Complaint</button></td>
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